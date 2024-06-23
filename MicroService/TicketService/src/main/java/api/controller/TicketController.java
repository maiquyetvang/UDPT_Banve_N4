package api.controller;
import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import api.model.Ticket;
import api.publisher.Publisher;
import api.repository.TicketRepository;

@RestController 
@RequestMapping("/api")
public class TicketController {
	@Autowired 
	TicketRepository repo; 
  
    @Autowired
    private Publisher publisher;
    
	@PostMapping("/Ticket")
	public ResponseEntity<Ticket> ThemVe(@RequestBody Ticket ve) { 
	try { 
		// nhạn được api thanh toan thanh cong
	Ticket _ve = repo.save(new Ticket(ve.getMaVe(), ve.getTenVe(), ve.getMoTa(), ve.getGia(), ve.getLoaiVe(), ve.getTongSoVe(),ve.getMaSk(), ve.getMaKh())); 
    
	String message = " da thanh toan: " + _ve.getMaVe();
    // send to RabbitMQ
    publisher.produceMsg(message);
	return new ResponseEntity<>(_ve, HttpStatus.CREATED); 
	} catch (Exception e) { 
	return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR); 
	} 
	} 
    // Endpoint để mua vé bởi người dùng
    @PostMapping("/buyTicket/{userId}")
    public ResponseEntity<?> buyTicket(@PathVariable String userId, @RequestBody Ticket ticket) {
        try {

            ticket.setMaKh(userId);

            // Lưu thông tin vé
            Ticket savedTicket = repo.save(ticket);

            // Gửi thông điệp qua RabbitMQ
            String message = "User " + userId + " has purchased ticket: " + ticket.getMaVe();
            publisher.produceMsg(message);

            // Trả về phản hồi thành công
            return new ResponseEntity<>(savedTicket, HttpStatus.CREATED);
        } catch (Exception e) {
            return new ResponseEntity<>(e.getMessage(), HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }
	
    @GetMapping("/Event/Ticket/{maSk}")
    public ResponseEntity<List<Ticket>> getTicketsByEventId(@PathVariable("maSk") String maSk) {
    	try
        {
  		  List<Ticket> Ticketlst = new ArrayList<Ticket>();
  		  repo.findBymaSk(maSk).forEach(Ticketlst::add);		  
         if(Ticketlst.isEmpty())
            {
          	  return new ResponseEntity<>(HttpStatus.NO_CONTENT);
            }

            return new ResponseEntity<>(Ticketlst, HttpStatus.OK);
        }
        catch (Exception e)
        {
            return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }
    @GetMapping("Customer/Ticket/{makh}") 
	public ResponseEntity<List<Ticket>> XemDanhSachVeByKH(@PathVariable("makh") String makh) { 
	  try
      {
		  List<Ticket> Ticketlst = new ArrayList<Ticket>();
		  repo.findBymaKh(makh).forEach(Ticketlst::add);		  
       if(Ticketlst.isEmpty())
          {
        	  return new ResponseEntity<>(HttpStatus.NO_CONTENT); 
          }

          return new ResponseEntity<>(Ticketlst, HttpStatus.OK);
      }
      catch (Exception e)
      {
          return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
      }
	}
}

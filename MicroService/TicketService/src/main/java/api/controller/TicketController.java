package api.controller;
import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;

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
    public ResponseEntity<Ticket> themVe(@RequestBody Ticket ve) {

        try {
            Ticket savedTicket = repo.save(ve);

            return new ResponseEntity<>(savedTicket, HttpStatus.CREATED);
        } catch (Exception e) {

            return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }
    @GetMapping("/Ticket/{orderId}")
    public ResponseEntity<List<Ticket>> getByOrderInfo(@PathVariable("orderId") int orderId) {
        try {
            List<Ticket> tickets = repo.findByOrderId(orderId);

            if (tickets.isEmpty()) {
                return new ResponseEntity<>(HttpStatus.NO_CONTENT);
            }

            return new ResponseEntity<>(tickets, HttpStatus.OK);
        } catch (Exception e) {
            return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }
    @PutMapping("/updateTicketStatus/{orderId}")
    public ResponseEntity<?> updateTicketStatus(@PathVariable("orderId") int orderId) {
        try {
            // Tìm tất cả các vé với OrderId
            List<Ticket> tickets = repo.findByOrderId(orderId);

            // Kiểm tra nếu không có vé nào với OrderId đã cho
            if (tickets.isEmpty()) {
                return new ResponseEntity<>("OrderId không tồn tại", HttpStatus.NOT_FOUND);
            }

            // Cập nhật trạng thái 'tinhtrang' cho tất cả các vé
            tickets.forEach(ticket -> ticket.setTinhtrang("đã thanh toán"));

            // Lưu các thay đổi
            repo.saveAll(tickets);

            return new ResponseEntity<>("Cập nhật trạng thái vé thành công", HttpStatus.OK);
        } catch (Exception e) {
            return new ResponseEntity<>("Đã xảy ra lỗi: " + e.getMessage(), HttpStatus.INTERNAL_SERVER_ERROR);
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

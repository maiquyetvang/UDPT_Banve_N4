package api.repository;
import org.springframework.data.mongodb.repository.MongoRepository;

import api.model.Ticket;
import java.util.List;
public interface TicketRepository extends MongoRepository<Ticket, String>{
	List<Ticket> findBymaKh(String makh);
	List<Ticket> findBymaSk(String mask);
}
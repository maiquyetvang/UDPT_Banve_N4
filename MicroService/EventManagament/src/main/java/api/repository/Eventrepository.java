package api.repository;

import org.springframework.data.mongodb.repository.MongoRepository;
import api.model.Event;

public interface Eventrepository extends MongoRepository<Event, String> {

}

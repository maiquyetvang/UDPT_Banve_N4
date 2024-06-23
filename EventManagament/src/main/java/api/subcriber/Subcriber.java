package api.subcriber;
import org.springframework.amqp.rabbit.annotation.RabbitListener;
import org.springframework.stereotype.Component;

@Component
public class Subcriber {
	@RabbitListener(queues="${jsa.rabbitmq.queue}") 
	public void recievedMessage(String msg) { 
	System.out.println("Recieved Message: " + msg); 
	} 
}

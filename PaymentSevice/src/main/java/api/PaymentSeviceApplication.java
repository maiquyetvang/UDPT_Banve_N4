package api;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;

@SpringBootApplication
@ComponentScan(basePackages = {"api.controller", "config"})

public class PaymentSeviceApplication {

	public static void main(String[] args) {
		SpringApplication.run(PaymentSeviceApplication.class, args);
	}

}

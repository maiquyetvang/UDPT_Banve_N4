package com.example.demo;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import lombok.*;
import org.springframework.web.bind.annotation.ExceptionHandler;

import java.util.ArrayList;
import java.util.Date;

@Entity
@Data
@NoArgsConstructor
@AllArgsConstructor
@Builder
public class GoogleProfile {
    @Id
    private String sub; // ID của người dùng

    private String email;
    private String givenName;
    private String familyName;
    private String pictureUrl;
    private String expirationTime;
}

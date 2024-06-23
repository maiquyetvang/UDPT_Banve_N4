package com.udpt_banve.authservice.dto.request;

import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.Size;
import jakarta.validation.constraints.Pattern;
import lombok.experimental.FieldDefaults;

import java.time.LocalDate;
import lombok.*;

@Data
@NoArgsConstructor
@AllArgsConstructor
@Builder
@FieldDefaults(level = AccessLevel.PRIVATE)
public class UserCreationRequest {

    @Size(min = 4, message = "INVALID_USERNAME")
    String username;
    @Size(min = 6, message = "INVALID_PASSWORD")
    String password;
    @Email(message = "INVALID_EMAIL")
    String email;

    String firstName;
    String lastName;
    String gender;
    String phoneNumber;
    LocalDate dateOfBirth;
    String street;
    String district;
    String province;
}

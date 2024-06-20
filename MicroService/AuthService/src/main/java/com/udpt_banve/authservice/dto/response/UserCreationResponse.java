package com.udpt_banve.authservice.dto.response;

import lombok.experimental.FieldDefaults;

import java.time.LocalDate;

@Data
@NoArgsConstructor
@AllArgsConstructor
@Builder
@FieldDefaults(level = AccessLevel.PRIVATE)
public class UserCreationResponse {
    String username;
    String firstName;
    String lastName;
    LocalDate dob;
    String role;
    String token;
}

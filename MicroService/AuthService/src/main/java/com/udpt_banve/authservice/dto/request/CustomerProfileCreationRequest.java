package com.udpt_banve.authservice.dto.request;

import lombok.*;
import lombok.experimental.FieldDefaults;

import java.time.LocalDate;

@Data
@NoArgsConstructor
@AllArgsConstructor
@Builder
@FieldDefaults(level = AccessLevel.PRIVATE)
public class CustomerProfileCreationRequest {

    String username;
    String firstName;
    String lastName;
    String gender;
    String phoneNumber;
    LocalDate dateOfBirth;
    String street;
    String district;
    String province;
}

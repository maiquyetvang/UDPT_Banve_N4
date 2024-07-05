package com.udpt_banve.profileservice.dto.request;

import lombok.*;
import lombok.experimental.FieldDefaults;

import java.time.LocalDate;

@Data
@NoArgsConstructor
@AllArgsConstructor
@Builder
@FieldDefaults(level = AccessLevel.PRIVATE)
public class UpdateUserProfileRequest{
    String firstName;
    String lastName;
    String gender;
    String phoneNumber;
    LocalDate dateOfBirth;
    String street;
    String district;
    String province;
}

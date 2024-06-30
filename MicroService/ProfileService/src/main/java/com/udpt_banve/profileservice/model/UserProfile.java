package com.udpt_banve.profileservice.model;

import lombok.Getter;
import lombok.Setter;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

import java.time.LocalDate;


@Getter
@Setter
@Document(collection = "user_profiles")
public class UserProfile {
    @Id
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

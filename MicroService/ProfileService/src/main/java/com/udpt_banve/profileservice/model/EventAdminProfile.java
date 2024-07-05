package com.udpt_banve.profileservice.model;

import lombok.Getter;
import lombok.Setter;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;


@Getter
@Setter
@Document(collection = "event_admin_profiles")
public class EventAdminProfile {
    @Id
    private String username;
    private String businessName;
    private String phoneNumber;
    private String email;
    private String taxCode;
    private String headOffice;
}

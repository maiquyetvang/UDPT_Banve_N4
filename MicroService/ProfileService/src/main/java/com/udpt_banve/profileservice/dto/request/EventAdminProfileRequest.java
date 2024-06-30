package com.udpt_banve.profileservice.dto.request;

import lombok.*;
import lombok.experimental.FieldDefaults;

@Data
@NoArgsConstructor
@AllArgsConstructor
@Builder
@FieldDefaults(level = AccessLevel.PRIVATE)
public class EventAdminProfileRequest {
    String businessName;
    String phoneNumber;
    String email;
    String taxCode;
    String headOffice;
}

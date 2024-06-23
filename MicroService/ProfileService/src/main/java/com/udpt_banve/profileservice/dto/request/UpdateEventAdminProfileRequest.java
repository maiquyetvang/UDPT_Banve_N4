package com.udpt_banve.profileservice.dto.request;

import lombok.*;
import lombok.experimental.FieldDefaults;

import java.time.LocalDate;

@Data
@NoArgsConstructor
@AllArgsConstructor
@Builder
@FieldDefaults(level = AccessLevel.PRIVATE)
public class UpdateEventAdminProfileRequest {
    String businessName;
    String phoneNumber;
    String email;
    String taxCode;
    String headOffice;
}

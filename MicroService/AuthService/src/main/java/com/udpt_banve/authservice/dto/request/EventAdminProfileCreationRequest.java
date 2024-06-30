package com.udpt_banve.authservice.dto.request;

import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.Size;
import lombok.*;
import lombok.experimental.FieldDefaults;

@Data
@NoArgsConstructor
@AllArgsConstructor
@Builder
@FieldDefaults(level = AccessLevel.PRIVATE)
public class EventAdminProfileCreationRequest {
    String email;
    String businessName;
    String phoneNumber;
    String taxCode;
    String headOffice;
}

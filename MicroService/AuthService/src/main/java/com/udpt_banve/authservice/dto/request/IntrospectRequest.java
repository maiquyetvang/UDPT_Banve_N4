package com.udpt_banve.authservice.dto.request;

import lombok.experimental.FieldDefaults;
import lombok.*;

@Data
@NoArgsConstructor
@AllArgsConstructor
@Builder
@FieldDefaults(level = AccessLevel.PRIVATE)
public class IntrospectRequest {
    String token;
}

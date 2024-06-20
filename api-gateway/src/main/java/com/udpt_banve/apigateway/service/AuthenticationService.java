package com.udpt_banve.apigateway.service;

import com.udpt_banve.apigateway.dto.request.IntrospectRequest;
import com.udpt_banve.apigateway.dto.response.ApiResponse;
import com.udpt_banve.apigateway.dto.response.IntrospectResponse;
import com.udpt_banve.apigateway.repository.AuthenticationClient;
import lombok.AccessLevel;
import lombok.RequiredArgsConstructor;
import lombok.experimental.FieldDefaults;
import org.springframework.stereotype.Service;
import reactor.core.publisher.Mono;

@Service
@RequiredArgsConstructor
@FieldDefaults(level = AccessLevel.PRIVATE,makeFinal = true)
public class AuthenticationService {
//    AuthenticationClient authenticationClient;
//
//    public Mono<ApiResponse<IntrospectResponse>> introspect(String token) {
//        return authenticationClient.introspect(IntrospectRequest
//                        .builder().token(token)
//                        .build());
//    }
}

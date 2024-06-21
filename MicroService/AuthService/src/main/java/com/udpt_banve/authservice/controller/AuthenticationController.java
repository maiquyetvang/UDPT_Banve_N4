package com.udpt_banve.authservice.controller;

import com.nimbusds.jose.JOSEException;
import com.udpt_banve.authservice.dto.request.ApiResponse;
import com.udpt_banve.authservice.dto.request.AuthenticationRequest;
import com.udpt_banve.authservice.dto.request.IntrospectRequest;
import com.udpt_banve.authservice.dto.response.IntrospectResponse;
import com.udpt_banve.authservice.dto.response.UserCreationResponse;
import com.udpt_banve.authservice.service.AuthenticationService;
import lombok.AccessLevel;
import lombok.RequiredArgsConstructor;
import lombok.experimental.FieldDefaults;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.text.ParseException;

@RestController
@RequestMapping("/auth")
@RequiredArgsConstructor
@FieldDefaults(level = AccessLevel.PRIVATE,makeFinal = true)
public class AuthenticationController {
    AuthenticationService authenticationService;

    @PostMapping("/login")
    ApiResponse<UserCreationResponse> authenticate(@RequestBody AuthenticationRequest request) {
        UserCreationResponse result = authenticationService.authenticate(request);
        return ApiResponse.<UserCreationResponse>builder()
                .result(result)
                .build();
    }
    @PostMapping("/introspect")
    ApiResponse<IntrospectResponse> introspect(@RequestBody IntrospectRequest request)
            throws ParseException, JOSEException {
        var result = authenticationService.introspect(request);
        return ApiResponse.<IntrospectResponse>builder()
                .result(result)
                .build();
    }
}

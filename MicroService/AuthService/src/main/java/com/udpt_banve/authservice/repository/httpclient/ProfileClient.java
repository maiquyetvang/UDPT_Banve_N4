package com.udpt_banve.authservice.repository.httpclient;

import com.udpt_banve.authservice.config.AuthenticationRequestInterceptor;
import com.udpt_banve.authservice.dto.request.EventAdminProfileCreationRequest;
import com.udpt_banve.authservice.dto.request.CustomerProfileCreationRequest;
import org.springframework.cloud.openfeign.FeignClient;
import org.springframework.http.MediaType;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;

@FeignClient(name = "profile-service", url = "${app.services.profile}",
configuration = {AuthenticationRequestInterceptor.class})
public interface ProfileClient {
    @PostMapping(value = "/users", produces = MediaType.APPLICATION_JSON_VALUE)
    Object createCustomerProfile(
//            @RequestHeader("Authorization") String token,
            @RequestBody CustomerProfileCreationRequest request);
    @PostMapping(value = "/event-admin", produces = MediaType.APPLICATION_JSON_VALUE)
    Object createEventProfile(
//            @RequestHeader("Authorization") String token,
            @RequestBody EventAdminProfileCreationRequest request);
}

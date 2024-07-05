package com.udpt_banve.apigateway.repository;

import com.udpt_banve.apigateway.dto.request.IntrospectRequest;
import com.udpt_banve.apigateway.dto.response.ApiResponse;
import com.udpt_banve.apigateway.dto.response.IntrospectResponse;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.cloud.openfeign.FeignClient;
import org.springframework.context.annotation.Bean;
import org.springframework.http.MediaType;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.service.annotation.PostExchange;
import reactor.core.publisher.Mono;

//@FeignClient(name = "authentication-service")

public interface AuthenticationClient {
    @PostExchange(url="/introspect", contentType = MediaType.APPLICATION_JSON_VALUE)
    Mono<ApiResponse<IntrospectResponse>> introspect(@RequestBody IntrospectRequest request);
}

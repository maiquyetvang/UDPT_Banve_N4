package com.udpt_banve.apigateway.repository;

import com.udpt_banve.apigateway.dto.request.IntrospectRequest;
import com.udpt_banve.apigateway.dto.response.ApiResponse;
import com.udpt_banve.apigateway.dto.response.IntrospectResponse;
import org.springframework.context.annotation.Bean;
import org.springframework.http.MediaType;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.service.annotation.PostExchange;
import reactor.core.publisher.Mono;

public interface AuthenticationClient {

    @PostExchange(url="/auth/introspect", contentType = MediaType.APPLICATION_JSON_VALUE)
    Mono<ApiResponse<IntrospectResponse>> introspect(@RequestBody IntrospectRequest request);
}

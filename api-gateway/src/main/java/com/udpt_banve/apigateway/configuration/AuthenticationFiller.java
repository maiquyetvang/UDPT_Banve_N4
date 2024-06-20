//package com.udpt_banve.apigateway.configuration;
//
//import com.udpt_banve.apigateway.service.AuthenticationService;
//import io.netty.handler.codec.http.HttpResponseStatus;
//import lombok.AccessLevel;
//import lombok.RequiredArgsConstructor;
//import lombok.experimental.FieldDefaults;
//import lombok.extern.slf4j.Slf4j;
//import org.springframework.cloud.gateway.filter.GatewayFilterChain;
//import org.springframework.cloud.gateway.filter.GlobalFilter;
//import org.springframework.core.Ordered;
//import org.springframework.http.HttpHeaders;
//import org.springframework.http.HttpStatus;
//import org.springframework.http.server.reactive.ServerHttpResponse;
//import org.springframework.stereotype.Component;
//import org.springframework.util.CollectionUtils;
//import org.springframework.web.server.ServerWebExchange;
//import reactor.core.publisher.Mono;
//import reactor.netty.http.server.HttpServerRequest;
//import reactor.netty.http.server.HttpServerResponse;
//
//import java.util.Collection;
//import java.util.List;
//
//@Component
//@Slf4j
//@RequiredArgsConstructor
//@FieldDefaults(level = AccessLevel.PACKAGE,makeFinal = true)
//
//public class AuthenticationFiller implements GlobalFilter, Ordered {
//
//    AuthenticationService authenticationService;
//
//    @Override
//    public Mono<Void> filter(ServerWebExchange exchange, GatewayFilterChain chain) {
//        log.info("Authentication Filter enter");
//        //Get token from authorization header
//        List<String> authHeader = exchange.getRequest().getHeaders().get(HttpHeaders.AUTHORIZATION);
//        if (CollectionUtils.isEmpty(authHeader)) {
//            return unauthenticated(exchange.getResponse());
//        }
//        //Get token
//        String token = authHeader.get(0).replace("Bearer ", "");
//        log.info("Authentication Filter token: {}", token);
//        //Verify token
////        authenticationService.introspect(token);
//
//
//
//        return chain.filter(exchange);
//    }
//
//    @Override
//    public int getOrder() {
//        return -1;
//    }
//
//    Mono<Void> unauthenticated(ServerHttpResponse response) {
//        String body = "unauthenticated";
//        response.setStatusCode(HttpStatus.UNAUTHORIZED);
//        return response.writeWith(
//                Mono.just(response.bufferFactory().wrap(body.getBytes())));
//    }
//
//}

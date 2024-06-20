package com.udpt_banve.authservice.controller;


import com.udpt_banve.authenticationservice.dto.request.ApiResponse;
import com.udpt_banve.authenticationservice.dto.request.UserCreationRequest;
import com.udpt_banve.authenticationservice.dto.response.UserCreationResponse;
import com.udpt_banve.authenticationservice.dto.response.UserResponse;
import com.udpt_banve.authenticationservice.service.UserService;
import jakarta.validation.Valid;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.context.SecurityContextHolder;

import java.util.List;

@RestController
@RequestMapping("/auth/users")
public class UserController {
    private static final Logger log = LoggerFactory.getLogger(UserController.class);
    @Autowired
    private UserService userService;

    @PostMapping
    ApiResponse<UserCreationResponse> createUser(@RequestBody @Valid UserCreationRequest request) {
//        ApiResponse<UserResponse> apiResponse = new ApiResponse<>();
//        apiResponse.setResult(userService.createUser(request));
//        return apiResponse;
        return ApiResponse.<UserCreationResponse>builder()
                .result(userService.createUser(request))
                .build();
    }
    @GetMapping
    List<UserResponse> getAllUsers() {
        var authentication = SecurityContextHolder.getContext().getAuthentication();
        return userService.getAllUsers();
    }

    @GetMapping("/{username}")
    ApiResponse<UserResponse> getUserByUsername(@PathVariable String username) {
        return ApiResponse.<UserResponse>builder()
                .result(userService.getUserByUsername(username))
                .build();
    }


    @GetMapping("/myinfo")
    ApiResponse<UserResponse> getMyInfo() {
        return ApiResponse.<UserResponse>builder()
                .result(userService.getMyInfo())
                .build();
    }

}

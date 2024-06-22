package com.udpt_banve.authservice.controller;


import com.udpt_banve.authservice.dto.request.ApiResponse;
import com.udpt_banve.authservice.dto.request.ChangePasswordRequest;
import com.udpt_banve.authservice.dto.request.UserCreationRequest;
import com.udpt_banve.authservice.dto.response.UserCreationResponse;
import com.udpt_banve.authservice.dto.response.UserResponse;
import com.udpt_banve.authservice.service.UserService;
import jakarta.validation.Valid;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/auth/users")
public class UserController {
    private static final Logger log = LoggerFactory.getLogger(UserController.class);
    @Autowired
    private UserService userService;

    @PostMapping("/register")
    ApiResponse<UserCreationResponse> createUser(@RequestBody @Valid UserCreationRequest request) {
        return ApiResponse.<UserCreationResponse>builder()
                .result(userService.createUser(request))
                .build();
    }
    @GetMapping
    List<UserResponse> getAllUsers() {
        var authentication = SecurityContextHolder.getContext().getAuthentication();
        return userService.getAllUsers();
    }
    @PostMapping
    ApiResponse<String> changePassword(@RequestBody @Valid ChangePasswordRequest request) {
        return ApiResponse.<String>builder()
                .result()
                .build();
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

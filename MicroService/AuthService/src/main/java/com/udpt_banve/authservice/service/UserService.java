package com.udpt_banve.authservice.service;

import com.udpt_banve.authenticationservice.dto.request.UserCreationRequest;
import com.udpt_banve.authenticationservice.dto.response.UserCreationResponse;
import com.udpt_banve.authenticationservice.dto.response.UserResponse;
import com.udpt_banve.authenticationservice.entity.User;
import com.udpt_banve.authenticationservice.enums.Role;
import com.udpt_banve.authenticationservice.exception.AppException;
import com.udpt_banve.authenticationservice.exception.ErrorCode;
import com.udpt_banve.authenticationservice.mapper.UserMapper;
import com.udpt_banve.authenticationservice.repository.UserRepository;
import lombok.AccessLevel;
import lombok.RequiredArgsConstructor;
import lombok.experimental.FieldDefaults;
import lombok.extern.slf4j.Slf4j;
import org.springframework.security.access.prepost.PostAuthorize;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
@RequiredArgsConstructor
@FieldDefaults(level = AccessLevel.PRIVATE,makeFinal = true)
@Slf4j
public class UserService {
    UserRepository userRepository;
    UserMapper userMapper;
    AuthenticationService authenticationService;
    public UserCreationResponse createUser(UserCreationRequest request) {
        User user = userMapper.toUser(request);
        if (userRepository.existsByUsername(user.getUsername())) {
            throw new AppException(ErrorCode.USER_EXISTED);
        }
        PasswordEncoder passwordEncoder = new BCryptPasswordEncoder(10);
        user.setPassword(passwordEncoder.encode(request.getPassword()));

        user.setRole(Role.USER.name());
        log.info(user.toString());
        userRepository.save(user);
        log.info(user.toString());
        UserCreationResponse response = userMapper.toUserCreationResponse(user);
        log.info(response.toString());
        var token = authenticationService.generateToken(user);
        log.info(token);
        response.setToken(token);
        return response;
    }

    @PreAuthorize("hasRole('ADMIN')")
    public List<UserResponse> getAllUsers() {
        return userRepository.findAll().stream().map(userMapper::toUserResponse).toList();
    }


    @PostAuthorize("returnObject.username == authentication.name")
    public UserResponse getUserByUsername(String username) {
        return userMapper.toUserResponse(userRepository.findByUsername(username)
                .orElseThrow(()->new AppException(ErrorCode.USER_NOT_FOUND)));
    }

    public UserResponse getMyInfo(){
        var context = SecurityContextHolder.getContext();
        String name = context.getAuthentication().getName();
        return userMapper.toUserResponse(userRepository.findByUsername(name)
                .orElseThrow(()->new AppException(ErrorCode.USER_NOT_FOUND)));
    }
}

package com.udpt_banve.authservice.service;

import com.udpt_banve.authservice.dto.request.*;
import com.udpt_banve.authservice.dto.response.UserCreationResponse;
import com.udpt_banve.authservice.dto.response.UserResponse;
import com.udpt_banve.authservice.entity.User;
import com.udpt_banve.authservice.enums.Role;
import com.udpt_banve.authservice.exception.AppException;
import com.udpt_banve.authservice.exception.ErrorCode;
import com.udpt_banve.authservice.mapper.UserMapper;
import com.udpt_banve.authservice.repository.UserRepository;
import com.udpt_banve.authservice.repository.httpclient.ProfileClient;
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
    PasswordEncoder passwordEncoder;
    ProfileClient profileClient;

    public UserCreationResponse createUser(UserCreationRequest request) {
        User user = userMapper.toUser(request);

        if (userRepository.existsByUsername(user.getUsername()) || userRepository.existsByEmail(user.getEmail())) {
            throw new AppException(ErrorCode.USER_EXISTED);
        }
        PasswordEncoder passwordEncoder = new BCryptPasswordEncoder(10);
        user.setPassword(passwordEncoder.encode(request.getPassword()));

        // Save user
        user.setRole(Role.USER.name());
        userRepository.save(user);

        // Create response
        UserCreationResponse response = userMapper.toUserCreationResponse(user);
        var token = authenticationService.generateToken(user);
        response.setToken(token);

        //Create user profile in profile-service
        CustomerProfileCreationRequest profile = userMapper.toUserProfileCreationRequest(request);
        var profileResponse = profileClient.createCustomerProfile(profile);
        log.info("Created profile: {}", profileResponse);
        return response;
    }

    public UserCreationResponse createEventAdmin(EventAdminCreationRequest request) {
        User user = userMapper.toUser(request);
        if (userRepository.existsByUsername(user.getUsername())) {
            throw new AppException(ErrorCode.USER_EXISTED);
        }
        if (userRepository.existsByEmail(user.getEmail())) {
            throw new AppException(ErrorCode.EMAIL_EXISTED);
        }
        PasswordEncoder passwordEncoder = new BCryptPasswordEncoder(10);
        user.setPassword(passwordEncoder.encode(request.getPassword()));

        // Save user
        user.setRole(Role.EVENT_ADMIN.name());
        userRepository.save(user);

        // Create response
        UserCreationResponse  response = userMapper.toUserCreationResponse(user);
        var token = authenticationService.generateToken(user);
        response.setToken(token);
        EventAdminProfileCreationRequest profile = userMapper.toUserProfileCreationRequest(request);

        //Create user profile in profile-service
        var profileResponse = profileClient.createEventProfile(profile);
        log.info("Created profile: {}", profileResponse.toString());
        return response;
    }



    public String changePassword(ChangePasswordRequest request) {
        // Retrieve the username from the security context
        var context = SecurityContextHolder.getContext();
        String username = context.getAuthentication().getName();

        // Find the user by username
        User user = userRepository.findByUsername(username)
                .orElseThrow(() -> new AppException(ErrorCode.USER_NOT_FOUND));

        // Encode the new password and set it
        user.setPassword(passwordEncoder.encode(request.getPassword()));

        userRepository.save(user);
        return "Thay đổi mật khẩu cho "+username+" thành công";
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

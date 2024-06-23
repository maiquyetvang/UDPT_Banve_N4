package com.udpt_banve.profileservice.service;

import com.udpt_banve.profileservice.dto.request.UpdateUserProfileRequest;
import com.udpt_banve.profileservice.mapper.UserProfileMapper;
import com.udpt_banve.profileservice.model.UserProfile;
import com.udpt_banve.profileservice.repository.UserProfileRepository;
import lombok.AccessLevel;
import lombok.RequiredArgsConstructor;
import lombok.experimental.FieldDefaults;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Service;

import java.util.List;


@Service
@RequiredArgsConstructor
@FieldDefaults(level = AccessLevel.PRIVATE,makeFinal = true)
@Slf4j
public class UserProfileService {

    UserProfileRepository userProfileRepository;
//    UserProfileMapper userProfileMapper;

    @PreAuthorize("hasRole('ADMIN')")
    public List<UserProfile> getAllProfiles() {
        return userProfileRepository.findAll();
    }

    public UserProfile getProfileById(String userId) {
        return userProfileRepository.findById(userId).orElse(null);
    }

    public UserProfile createProfile(UserProfile userProfile) {
        var context = SecurityContextHolder.getContext();
        String username = context.getAuthentication().getName();
        userProfile.setUsername(username);
        return userProfileRepository.save(userProfile);
    }

//    public UserProfile updateProfile(UpdateUserProfileRequest request) {
//        var context = SecurityContextHolder.getContext();
//        String username = context.getAuthentication().getName();
//        if (userProfileRepository.existsByUsername(username))
//            return null;
//
////        return userMapper.toUserResponse(userRepository.findByUsername(username)
////                .orElseThrow(()->new AppException(ErrorCode.USER_NOT_FOUND)));
//        UserProfile userProfile = userProfileMapper.toUserProfile(request);
//
//        log.info("username: " + username);
//        if (userProfileRepository.existsByUsername(username)) {
//            userProfile.setUsername(username);
//            return userProfileRepository.save(userProfile);
//        }
//        return null;
//    }

    @PreAuthorize("hasRole('ADMIN')")
    public String deleteProfile(String userId) {
        userProfileRepository.deleteById(userId);
        return "Profile deleted";
    }
}

package com.udpt_banve.profileservice.service;

import com.udpt_banve.profileservice.model.UserProfile;
import com.udpt_banve.profileservice.repository.UserProfileRepository;
import lombok.AccessLevel;
import lombok.RequiredArgsConstructor;
import lombok.experimental.FieldDefaults;
import lombok.extern.slf4j.Slf4j;
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


    public UserProfile getMyProfile() {
        var context = SecurityContextHolder.getContext();
        String username = context.getAuthentication().getName();

        log.info("username: {}",username);
        UserProfile userProfile = userProfileRepository.findByUsername(username);
        if (userProfile == null) {
            throw  new RuntimeException("ErrorCode.USER_NOT_FOUND");
        }
        return userProfileRepository.save(userProfile);
    }

//    public UserProfile updateProfile(UserProfile request) {
//        // Kiểm tra xem người dùng có tồn tại không
//        var context = SecurityContextHolder.getContext();
//        String username = context.getAuthentication().getName();
////        log.info("username: " + username);
////
////        if (userProfileRepository.existsByUsername(username))
////            throw  new RuntimeException("ErrorCode.USER_NOT_FOUND");
//
//
//        // Cập nhật thông tin profile
//        request.setUsername(username);
//        return userProfileRepository.save(request);
//    }

    @PreAuthorize("hasRole('ADMIN')")
    public String deleteProfile(String userId) {
        userProfileRepository.deleteById(userId);
        return "Profile deleted";
    }
}

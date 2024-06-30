package com.udpt_banve.profileservice.controller;

import com.udpt_banve.profileservice.dto.response.ApiResponse;
import com.udpt_banve.profileservice.model.UserProfile;
import com.udpt_banve.profileservice.service.UserProfileService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/profiles/users")
public class UserProfileController {

    @Autowired
    private UserProfileService userProfileService;

    @GetMapping
    public ApiResponse<List<UserProfile>> getAllProfiles() {
        return ApiResponse.<List<UserProfile>>builder()
                .result(userProfileService.getAllProfiles())
                .build();
//        return userProfileService.getAllProfiles();
    }

    // Chưa xong
    @GetMapping("/{userId}")
    public ResponseEntity<UserProfile> getProfileById(@PathVariable String userId) {
        UserProfile userProfile = userProfileService.getProfileById(userId);
        if (userProfile == null) {
            return ResponseEntity.notFound().build();
        }
        return ResponseEntity.ok(userProfile);
    }


    @GetMapping("/my")
    public ApiResponse<UserProfile> myProfile() {
        return ApiResponse.<UserProfile>builder()
                .result(userProfileService.getMyProfile())
                .build();
    }
    @PostMapping
    public ApiResponse<UserProfile> createProfile(@RequestBody UserProfile userProfile) {
        return ApiResponse.<UserProfile>builder()
                .result(userProfileService.createProfile(userProfile))
                .build();
    }


//    // Chưa ne
//    @PutMapping
//    public ApiResponse<UserProfile> updateProfile(@RequestBody UserProfile request) {
//        return ApiResponse.<UserProfile>builder()
//                .result(userProfileService.updateProfile(request))
//                .build();
//    }

    @DeleteMapping("/{userId}")
    public ApiResponse<String> deleteProfile(@PathVariable String userId) {
        return ApiResponse.<String>builder()
                .result(userProfileService.deleteProfile(userId))
                .build();
//        userProfileService.deleteProfile(userId);
//        return ResponseEntity.noContent().build();
    }
}

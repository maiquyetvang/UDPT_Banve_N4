package com.udpt_banve.profileservice.controller;

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
    public List<UserProfile> getAllProfiles() {
        return userProfileService.getAllProfiles();
    }

    @GetMapping("/{userId}")
    public ResponseEntity<UserProfile> getProfileById(@PathVariable String userId) {
        UserProfile userProfile = userProfileService.getProfileById(userId);
        if (userProfile == null) {
            return ResponseEntity.notFound().build();
        }
        return ResponseEntity.ok(userProfile);
    }

    @PostMapping
    public UserProfile createProfile(@RequestBody UserProfile userProfile) {
        return userProfileService.createProfile(userProfile);
    }

    @PutMapping("/{userId}")
    public ResponseEntity<UserProfile> updateProfile(@PathVariable String userId, @RequestBody UserProfile userProfile) {
        UserProfile updatedProfile = userProfileService.updateProfile(userId, userProfile);
        if (updatedProfile == null) {
            return ResponseEntity.notFound().build();
        }
        return ResponseEntity.ok(updatedProfile);
    }

    @DeleteMapping("/{userId}")
    public ResponseEntity<Void> deleteProfile(@PathVariable String userId) {
        userProfileService.deleteProfile(userId);
        return ResponseEntity.noContent().build();
    }
}

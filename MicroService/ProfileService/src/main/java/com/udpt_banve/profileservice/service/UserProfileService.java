package com.udpt_banve.profileservice.service;

import com.udpt_banve.profileservice.model.UserProfile;
import com.udpt_banve.profileservice.repository.UserProfileRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class UserProfileService {

    @Autowired
    private UserProfileRepository userProfileRepository;

    @PreAuthorize("hasRole('ADMIN')")
    public List<UserProfile> getAllProfiles() {
        return userProfileRepository.findAll();
    }

    public UserProfile getProfileById(String userId) {
        return userProfileRepository.findById(userId).orElse(null);
    }

    public UserProfile createProfile(UserProfile userProfile) {
        return userProfileRepository.save(userProfile);
    }

    public UserProfile updateProfile(String userId, UserProfile userProfile) {
        if (userProfileRepository.existsById(userId)) {
            userProfile.setUserId(userId);
            return userProfileRepository.save(userProfile);
        }
        return null;
    }

    public void deleteProfile(String userId) {
        userProfileRepository.deleteById(userId);
    }
}

package com.udpt_banve.profileservice.service;

import com.udpt_banve.profileservice.model.EventAdminProfile;
import com.udpt_banve.profileservice.repository.EventAdminProfileRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class EventAdminProfileService {

    @Autowired
    private EventAdminProfileRepository eventAdminProfileRepository;

    @PreAuthorize("hasRole('ADMIN')")
    public List<EventAdminProfile> getAllProfiles() {
        return eventAdminProfileRepository.findAll();
    }

    public EventAdminProfile getProfileById(String userId) {
        return eventAdminProfileRepository.findById(userId).orElse(null);
    }

    public EventAdminProfile createProfile(EventAdminProfile eventAdminProfile) {
        return eventAdminProfileRepository.save(eventAdminProfile);
    }

    public EventAdminProfile updateProfile(String userId, EventAdminProfile eventAdminProfile) {
        if (eventAdminProfileRepository.existsById(userId)) {
            eventAdminProfile.setUserId(userId);
            return eventAdminProfileRepository.save(eventAdminProfile);
        }
        return null;
    }

    public void deleteProfile(String userId) {
        eventAdminProfileRepository.deleteById(userId);
    }
}

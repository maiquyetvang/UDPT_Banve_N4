package com.udpt_banve.profileservice.controller;

import com.udpt_banve.profileservice.model.EventAdminProfile;
import com.udpt_banve.profileservice.service.EventAdminProfileService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/profiles/event-admin")
public class EventAdminProfileController {

    @Autowired
    private EventAdminProfileService eventAdminProfileService;

    @GetMapping
    public List<EventAdminProfile> getAllProfiles() {
        return eventAdminProfileService.getAllProfiles();
    }

//    @GetMapping("/{userId}")
//    public ResponseEntity<EventAdminProfile> getProfileById(@PathVariable String userId) {
//        EventAdminProfile eventAdminProfile = eventAdminProfileService.getProfileById(userId);
//        if (eventAdminProfile == null) {
//            return ResponseEntity.notFound().build();
//        }
//        return ResponseEntity.ok(eventAdminProfile);
//    }

    @PostMapping
    public EventAdminProfile createProfile(@RequestBody EventAdminProfile eventAdminProfile) {
        var context = SecurityContextHolder.getContext();
        String username = context.getAuthentication().getName();
        eventAdminProfile.setUsername(username);
        return eventAdminProfileService.createProfile(eventAdminProfile);
    }
//
//    @PutMapping("/{userId}")
//    public ResponseEntity<EventAdminProfile> updateProfile(@PathVariable String userId, @RequestBody EventAdminProfile eventAdminProfile) {
//        EventAdminProfile updatedProfile = eventAdminProfileService.updateProfile(userId, eventAdminProfile);
//        if (updatedProfile == null) {
//            return ResponseEntity.notFound().build();
//        }
//        return ResponseEntity.ok(updatedProfile);
//    }
//
//    @DeleteMapping("/{userId}")
//    public ResponseEntity<Void> deleteProfile(@PathVariable String userId) {
//        eventAdminProfileService.deleteProfile(userId);
//        return ResponseEntity.noContent().build();
//    }
}

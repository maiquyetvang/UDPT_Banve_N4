package com.udpt_banve.profileservice.repository;

import com.udpt_banve.profileservice.model.EventAdminProfile;
import org.springframework.data.mongodb.repository.MongoRepository;

public interface EventAdminProfileRepository extends MongoRepository<EventAdminProfile, String> {
//    boolean existsByUsername(String username);
}
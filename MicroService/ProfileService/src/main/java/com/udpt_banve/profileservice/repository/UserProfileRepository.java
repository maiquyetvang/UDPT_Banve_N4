package com.udpt_banve.profileservice.repository;

import com.udpt_banve.profileservice.model.UserProfile;
import org.springframework.data.mongodb.repository.MongoRepository;

public interface UserProfileRepository extends MongoRepository<UserProfile, String> {
//    @Override
//    boolean existsById(String s);

    boolean existsByUsername(String username);
}

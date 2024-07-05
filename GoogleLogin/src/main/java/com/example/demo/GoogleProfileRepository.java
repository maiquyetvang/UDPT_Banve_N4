package com.example.demo;

import org.springframework.data.mongodb.repository.MongoRepository;

public interface GoogleProfileRepository extends MongoRepository<GoogleProfile, String> {
}

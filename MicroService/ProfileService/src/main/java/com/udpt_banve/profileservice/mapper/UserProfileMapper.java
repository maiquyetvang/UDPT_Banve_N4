package com.udpt_banve.profileservice.mapper;

import com.udpt_banve.profileservice.dto.request.UpdateUserProfileRequest;
import com.udpt_banve.profileservice.model.UserProfile;
import org.mapstruct.Mapper;

@Mapper(componentModel = "spring")
public interface UserProfileMapper {
    UserProfile toUserProfile(UpdateUserProfileRequest updateUserProfileRequest);

}

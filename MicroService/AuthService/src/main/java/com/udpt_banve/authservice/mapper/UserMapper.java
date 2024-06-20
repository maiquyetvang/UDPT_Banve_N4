package com.udpt_banve.authservice.mapper;

import com.udpt_banve.authenticationservice.dto.request.UserCreationRequest;
import com.udpt_banve.authenticationservice.dto.response.UserCreationResponse;
import com.udpt_banve.authenticationservice.dto.response.UserResponse;
import com.udpt_banve.authenticationservice.entity.User;
import org.mapstruct.Mapper;

@Mapper(componentModel = "spring")
public interface UserMapper {

    User toUser(UserCreationRequest user);
    UserResponse toUserResponse(User user);
    UserCreationResponse toUserCreationResponse(User user);
}

package com.udpt_banve.authservice.mapper;

import com.udpt_banve.authservice.dto.request.EventAdminCreationRequest;
import com.udpt_banve.authservice.dto.request.EventAdminProfileCreationRequest;
import com.udpt_banve.authservice.dto.request.UserCreationRequest;
import com.udpt_banve.authservice.dto.request.CustomerProfileCreationRequest;
import com.udpt_banve.authservice.dto.response.UserCreationResponse;
import com.udpt_banve.authservice.dto.response.UserResponse;
import com.udpt_banve.authservice.entity.User;
import org.mapstruct.Mapper;

@Mapper(componentModel = "spring")
public interface UserMapper {

    User toUser(UserCreationRequest user);
    User toUser(EventAdminCreationRequest user);
    UserResponse toUserResponse(User user);
    UserCreationResponse toUserCreationResponse(User user);
    EventAdminCreationRequest toEventAdminCreationRequest(User user);
    CustomerProfileCreationRequest toCustomerProfileCreationRequest(UserCreationRequest user);
    EventAdminProfileCreationRequest toUserProfileCreationRequest(EventAdminCreationRequest user);
}

package com.udpt_banve.profileservice.mapper;

import com.udpt_banve.profileservice.dto.request.CustomerProfileRequest;
import com.udpt_banve.profileservice.dto.request.UpdateCustomerProfileRequest;
import com.udpt_banve.profileservice.dto.request.UpdateUserRequest;
import com.udpt_banve.profileservice.dto.response.CustomerProfileResponse;
import com.udpt_banve.profileservice.model.CustomerProfile;
import javax.annotation.processing.Generated;
import org.springframework.stereotype.Component;

@Generated(
    value = "org.mapstruct.ap.MappingProcessor",
    date = "2024-07-05T19:29:05+0700",
    comments = "version: 1.5.5.Final, compiler: javac, environment: Java 17.0.11 (Amazon.com Inc.)"
)
@Component
public class CustomerProfileMapperImpl implements CustomerProfileMapper {

    @Override
    public UpdateUserRequest toUpdateUserRequest(CustomerProfile customerProfile) {
        if ( customerProfile == null ) {
            return null;
        }

        UpdateUserRequest.UpdateUserRequestBuilder updateUserRequest = UpdateUserRequest.builder();

        updateUserRequest.username( customerProfile.getUsername() );
        updateUserRequest.email( customerProfile.getEmail() );
        updateUserRequest.picture( customerProfile.getPicture() );

        return updateUserRequest.build();
    }

    @Override
    public UpdateUserRequest toUpdateUserRequest(CustomerProfileRequest customerProfileRequest) {
        if ( customerProfileRequest == null ) {
            return null;
        }

        UpdateUserRequest.UpdateUserRequestBuilder updateUserRequest = UpdateUserRequest.builder();

        updateUserRequest.username( customerProfileRequest.getUsername() );
        updateUserRequest.email( customerProfileRequest.getEmail() );
        updateUserRequest.picture( customerProfileRequest.getPicture() );

        return updateUserRequest.build();
    }

    @Override
    public CustomerProfile toCustomerProfile(CustomerProfileRequest customerProfileRequest) {
        if ( customerProfileRequest == null ) {
            return null;
        }

        CustomerProfile.CustomerProfileBuilder customerProfile = CustomerProfile.builder();

        customerProfile.user_id( customerProfileRequest.getUser_id() );
        customerProfile.username( customerProfileRequest.getUsername() );
        customerProfile.firstName( customerProfileRequest.getFirstName() );
        customerProfile.lastName( customerProfileRequest.getLastName() );
        customerProfile.gender( customerProfileRequest.getGender() );
        customerProfile.phoneNumber( customerProfileRequest.getPhoneNumber() );
        customerProfile.email( customerProfileRequest.getEmail() );
        customerProfile.dateOfBirth( customerProfileRequest.getDateOfBirth() );
        customerProfile.street( customerProfileRequest.getStreet() );
        customerProfile.district( customerProfileRequest.getDistrict() );
        customerProfile.province( customerProfileRequest.getProvince() );
        customerProfile.picture( customerProfileRequest.getPicture() );

        return customerProfile.build();
    }

    @Override
    public CustomerProfile toCustomerProfile(UpdateCustomerProfileRequest request) {
        if ( request == null ) {
            return null;
        }

        CustomerProfile.CustomerProfileBuilder customerProfile = CustomerProfile.builder();

        customerProfile.username( request.getUsername() );
        customerProfile.firstName( request.getFirstName() );
        customerProfile.lastName( request.getLastName() );
        customerProfile.gender( request.getGender() );
        customerProfile.phoneNumber( request.getPhoneNumber() );
        customerProfile.email( request.getEmail() );
        customerProfile.dateOfBirth( request.getDateOfBirth() );
        customerProfile.street( request.getStreet() );
        customerProfile.district( request.getDistrict() );
        customerProfile.province( request.getProvince() );
        customerProfile.picture( request.getPicture() );

        return customerProfile.build();
    }

    @Override
    public CustomerProfileResponse toCustomerProfileResponse(CustomerProfile customerProfile) {
        if ( customerProfile == null ) {
            return null;
        }

        CustomerProfileResponse.CustomerProfileResponseBuilder customerProfileResponse = CustomerProfileResponse.builder();

        customerProfileResponse.username( customerProfile.getUsername() );
        customerProfileResponse.firstName( customerProfile.getFirstName() );
        customerProfileResponse.lastName( customerProfile.getLastName() );
        customerProfileResponse.gender( customerProfile.getGender() );
        customerProfileResponse.phoneNumber( customerProfile.getPhoneNumber() );
        customerProfileResponse.email( customerProfile.getEmail() );
        customerProfileResponse.dateOfBirth( customerProfile.getDateOfBirth() );
        customerProfileResponse.street( customerProfile.getStreet() );
        customerProfileResponse.district( customerProfile.getDistrict() );
        customerProfileResponse.province( customerProfile.getProvince() );

        return customerProfileResponse.build();
    }
}

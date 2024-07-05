package com.udpt_banve.profileservice.mapper;

import com.udpt_banve.profileservice.dto.request.EventAdminProfileRequest;
import com.udpt_banve.profileservice.dto.request.UpdateEventAdminProfileRequest;
import com.udpt_banve.profileservice.dto.request.UpdateUserRequest;
import com.udpt_banve.profileservice.dto.response.EventAdminProfileResponse;
import com.udpt_banve.profileservice.model.EventAdminProfile;
import javax.annotation.processing.Generated;
import org.springframework.stereotype.Component;

@Generated(
    value = "org.mapstruct.ap.MappingProcessor",
    date = "2024-07-05T19:29:05+0700",
    comments = "version: 1.5.5.Final, compiler: javac, environment: Java 17.0.11 (Amazon.com Inc.)"
)
@Component
public class EventAdminProfileMapperImpl implements EventAdminProfileMapper {

    @Override
    public UpdateUserRequest toUpdateUserRequest(EventAdminProfile eventAdminProfile) {
        if ( eventAdminProfile == null ) {
            return null;
        }

        UpdateUserRequest.UpdateUserRequestBuilder updateUserRequest = UpdateUserRequest.builder();

        updateUserRequest.username( eventAdminProfile.getUsername() );
        updateUserRequest.email( eventAdminProfile.getEmail() );
        updateUserRequest.picture( eventAdminProfile.getPicture() );

        return updateUserRequest.build();
    }

    @Override
    public UpdateUserRequest toUpdateUserRequest(EventAdminProfileRequest customerProfileRequest) {
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
    public EventAdminProfile toEventAdminProfile(EventAdminProfileRequest eventAdminProfileRequest) {
        if ( eventAdminProfileRequest == null ) {
            return null;
        }

        EventAdminProfile.EventAdminProfileBuilder eventAdminProfile = EventAdminProfile.builder();

        eventAdminProfile.user_id( eventAdminProfileRequest.getUser_id() );
        eventAdminProfile.username( eventAdminProfileRequest.getUsername() );
        eventAdminProfile.ownerName( eventAdminProfileRequest.getOwnerName() );
        eventAdminProfile.businessName( eventAdminProfileRequest.getBusinessName() );
        eventAdminProfile.phoneNumber( eventAdminProfileRequest.getPhoneNumber() );
        eventAdminProfile.email( eventAdminProfileRequest.getEmail() );
        eventAdminProfile.taxCode( eventAdminProfileRequest.getTaxCode() );
        eventAdminProfile.headOffice( eventAdminProfileRequest.getHeadOffice() );
        eventAdminProfile.picture( eventAdminProfileRequest.getPicture() );

        return eventAdminProfile.build();
    }

    @Override
    public EventAdminProfile toEventAdminProfile(UpdateEventAdminProfileRequest updateEventAdminProfileRequest) {
        if ( updateEventAdminProfileRequest == null ) {
            return null;
        }

        EventAdminProfile.EventAdminProfileBuilder eventAdminProfile = EventAdminProfile.builder();

        eventAdminProfile.username( updateEventAdminProfileRequest.getUsername() );
        eventAdminProfile.ownerName( updateEventAdminProfileRequest.getOwnerName() );
        eventAdminProfile.businessName( updateEventAdminProfileRequest.getBusinessName() );
        eventAdminProfile.phoneNumber( updateEventAdminProfileRequest.getPhoneNumber() );
        eventAdminProfile.email( updateEventAdminProfileRequest.getEmail() );
        eventAdminProfile.taxCode( updateEventAdminProfileRequest.getTaxCode() );
        eventAdminProfile.headOffice( updateEventAdminProfileRequest.getHeadOffice() );
        eventAdminProfile.picture( updateEventAdminProfileRequest.getPicture() );

        return eventAdminProfile.build();
    }

    @Override
    public EventAdminProfileResponse toEventAdminProfileResponse(EventAdminProfile eventAdminProfile) {
        if ( eventAdminProfile == null ) {
            return null;
        }

        EventAdminProfileResponse.EventAdminProfileResponseBuilder eventAdminProfileResponse = EventAdminProfileResponse.builder();

        eventAdminProfileResponse.username( eventAdminProfile.getUsername() );
        eventAdminProfileResponse.ownerName( eventAdminProfile.getOwnerName() );
        eventAdminProfileResponse.businessName( eventAdminProfile.getBusinessName() );
        eventAdminProfileResponse.phoneNumber( eventAdminProfile.getPhoneNumber() );
        eventAdminProfileResponse.email( eventAdminProfile.getEmail() );
        eventAdminProfileResponse.taxCode( eventAdminProfile.getTaxCode() );
        eventAdminProfileResponse.headOffice( eventAdminProfile.getHeadOffice() );

        return eventAdminProfileResponse.build();
    }
}

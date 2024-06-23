package com.udpt_banve.authservice.exception;

import lombok.Getter;
import org.springframework.http.HttpStatus;
import org.springframework.http.HttpStatusCode;

@Getter
public enum ErrorCode {
    UNCATEGORIZED_EXCEPTION(9999, "Lỗi không xác định", HttpStatus.INTERNAL_SERVER_ERROR),
    USER_EXISTED(1001, "Người dùng đã tồn tại",HttpStatus.BAD_REQUEST),
    INVALID_USERNAME(1002, "Tên người dùng phải chứa ít nhất 4 ký tự", HttpStatus.BAD_REQUEST),
    INVALID_PASSWORD(1003, "Mật khẩu phải chứa ít nhất 6 ký tự", HttpStatus.BAD_REQUEST),
    INVALID_KEY(1004, "Invalid message key", HttpStatus.BAD_REQUEST),
    USER_NOT_FOUND(1005,"Người dùng không tồn tại", HttpStatus.NOT_FOUND),
    UNAUTHENTICATED(1006,"Xác thực không thành công", HttpStatus.UNAUTHORIZED),
    INVALID_ROLE(1007,"Role không tồn tại", HttpStatus.BAD_REQUEST),
    UNAUTHORIZED(1008,"Xác thực không thành công", HttpStatus.UNAUTHORIZED),
    INVALID_EMAIL(1009,"Email không hợp lệ", HttpStatus.BAD_REQUEST),
    EMAIL_EXISTED(1010,"Email đã tồn tại", HttpStatus.BAD_REQUEST),
    ;
    ErrorCode(int code, String message, HttpStatusCode statusCode) {
        this.code = code;
        this.message = message;
        this.statusCode = statusCode;
    }

    private final int code;
    private final String message;
    private final HttpStatusCode statusCode;
}

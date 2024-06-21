package com.udpt_banve.authservice.exception;

import lombok.Getter;

@Getter
public enum ErrorCode {
    UNCATEGORIZED_EXCEPTION(9999, "Lỗi không xác định"),
    USER_EXISTED(1001, "Người dùng đã tồn tại"),
    INVALID_USERNAME(1002, "Tên người dùng phải chứa ít nhất 4 ký tự"),
    INVALID_PASSWORD(1003, "Mật khẩu phải chứa ít nhất 6 ký tự"),
    INVALID_KEY(1004, "Invalid message key"),
    USER_NOT_FOUND(1005,"Người dùng không tồn tại"),
    UNAUTHENTICATED(1005,"Xác thực không thành công"),
    INVALID_ROLE(1005,"Role không tồn tại")
    ;
    ErrorCode(int code, String message) {
        this.code = code;
        this.message = message;
    }
    private int code;
    private String message;
}

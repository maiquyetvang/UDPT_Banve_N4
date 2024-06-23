### Personal Workspace

#### GATEWAY - Auth Service
**Version:** CURRENT  
**Language:** GATEWAY - Auth Service

---

#### Đăng ký KHACHHANG
- **Method:** POST
- **URL:** `http://localhost:9000/api/auth/users/register`

**Body:**
```json
{
    "username": "nguyenvana123m111",
    "password": "password456",
    "email": "nguyenvana123@example.commm",
    "firstName": "Nguyen Van",
    "lastName": "A",
    "gender": "male",
    "phoneNumber": "0123456789",
    "dateOfBirth": "1990-01-01",
    "street": "456 Example Street",
    "district": "Example District",
    "province": "Example Province"
}
```

---

#### Đăng ký EVENT_ADMIN
- **Method:** POST
- **URL:** `http://localhost:9000/api/auth/users/register_eventadmin`

**Body:**
```json
{
    "username": "nguyenvana",
    "password": "password123",
    "email": "nguyenvana@example.com",
    "businessName": "ABC Company",
    "phoneNumber": "0987654321",
    "taxCode": "123456789",
    "headOffice": "123 Example Street, Example City"
}
```

---

#### Đăng nhập
- **Method:** POST
- **URL:** `http://localhost:9000/api/auth/login`

**Body:**
```json
{
    "username": "admin",
    "password": "adminn"
}
```

---

#### Đăng nhập google
- **Method:** GET
- **URL:** `http://localhost:8081/SSO/login`

---

#### Đổi mật khẩu
- **Method:** POST
- **URL:** `http://localhost:9000/api/auth/users/changepassword`

**Authorization:**
Bearer Token `<token>`

**Body:**
```json
{
    "password": "adminn"
}
```

---

#### Thông tin tài khoản cả nhân
- **Method:** GET
- **URL:** `http://localhost:9000/api/auth/users/myinfo`

**Authorization:**
Bearer Token `<token>`

---

#### Thông tin theo username
- **Method:** GET
- **URL:** `http://localhost:9000/api/auth/users/mytrinh8`

**Authorization:**
Bearer Token `<token>`

---

#### Get all user (admin)
- **Method:** GET
- **URL:** `http://localhost:9000/api/auth/users`

**Authorization:**
Bearer Token `<token>`

---

#### Kiểm tra token
- **Method:** POST
- **URL:** `http://localhost:8888/api/auth/introspect`

**Body:**
```json
{
    "token": "eyJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJ1ZHB0X2JhbnZlIiwic3ViIjoibXl0cmluaDgiLCJleHAiOjE3MTg5MjI1NjIsImlhdCI6MTcxODgzNjE2Miwic2NvcGUiOiJVU0VSIn0.LUbO9Mo2dWEIVEaNfeQ1rXSToxLsEDxmnA-HYHTgx1MNNW_DYSExczLVTWJ-qD9VY8UuWcMZ9aT79BBnGN2K7Q"
}
```

---

#### get all profile USER
- **Method:** GET
- **URL:** `http://localhost:9000/api/profiles/users`

**Authorization:**
Bearer Token `<token>`

**Body:**
```json
{
    "userId": "user7819",
    "firstName": "Alice",
    "lastName": "Johnson",
    "gender": "Khác",
    "phoneNumber": "123123123",
    "dateOfBirth": "2000-12-12",
    "street": "789 Pine St",
    "district": "District 3",
    "province": "HCM"
}
```

---

#### Thêm mới profile USER
- **Method:** POST
- **URL:** `http://localhost:9000/api/profiles/users`

**Authorization:**
Bearer Token `<token>`

**Body:**
```json
{
    "firstName": "Alice",
    "lastName": "Johnson",
    "gender": "Nam",
    "phoneNumber": "123123123",
    "dateOfBirth": "2000-12-12",
    "street": "789 Pine St",
    "district": "District 3",
    "province": "HCM"
}
```

---

#### Cập nhật profile USER
- **Method:** PUT
- **URL:** `http://localhost:9000/api/profiles/users`

**Authorization:**
Bearer Token `<token>`

**Body:**
```json
{
    "firstName": "Alice",
    "lastName": "Johnson",
    "gender": "Nam",
    "phoneNumber": "123123123",
    "dateOfBirth": "2000-12-12",
    "street": "789 Pine St",
    "district": "District 3",
    "province": "HCM"
}
```

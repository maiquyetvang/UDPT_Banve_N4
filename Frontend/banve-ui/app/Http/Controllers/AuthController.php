<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $client = new Client();

        try {
            $response = $client->post('http://localhost:9000/api/auth/login', [
                'json' => [
                    'username' => $request->input('username'),
                    'password' => $request->input('password')
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if (isset($body['result'])) {
                $result = $body['result'];

                // Lưu token và thông tin người dùng vào session
                Session::put('jwt_token', $result['token']);
                Session::put('user', $result);

                if ($result['role'] === 'CUSTOMER') {
                    return redirect()->route('home.index'); // Chuyển hướng về trang chủ
                } 
                elseif ($result['role'] === 'EVENT_ADMIN') {
                    return redirect()->route('eadmin.home'); // Chuyển hướng về trang quản trị event
                } 
                elseif ($result['role'] === 'ADMIN') {
                    return redirect()->route('admin.home'); // Chuyển hướng về trang quản trị event
                } 
                else {
                    return redirect()->back()->with('error', 'Role không hợp lệ.');
                }
            } else {
                return redirect()->back()->with('error', $body['message'] ?? 'Đăng nhập thất bại.');
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // Lấy thông báo lỗi từ response của API
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $body = json_decode($responseBodyAsString, true);

            return redirect()->back()->with('error', $body['message'] ?? 'An error occurred.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        Session::forget(['jwt_token', 'user']);
        return redirect()->route('home.index');
    }

    public function showRegistrationChoice()
    {
        return view('choose_registration');
    }
}
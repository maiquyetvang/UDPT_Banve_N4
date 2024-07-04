<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showSignUpForm()
    {
        return view('users.signup');
    }
    public function showProfile()
    {
        
        return view('users.profile');
    }
    public function getProfile()
    {
        $client = new Client();
        $token = Session::get('jwt_token');

        try {
            $response = $client->get('http://localhost:9000/api/profiles/customer/my-profile', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['code'] == 1000) {
                $profile = $body['result'];
                return view('users.profile', compact('profile'));
            } else {
                return redirect()->back()->with('error', 'Unable to fetch profile.');
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
    public function updateProfile(Request $request)
    {
        $client = new Client();
        $token = Session::get('jwt_token');

        $formData = [
            'username' => $request->input('username'),
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'gender' => $request->input('gender'),
            'phoneNumber' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'street' => $request->input('street'),
            'district' => $request->input('district'),
            'province' => $request->input('province'),
        ];

        try {
            $response = $client->put('http://localhost:9000/api/profiles/customer', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
                'json' => $formData,
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['code'] == 1000) {
                // Cập nhật thông tin thành công
                return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
            } else {
                // Xử lý lỗi nếu có
                return redirect()->back()->with('error', 'Update failed: ' . $body['message']);
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $body = json_decode($responseBodyAsString, true);

            return redirect()->back()->with('error', $body['message'] ?? 'An error occurred.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    
    public function signUp(Request $request)
    {
        $client = new Client();

        $formData = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'gender' => $request->input('gender'),
            'phoneNumber' => $request->input('phoneNumber'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'street' => $request->input('street'),
            'district' => $request->input('district'),
            'province' => $request->input('province'),
        ];

        try {
            $response = $client->post('http://localhost:9000/api/auth/users/register', [
                'json' => $formData,
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['code'] == 1000) {
                return redirect()->route('login')->with('success', 'Signup successful. Please login.');
            } else {
                return redirect()->back()->with('error', 'Signup failed: ' . $body['message']);
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $body = json_decode($responseBodyAsString, true);

            return redirect()->back()->with('error', $body['message'] ?? 'An error occurred.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function showChangePasswordForm()
    {
        return view('users.changepassword');
    }
    public function changePassword(Request $request)
    {
        $client = new Client();
        $token = Session::get('jwt_token');

        $formData = [
            'password' => $request->input('newPassword'),
        ];

        try {
            $response = $client->post('http://localhost:9000/api/auth/users/changepassword', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
                'json' => $formData,
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['code'] == 1000) {
                Session::forget(['jwt_token', 'user']);

                return redirect()->route('login')->with('success', 'Password changed successfully. Please log in with your new password.');
            } else {
                return redirect()->back()->with('error', $body['message'] ?? 'Unable to change password.');
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $body = json_decode($responseBodyAsString, true);

            return redirect()->back()->with('error', $body['message'] ?? 'An error occurred.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

}
<?php

namespace App\Http\Controllers;
//Admin bên cung cấp sự kiện
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class AdmineventController extends Controller
{
    //
    public function showSignUpForm()
    {
        return view('adminevents.signup');
    }
    public function index()
    {
        return view('adminevents.home');
    }
    public function policy()
    {
        return view('adminevents.policy');
    }
   
    public function contract()
    {
        $client = new Client();
        $token = Session::get('jwt_token');

        try {
            $response = $client->get('http://localhost:9000/api/profiles/event-admin/my-profile', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['code'] == 1000) {
                $profile = $body['result'];
                return view('adminevents.contract', compact('profile'));
            } else {
                return redirect()->back()->with('error', 'Unable to fetch profile.');
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
            'businessName' => $request->input('businessName'),
            'phoneNumber' => $request->input('phoneNumber'),
            'taxCode' => $request->input('taxCode'),
            'headOffice' => $request->input('headOffice'),
           
        ];

        try {
            $response = $client->post('http://localhost:9000/api/auth/users/register_eventadmin', [
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
    public function getProfile()
    {
        $client = new Client();
        $token = Session::get('jwt_token');

        try {
            $response = $client->get('http://localhost:9000/api/profiles/event-admin/my-profile', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['code'] == 1000) {
                $profile = $body['result'];
                return view('adminevents.profile', compact('profile'));
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
    public function showChangePasswordForm()
    {
        return view('adminevents.changepassword');
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
    public function updateProfile(Request $request)
{
    $client = new Client();
    $token = Session::get('jwt_token'); // Lấy token từ session

    // Dữ liệu đầu vào từ form
    $formData = [
        'username' => $request->input('username'),
        'businessName' => $request->input('businessName'),
        'phoneNumber' => $request->input('phoneNumber'),
        'email' => $request->input('email'),
        'taxCode' => $request->input('taxCode'),
        'headOffice' => $request->input('headOffice'),
    ];

    try {
        // Gửi yêu cầu PUT để cập nhật hồ sơ
        $response = $client->put('http://localhost:9000/api/profiles/event-admin', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ],
            'json' => $formData,
        ]);

        $body = json_decode($response->getBody(), true);

        if ($body['code'] == 1000) {
            // Cập nhật thành công, tải lại trang hồ sơ
            return redirect()->route('adminevents.profile')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to update profile: ' . $body['message']);
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
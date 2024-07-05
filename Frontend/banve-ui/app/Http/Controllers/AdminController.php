<?php
//Admin của hệ thống
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admins.home');
    }
    public function getAllCustomer()
    {
        $client = new Client();
        $token = Session::get('jwt_token');

        try {
            $response = $client->get('http://localhost:9000/api/profiles/customer', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['code'] == 1000) {
                $customers = $body['result'];
                return view('admins.customers', compact('customers'));
            } else {
                return redirect()->back()->with('error', 'Unable to fetch customers.');
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
    public function getCustomerByUsername($username)
    {
        $client = new Client();
        $token = Session::get('jwt_token');

        try {
            $response = $client->get("http://localhost:9000/api/profiles/customer/{$username}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['code'] == 1000) {
                $customer = $body['result'];
                return view('admins.customer_detail', compact('customer'));
            } else {
                return redirect()->back()->with('error', 'Unable to fetch customer details.');
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
    public function getAllAdminevent()
    {
        $client = new Client();
        $token = Session::get('jwt_token');

        try {
            $response = $client->get('http://localhost:9000/api/profiles/event-admin', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['code'] == 1000) {
                $eventAdmins = $body['result'];
                return view('admins.adminevents', compact('eventAdmins'));
            } else {
                return redirect()->back()->with('error', 'Unable to fetch event admins.');
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
    public function getAdmineventByUsername($username)
    {
        $client = new Client();
        $token = Session::get('jwt_token');

    try {
        $response = $client->get("http://localhost:9000/api/profiles/event-admin/{$username}", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ]
        ]);

        $body = json_decode($response->getBody(), true);

        if ($body['code'] == 1000) {
            $eventAdmin = $body['result'];
            return view('admins.adminevent_detail', compact('eventAdmin'));
        } else {
            return redirect()->back()->with('error', 'Unable to fetch event admin details.');
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
    public function getPendingEventAdmin()
    {
        $client = new Client();
        $token = Session::get('jwt_token');

        try {
            $response = $client->get('http://localhost:9000/api/auth/users/pending_event-admin', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body) {
                $eventAdmins = $body;

                return view('admins.pending_eadmin', compact('eventAdmins'));
            } else {
                return redirect()->back()->with('error', 'No pending event admins found.');
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
    public function rejectEventAdmin($username)
    {
        $client = new Client();
        $token = Session::get('jwt_token');

        try {
            $response = $client->post("http://localhost:9000/api/auth/admin/reject_eventadmin/{$username}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['code'] == 1000) {
                return redirect()->back()->with('success', "Tài khoản {$username} đã bị từ chối duyệt.");
            } else {
                return redirect()->back()->with('error', 'Failed to reject event admin.');
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

    public function approveEventAdmin($username)
    {
        $client = new Client();
        $token = Session::get('jwt_token');

        try {
            $response = $client->post("http://localhost:9000/api/auth/admin/approve_eventadmin/{$username}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['code'] == 1000) {
                return redirect()->back()->with('success', "Tài khoản {$username} đã được duyệt thành công.");
            } else {
                return redirect()->back()->with('error', 'Failed to approve event admin.');
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
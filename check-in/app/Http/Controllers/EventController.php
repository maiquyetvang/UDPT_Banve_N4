<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class EventController extends Controller
{
    //
    // public function index(){
    //     return view('events.event_list');
    // }
    public function index()
    {
        try {
            // Lấy token từ session
            $token = Session::get('jwt_token');

            if (!$token) {
                return redirect()->route('login.form')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
            }

            // Fetch data from the API with authorization header
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->get('http://localhost:8081/api/event/businessUser'); // Replace with your actual API URL
            
            if ($response->successful()) {
                $events = $response->json(); // Assuming the API returns a JSON array of events
                
                // Lọc các sự kiện có tinhTrang là "active"
                $activeEvents = array_filter($events, function ($event) {
                    return isset($event['tinhTrang']) && $event['tinhTrang'] === 'Active';
                });
                
                // Định dạng lại ngày tháng cho mỗi sự kiện
                foreach ($activeEvents as &$event) {
                    if (isset($event['thoiGian'])) {
                        // Chuyển đổi và định dạng lại thời gian sử dụng isoFormat
                        $event['thoiGianFormatted'] = Carbon::parse($event['thoiGian'])->isoFormat('ddd, MMMM Do - hA');
                    } else {
                        $event['thoiGianFormatted'] = null; // Xử lý khi thời gian không tồn tại
                    }
                }
                // Sắp xếp lại các chỉ số mảng sau khi lọc
                $activeEvents = array_values($activeEvents);

                // Phân trang dữ liệu thủ công
                $perPage = 3; // Số lượng sự kiện mỗi trang
                $currentPage = request()->input('page', 1); // Lấy trang hiện tại từ request, mặc định là trang 1
                $startingPoint = ($currentPage - 1) * $perPage;
                $paginatedEvents = array_slice($activeEvents, $startingPoint, $perPage);

                // Tạo LengthAwarePaginator thủ công
                $events = new LengthAwarePaginator(
                    $paginatedEvents,
                    count($activeEvents),
                    $perPage,
                    $currentPage,
                    ['path' => request()->url(), 'query' => request()->query()]
                );
                return view('events.event_list', compact('events'));
            } else {
                // Handle non-2xx status codes
                return view('events.event_list')->with('error', 'Failed to fetch data from the API.');
            }
        } catch (\Exception $e) {
            // Handle exceptions (e.g., cURL errors)
            return view('events.event_list')->with('error', 'Error connecting to the API: ' . $e->getMessage());
        }
    }
    public function showCheckIn(Request $request)
    {
        Session::put('event', [
            'maSk' => $request->input('maSk'),
            'ten' => $request->input('ten'),
            'moTa' => $request->input('moTa'),
            'thoiGian' => $request->input('thoiGian'),
            'diaChi' => $request->input('diaChi')
        ]);

        return redirect()->route('events.checkIn');
    }

    public function checkIn()
    {
        $event = Session::get('event');

        if (!$event) {
            return redirect()->route('events.index')->with('error', 'No event selected for check-in.');
        }

        return view('events.check_in', compact('event'));
    }

    public function processCheckIn(Request $request)
    {
        $request->validate([
            'ticket_code' => 'required|string',
            'event_id' => 'required|string'
        ]);

        return redirect()->route('events.checkIn')->with('success', 'Check-in thành công!');
    }
}
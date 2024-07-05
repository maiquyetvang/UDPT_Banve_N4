<?php



namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\alert;
class HomeController extends Controller
{
    //
    public function index()
    {
        try {
            // Fetch data from the API
            $response = Http::get('http://localhost:8081/api/event'); // Replace with your actual API URL
            
            if ($response->successful()) {
                $events = $response->json(); // Assuming the API returns a JSON array of events
                // Lọc các sự kiện có tinhTrang là "active"
                // $activeEvents = array_filter($events, function ($event) {
                //     return isset($event['tinhTrang']) && $event['tinhTrang'] === 'Active';
                // });
                $activeEvents = $response->json();
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
                return view('home', compact('events'));
            } else {
                // Handle non-2xx status codes
                return view('home')->with('error', 'Failed to fetch data from the API.');
            }
        } catch (\Exception $e) {
            // Handle exceptions (e.g., cURL errors)
            return view('home')->with('error', 'Error connecting to the API: ' . $e->getMessage());
        }
    }
}
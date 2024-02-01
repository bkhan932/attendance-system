<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppHumanResources\Attendance\Application\AttendanceService;

class AttendanceController extends Controller
{
    private $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function uploadExcel(Request $request)
    {

        // $request->validate([
        //     'file' => 'required|mimes:csv,xlsx,xls|max:10240',
        // ]);

        $file = $request->file('file');

        $result = $this->attendanceService->uploadAttendanceData($file);
        return response()->json($result, 200);
    }

    public function getEmployeeAttendanceInfo()
    {
        $attendanceInfo = $this->attendanceService->getEmployeeAttendanceInfo();

        if (!$attendanceInfo) {
            return response()->json(['error' => 'An error occured'], 500);
        }

        return response()->json($attendanceInfo, 200);
    }
}

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
        $file = $request->file('file');

        $result = $this->attendanceService->uploadAttendanceData($file);
        if($result['succes'] == true)
            return response()->json($result, 200);
        else
            return response()->json($result, 500);
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

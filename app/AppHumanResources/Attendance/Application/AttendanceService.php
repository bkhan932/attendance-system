<?php

namespace App\AppHumanResources\Attendance\Application;

use App\AppHumanResources\Attendance\Domain\Attendance;
use App\AppHumanResources\Attendance\Domain\Employee;
use Illuminate\Support\Facades\DB;

class AttendanceService
{
    public function uploadAttendanceData($file)
    {
        try {
            $isHeader = true;

            if (($handle = fopen($file, 'r')) !== false) {
                while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                    if ($isHeader) {
                        $isHeader = false;
                        continue;
                    }

                    $employee = Employee::where('email', $data[0])->first();
                    if(!$employee) {
                        continue;
                    }

                    if ($employee) {
                        Attendance::create([
                            'employee_id' => $employee->id,
                            'checkin' => date('Y-m-d H:i:s', strtotime($data[1])),
                            'checkout' => date('Y-m-d H:i:s', strtotime($data[2])),
                        ]);
                    }
                }

                fclose($handle);
            }

            return ['message' => "Data uploaded successfully", 'success' => true];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage(), 'success' => false];
        }
    }
    public function getEmployeeAttendanceInfo()
    {
        try {
            $attendanceData = Attendance::with('employee')
                ->select('checkin', 'checkout', 'employee_id')
                ->orderByDesc('id')
                ->get();

            $employeeAttendanceInfo = [];
            foreach ($attendanceData as $attendance) {
                $checkin = strtotime($attendance->checkin);
                $checkout = strtotime($attendance->checkout);

                $workingHours = null;

                if ($attendance->checkout) {
                    $workingHours = ($checkout - $checkin) / 3600;
                }
                $employeeAttendanceInfo[] = [
                    'checkin' => $attendance->checkin,
                    'checkout'=> $attendance->checkout,
                    'totalWorkingHours' => $workingHours,
                    'employee' => [
                        'id' => $attendance->employee->id,
                        'name' => $attendance->employee->getFullNameAttribute(),
                        'email' => $attendance->employee->email,
                    ]
                ];
            }

            $response = array_values($employeeAttendanceInfo);

            return [
                'employeeAttendanceInfo' => $response,
            ];
        } catch (\Exception $e) {
            return null;
        }
    }
}

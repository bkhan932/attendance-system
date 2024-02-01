export type Employee = {
    name: string;
  }

  export type Attendance = {
    employee: Employee;
    checkin: string | null;
    checkout: string | null;
    totalWorkingHours: number | null;
  }

  export type AttendanceListProps = {
    attendanceData: Attendance[];
  }

  export type AttendanceUploadProps = {
    onUpload: () => void;
  }

  export type AppProps = {}

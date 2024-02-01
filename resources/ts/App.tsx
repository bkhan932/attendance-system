import React, { useState, useEffect } from 'react';
import AttendanceList from './components/AttendanceList';
import AttendanceUpload from './components/AttendanceUpload';
import { Attendance, AppProps } from './interfaces';

const App: React.FC<AppProps> = () => {
  const [attendanceData, setAttendanceData] = useState<Attendance[]>([]);

  useEffect(() => {
    fetch('api/employee-attendance-info')
      .then(response => response.json())
      .then(data => setAttendanceData(data.employeeAttendanceInfo))
      .catch(error => console.error('Error fetching data:', error));
  }, []);

  const handleUploadComplete = () => {
    fetch('api/employee-attendance-info')
      .then(response => response.json())
      .then(data => setAttendanceData(data.employeeAttendanceInfo))
      .catch(error => console.error('Error fetching data:', error));
  };

  return (
    <div>
      <h1>Attendance Management</h1>
      <AttendanceUpload onUpload={handleUploadComplete} />
      <AttendanceList attendanceData={attendanceData} />
    </div>
  );
};

export default App;

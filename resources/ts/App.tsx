import React, { useState, useEffect } from 'react';
import { Spinner, Alert } from 'react-bootstrap';
import AttendanceList from './components/AttendanceList';
import AttendanceUpload from './components/AttendanceUpload';
import { Attendance, AppProps } from './interfaces';

const App: React.FC<AppProps> = () => {
  const [attendanceData, setAttendanceData] = useState<Attendance[]>([]);
  const [error, setError] = useState<string | null>(null);
  const [loading, setLoading] = useState(false);

  useEffect(() => {
    _getEmployeeAttendanceData();
  }, []);

  const _getEmployeeAttendanceData = () => {
    setLoading(true);
    fetch('api/employee-attendance-info')
      .then(response => response.json())
      .then(data => {
        setAttendanceData(data.employeeAttendanceInfo);
        setLoading(false);
      })
      .catch(error => {
        setError('Error fetching data:', error)
        setLoading(false);
      });
  };

  return (
    <div className="m-4">
      <h1>Attendance Management</h1>
      <AttendanceUpload onUpload={_getEmployeeAttendanceData} />
      {error && <Alert variant="danger">{error}</Alert>}
      {loading ? 
       <Spinner as="span" animation="border" size="sm" role="status" aria-hidden="true" />
      :
      <AttendanceList attendanceData={attendanceData} />
    }
    </div>
  );
};

export default App;

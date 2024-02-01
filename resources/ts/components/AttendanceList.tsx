import React from 'react';
import { Table } from 'react-bootstrap';
import { AttendanceListProps } from '../interfaces';

const AttendanceList: React.FC<AttendanceListProps> = ({ attendanceData }) => {
  return (
    <div className="mt-4">
      <h2>Attendance Information</h2>
      <Table striped bordered hover responsive>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Checkin</th>
            <th>Checkout</th>
            <th>Total Working Hours</th>
          </tr>
        </thead>
        <tbody>
          {attendanceData.map((attendance, index) => (
            <tr key={index}>
              <td>{index + 1}</td>
              <td>{attendance.employee.name}</td>
              <td>{attendance.checkin || 'N/A'}</td>
              <td>{attendance.checkout || 'N/A'}</td>
              <td>{attendance.totalWorkingHours.toFixed(2) || 'N/A'}</td>
            </tr>
          ))}
        </tbody>
      </Table>
    </div>
  );
};

export default AttendanceList;

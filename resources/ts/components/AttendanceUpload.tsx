import React, { useState, ChangeEvent } from 'react';
import { Form, Button } from 'react-bootstrap';
import { AttendanceUploadProps } from '../interfaces';

const AttendanceUpload: React.FC<AttendanceUploadProps> = ({ onUpload }) => {
  const [file, setFile] = useState<File | null>(null);

  const handleFileChange = (e: ChangeEvent<HTMLInputElement>) => {
    if (e.target.files && e.target.files.length > 0) {
      setFile(e.target.files[0]);
    }
  };

  const handleUpload = () => {
    if (file) {
      const formData = new FormData();
      formData.append('file', file);

      fetch('api/upload-attendance', {
        method: 'POST',
        body: formData,
      })
        .then(response => response.json())
        .then(data => {
          console.log('Upload success:', data);
          onUpload();
        })
        .catch(error => console.error('Error uploading file:', error));
    }
  };

  return (
    <div className="mt-4">
      <h2>Upload Attendance Data</h2>
      <Form>
        <Form.Group controlId="formFile" className="mb-3">
          <Form.Label>Choose file</Form.Label>
          <Form.Control type="file" accept=".csv, .xlsx, .xls" onChange={handleFileChange} />
        </Form.Group>
        <Button variant="primary" onClick={handleUpload}>
          Upload
        </Button>
      </Form>
    </div>
  );
};

export default AttendanceUpload;

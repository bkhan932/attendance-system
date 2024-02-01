import React, { useState, ChangeEvent } from 'react';
import { Form, Button, Spinner, Alert } from 'react-bootstrap';
import { AttendanceUploadProps } from '../interfaces';

const AttendanceUpload: React.FC<AttendanceUploadProps> = ({ onUpload }) => {
  const [file, setFile] = useState<File | null>(null);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState<string | null>(null);

  const handleFileChange = (e: ChangeEvent<HTMLInputElement>) => {
    setError(null);
    if (e.target.files && e.target.files.length > 0) {
      setFile(e.target.files[0]);
    }
  };

  const handleUpload = () => {
    if (!file) {
      setError('Please choose a file.'); 
      return;
    }
      const formData = new FormData();
      formData.append('file', file);

      setLoading(true);

      fetch('api/upload-attendance', {
        method: 'POST',
        body: formData,
      })
        .then(response => response.json())
        .then(data => {
          setLoading(false);
          onUpload();
        })
        .catch(error => {
          setLoading(false);
          setError('Error uploading file. Please try again.');
        });
  };

  return (
    <div className="mt-4">
      <h2>Upload Attendance Data</h2>
      {error && <Alert variant="danger">{error}</Alert>}
      <Form
        noValidate
        validated={false}
        >
      <Form.Group controlId="formFile" className="mb-3">
          <Form.Label>Choose file</Form.Label>
          <Form.Control required type="file" accept=".csv, .xlsx, .xls" onChange={handleFileChange} />
        </Form.Group>
        <Button variant="primary" onClick={handleUpload} disabled={loading}>
          {loading ? (
            <>
              <Spinner as="span" animation="border" size="sm" role="status" aria-hidden="true" /> Uploading...
            </>
          ) : (
            'Upload'
          )}
        </Button>
      </Form>
    </div>
  );
};

export default AttendanceUpload;

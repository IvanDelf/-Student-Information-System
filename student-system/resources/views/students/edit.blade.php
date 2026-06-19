<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #f1b5b6 0%, #e58463 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #d46f52 0%, #c45a3d 100%);
            color: white;
            padding: 30px;
            border: none;
        }

        .card-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 28px;
        }

        .card-header p {
            margin: 5px 0 0 0;
            opacity: 0.95;
        }

        .card-body {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            padding: 12px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #e58463;
            box-shadow: 0 0 0 3px rgba(229, 132, 99, 0.1);
            outline: none;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
        }

        .help-text {
            color: #999;
            font-size: 12px;
            margin-top: 5px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #d46f52 0%, #c45a3d 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 5px;
            width: 100%;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(212, 111, 82, 0.4);
            color: white;
        }

        .btn-cancel {
            background-color: #f0f0f0;
            border: none;
            color: #333;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 5px;
            width: 100%;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .btn-cancel:hover {
            background-color: #e0e0e0;
            color: #333;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-icon {
            color: #d46f52;
            margin-right: 5px;
        }

        .student-info {
            background: #f8f9fa;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 25px;
            border-left: 4px solid #d46f52;
        }

        .student-info p {
            margin: 5px 0;
            color: #555;
        }

        .info-label {
            font-weight: 600;
            color: #333;
        }

        @media (max-width: 576px) {
            .card-header {
                padding: 20px;
            }

            .card-header h2 {
                font-size: 22px;
            }

            .card-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <div class="card">
            <div class="card-header">
                <h2><i class="bi bi-pencil-square"></i> Edit Student</h2>
                <p>Update student information</p>
            </div>

            <div class="card-body">
                <!-- Current Student Info -->
                <div class="student-info">
                    <p><span class="info-label">Student ID:</span> #{{ $student->id }}</p>
                    <p><span class="info-label">Created:</span> {{ $student->created_at->format('M d, Y') }}</p>
                </div>

                <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="bi bi-person form-icon"></i> Student Name
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Enter student full name" 
                            value="{{ old('name', $student->name) }}"
                            required
                        >
                        @error('name')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                        <div class="help-text">Full name of the student (required)</div>
                    </div>

                    <!-- Course Field -->
                    <div class="form-group">
                        <label for="course" class="form-label">
                            <i class="bi bi-book form-icon"></i> Course
                        </label>
                        <input 
                            type="text" 
                            id="course" 
                            name="course" 
                            class="form-control @error('course') is-invalid @enderror" 
                            placeholder="Enter course name" 
                            value="{{ old('course', $student->course) }}"
                            required
                        >
                        @error('course')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                        <div class="help-text">Course or program name (required)</div>
                    </div>

                    <!-- Year Level Field -->
                    <div class="form-group">
                        <label for="year_level" class="form-label">
                            <i class="bi bi-award form-icon"></i> Year Level
                        </label>
                        <select 
                            id="year_level" 
                            name="year_level" 
                            class="form-control @error('year_level') is-invalid @enderror"
                            required
                        >
                            <option value="">Select a year level</option>
                            <option value="1" {{ old('year_level', $student->year_level) == '1' ? 'selected' : '' }}>1st Year</option>
                            <option value="2" {{ old('year_level', $student->year_level) == '2' ? 'selected' : '' }}>2nd Year</option>
                            <option value="3" {{ old('year_level', $student->year_level) == '3' ? 'selected' : '' }}>3rd Year</option>
                            <option value="4" {{ old('year_level', $student->year_level) == '4' ? 'selected' : '' }}>4th Year</option>
                        </select>
                        @error('year_level')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                        <div class="help-text">Student's current year in the program (required)</div>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <button type="submit" class="btn btn-submit">
                        <i class="bi bi-check-circle"></i> Update Student
                    </button>
                    <a href="{{ route('students.index') }}" class="btn btn-cancel">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

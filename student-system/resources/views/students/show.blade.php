<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #f1b5b6 0%, #e58463 100%);
            min-height: 100vh;
            padding: 40px 0;
        }

        .container-main {
            max-width: 700px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #e58463 0%, #d46f52 100%);
            color: white;
            padding: 30px;
            border: none;
        }

        .card-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 28px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-body {
            padding: 40px;
        }

        .detail-section {
            margin-bottom: 30px;
        }

        .detail-label {
            color: #999;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            display: block;
        }

        .detail-value {
            color: #333;
            font-size: 18px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .detail-value i {
            color: #e58463;
            font-size: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .info-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            border-left: 4px solid #e58463;
        }

        .badge-year {
            background: linear-gradient(135deg, #e58463 0%, #d46f52 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            font-size: 14px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn-edit {
            background: linear-gradient(135deg, #d46f52 0%, #c45a3d 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 5px;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            flex: 1;
            text-align: center;
        }

        .btn-edit:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(212, 111, 82, 0.4);
        }

        .btn-back {
            background-color: #f0f0f0;
            border: none;
            color: #333;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 5px;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            flex: 1;
            text-align: center;
        }

        .btn-back:hover {
            background-color: #e0e0e0;
            color: #333;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .divider {
            border: 0;
            border-top: 1px solid #eee;
            margin: 30px 0;
        }

        .metadata {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            font-size: 13px;
            color: #666;
            border-left: 4px solid #6c757d;
        }

        .metadata p {
            margin: 5px 0;
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

            .info-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container container-main">
        <div class="card">
            <div class="card-header">
                <h2><i class="bi bi-person-circle"></i> Student Details</h2>
            </div>

            <div class="card-body">
                <!-- Student Information Grid -->
                <div class="info-grid">
                    <div class="info-card">
                        <span class="detail-label">Student ID</span>
                        <div class="detail-value">
                            <i class="bi bi-hash"></i>
                            {{ $student->id }}
                        </div>
                    </div>

                    <div class="info-card">
                        <span class="detail-label">Year Level</span>
                        <div class="detail-value">
                            <span class="badge-year">Year {{ $student->year_level }}</span>
                        </div>
                    </div>
                </div>

                <!-- Detailed Information -->
                <div class="detail-section">
                    <span class="detail-label">
                        <i class="bi bi-person"></i> Full Name
                    </span>
                    <div class="detail-value">
                        <i class="bi bi-person-fill"></i>
                        {{ $student->name }}
                    </div>
                </div>

                <div class="detail-section">
                    <span class="detail-label">
                        <i class="bi bi-book"></i> Course
                    </span>
                    <div class="detail-value">
                        <i class="bi bi-book-fill"></i>
                        {{ $student->course }}
                    </div>
                </div>

                <hr class="divider">

                <!-- Metadata -->
                <div class="metadata">
                    <p>
                        <i class="bi bi-calendar"></i>
                        <strong>Created:</strong> {{ $student->created_at->format('M d, Y \a\t g:i A') }}
                    </p>
                    <p>
                        <i class="bi bi-arrow-repeat"></i>
                        <strong>Last Updated:</strong> {{ $student->updated_at->format('M d, Y \a\t g:i A') }}
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-edit">
                        <i class="bi bi-pencil"></i> Edit Student
                    </a>
                    <a href="{{ route('students.index') }}" class="btn btn-back">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

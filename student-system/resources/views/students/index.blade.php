<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #e58463 0%, #f1b5b6 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .main-container {
            max-width: 1200px;
        }

        .header-section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .header-section h1 {
            color: #333;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header-section p {
            color: #666;
            margin-bottom: 0;
        }

        .search-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            align-items: flex-end;
            flex-wrap: wrap;
        }

        .search-form .form-group {
            flex: 1;
            min-width: 250px;
            margin-bottom: 0;
        }

        .search-form .btn {
            padding: 10px 25px;
        }

        .btn-add-student {
            background: linear-gradient(135deg, #e58463 0%, #d46f52 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 25px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-add-student:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(229, 132, 99, 0.4);
        }

        .alert-success {
            border-radius: 10px;
            border: none;
            background-color: #d4edda;
            color: #155724;
            margin-bottom: 20px;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: linear-gradient(135deg, #e58463 0%, #f1b5b6 100%);
            color: white;
        }

        .table thead th {
            border: none;
            padding: 15px;
            font-weight: 600;
        }

        .table tbody tr {
            border-bottom: 1px solid #eee;
            transition: background-color 0.2s;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-edit {
            background-color: #ffc107;
            border: none;
            color: white;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 5px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-edit:hover {
            background-color: #ffb300;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 193, 7, 0.4);
        }

        .btn-delete {
            background-color: #dc3545;
            border: none;
            color: white;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 5px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-delete:hover {
            background-color: #c82333;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.4);
        }

        .btn-view {
            background-color: #17a2b8;
            border: none;
            color: white;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 5px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-view:hover {
            background-color: #138496;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(23, 162, 184, 0.4);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .empty-state i {
            font-size: 64px;
            color: #ccc;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            color: #666;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #999;
            margin-bottom: 20px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: white;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            color: white;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .badge-year {
            background-color: #f9e9e3;
            color: #d46f52;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px 12px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #e58463;
            box-shadow: 0 0 0 3px rgba(229, 132, 99, 0.1);
        }

        .delete-form {
            display: inline;
        }

        @media (max-width: 768px) {
            .search-form {
                flex-direction: column;
            }

            .search-form .form-group {
                min-width: 100%;
            }

            .search-form .btn {
                width: 100%;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons .btn {
                width: 100%;
            }

            .header-section {
                padding: 20px;
            }

            .search-card {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container main-container">
        <!-- Header Section -->
        <div class="header-section">
            <h1><i class="bi bi-mortarboard"></i> Student Information System</h1>
            <p>Manage your student database efficiently</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Search Section -->
        <div class="search-card">
            <form action="{{ route('students.index') }}" method="GET" class="search-form">
                <div class="form-group">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Search by name or course..." 
                        value="{{ $search }}"
                    >
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Search
                </button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-clockwise"></i> Clear
                </a>
                <a href="{{ route('students.create') }}" class="btn btn-add-student ms-auto">
                    <i class="bi bi-plus-circle"></i> Add New Student
                </a>
            </form>
        </div>

        <!-- Students Table -->
        @if($students->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th><i class="bi bi-hash"></i> ID</th>
                            <th><i class="bi bi-person"></i> Name</th>
                            <th><i class="bi bi-book"></i> Course</th>
                            <th><i class="bi bi-award"></i> Year Level</th>
                            <th><i class="bi bi-gear"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>
                                    <strong>#{{ $student->id }}</strong>
                                </td>
                                <td>
                                    {{ $student->name }}
                                </td>
                                <td>
                                    {{ $student->course }}
                                </td>
                                <td>
                                    <span class="badge badge-year">Year {{ $student->year_level }}</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-view btn-sm">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-edit btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="btn btn-delete btn-sm" 
                                                onclick="return confirm('Are you sure you want to delete this student?')"
                                            >
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <h3>No Students Found</h3>
                <p>Start by adding your first student record.</p>
                <a href="{{ route('students.create') }}" class="btn btn-add-student">
                    <i class="bi bi-plus-circle"></i> Add Student
                </a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

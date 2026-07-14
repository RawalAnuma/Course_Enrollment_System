<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f4f4f4;
        }

        .container {
            display: flex;
            gap: 20px;
        }

        a {
            padding: 15px 40px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            background: #007bff;
            color: white;
            cursor: pointer;
            transition: background 0.3s;
        }

        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="{{ route('users.index') }}">Users</a>
        <a href="{{ route('courses.index') }}">Courses</a>
        <a href="{{ route('enrollments.index') }}">Enrollments</a>
    </div>

</body>
</html>
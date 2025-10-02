<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tilte','Lab 01')</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background: #f3f4f6;
            text-align: left;
        }

        .adult {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <header>
        <h1>Laravel 12 - Lab 01</h1>
        <nav>
            <a href="/hello">Hello</a> |
            <a href="/students">Students</a> |
            <a href="time">Time</a> |
            <a href="{{ route('students.create') }}">
                Create
            </a>
        </nav>
        <hr>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <hr>
        <small>&copy; HUIT - Khoa CNTT</small>
    </footer>
</body>

</html>
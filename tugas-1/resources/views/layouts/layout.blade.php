<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        #sidebar {
            width: 250px;
            background: #333;
            color: white;
            height: 100vh;
            position: fixed;
            left: -250px;
            transition: all 0.3s ease;
        }

        #sidebar.active {
            left: 0;
        }

        #content {
            margin-left: 250px;
            width: 100%;
            padding: 15px;
            transition: all 0.3s ease;
            flex: 1;
        }

        #content.collapsed {
            margin-left: 0;
        }

        .nav-btn {
            background-color: #333;
            color: white;
            padding: 10px;
            cursor: pointer;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
        }
    </style>
</head>

<body>
    <div id="sidebar">
        <ul>
            <h3>
                <a href="{{ route('home') }}">Home</a>
                <li><a href="{{ route('routing.page') }}">Routing Page</a></li>
                <li><a href="{{ route('math.page') }}">Math Page</a></li>
            </h3>
        </ul>
    </div>

    <div id="content" class="collapsed">
        <div class="nav-btn" onclick="toggleSidebar()">☰</div>
        @yield('content')
    </div>

    <footer>
        &copy; MHF2145 - Tugas 1
    </footer>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('collapsed');
        }
    </script>
</body>

</html>

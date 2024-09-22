<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Wiki</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F7F7F7;
            /* Soft White/Cream */
        }

        #sidebar {
            background-color: #FFD700;
            /* Light Teal/Blue */
            transition: transform 0.3s ease;
            transform: translateX(-100%);
        }

        #sidebar.active {
            transform: translateX(0);
        }

        #main-content {
            transition: margin-left 0.3s ease;
        }

        #main-content.shift {
            margin-left: 256px;
            /* Width of the sidebar */
        }

        header {
            background-color: #1C1E26;
            /* Dark Navy Blue/Black */
        }

        header a {
            color: #FFD700;
            /* Gold/Yellow Accents */
        }

        footer {
            background-color: #1C1E26;
            /* Dark Navy Blue/Black */
        }

        footer p {
            color: #FFD700;
            /* Darker Teal */
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    <header class="shadow">
        <nav class="container mx-auto flex justify-between items-center p-4">
            <div>
                <button id="sidebar-toggle" class="text-white focus:outline-none">
                    &#9776; <!-- Hamburger icon -->
                </button>
                <a class="text-xl font-bold ml-2 text-white" href="{{ route('home') }}">Movie Wiki</a>
            </div>
            <div>
                @guest
                <a class="text-yellow-300 mx-2" href="{{ route('login') }}">Login</a>
                <a class="text-yellow-300 mx-2" href="{{ route('register') }}">Register</a>
                @else
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-yellow-300">Logout</button>
                </form>
                @endguest
            </div>
        </nav>
    </header>

    <div class="flex flex-1">
        <aside id="sidebar" class="w-64 p-4 shadow fixed z-10 h-full"> <!-- Sidebar -->
            <ul class="space-y-2">
                <li><a class="text-gray-800 hover:underline" href="{{ route('home') }}">Home</a></li>
                @auth
                <li><a class="text-gray-800 hover:underline" href="{{ route('wishlist.index') }}">Wishlist</a></li>
                @endauth
            </ul>
        </aside>


        </ul>
        </aside>

        <main id="main-content" class="flex-1 p-4 ml-0 transition-all duration-300"> <!-- Main content -->
            @yield('content') <!-- This is where the homepage content will be injected -->
        </main>
    </div>

    <footer class="p-4 text-center mt-auto">
        <p>© Hanif Individual Task - 2024</p>
    </footer>

    <script>
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('shift');
        });
    </script>
</body>

</html>

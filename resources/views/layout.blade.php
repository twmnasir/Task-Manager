<!DOCTYPE html>
<html>

<head>
    <title>Tasks | @yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{ asset('dist/css/sweetalert2.min.css') }}"> --}}
</head>

<body class="bg-gray-50">

      <header>
        <nav class="bg-white border-b border-gray-200 navbar">
            <div class="container mx-auto flex flex-wrap justify-between items-center px-4 py-2.5">
                <!-- Logo -->
                <a href="/" class="flex items-center font-medium text-gray-900">
                    <span class="self-center text-xl font-semibold whitespace-nowrap">Task <small>Manager</small></span>
                </a>

                <!-- Mobile Menu Button -->
                <button id="menu-toggle" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open menu</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>

                <!-- Menu Links (hidden on mobile, shown on larger screens) -->
                <div class="hidden w-full md:flex md:w-auto" id="menu">
                    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0">
                        <li>
                            <a href="{{ url('/') }}" class="@yield('home_active') block pl-3 pr-4 my-2 font-medium text-gray-700  font-py-2 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('tasks.create') }}" class="@yield('create_active') block pl-3 pr-4 my-2 font-medium text-gray-700 font-py-2 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Create</a>
                        </li>
                        <li>
                            <a href="{{ route('marked') }}" class="@yield('marked_active') block pl-3 pr-4 my-2 font-medium text-gray-700 font-py-2 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Marked</a>
                        </li>
                        <li>
                            <a href="{{ route('info') }}" class="@yield('info_active') block pl-3 pr-4 my-2 font-medium text-gray-700 font-py-2 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Info</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    {{-- <script src="{{ asset('dist/js/sweetalert2.min.js') }}"></script> --}}
    <script>
          const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');

    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
    </script>
    @yield('js_footer')
</body>

</html>

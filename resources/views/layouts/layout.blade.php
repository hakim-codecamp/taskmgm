<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-6.7.2/css/all.min.css') }}" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>



    <!-- Header Section -->
    <header class="d-flex justify-content-between align-items-center p-3 bg-light border-bottom">
        <!-- Logo -->
        <div class="d-flex align-items-center ms-3">
            <img src="{{ asset('photo/down.png') }}" alt="Logo" style="height: 50px;">
            <span class="ms-2 fs-4 fw-bold">Dashboard</span>
            {{-- <span class="ms-2 fs-4 fw-bold"><a href="{{ route('create.task') }}">create task</a></span> --}}
            {{-- <a href="{{ route('dashboard') }}" class="btn ms-3" style="background-color: #4643d3; color: white;">Add task</a> --}}
        </div>

        <!-- Profile Dropdown -->
        <div class="dropdown me-3">
            <a href="#" class="d-flex align-items-center text-black text-decoration-none dropdown-toggle"
                id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                {{-- <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li> --}}
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                </li>
            </ul>
        </div>

        <!-- Logout Form (hidden) -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </header>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fontawesome-free-6.7.2/js/all.js') }}"></script>
</body>

</html>

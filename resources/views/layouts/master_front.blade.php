<!DOCTYPE html>
<html lang="en-US">

<head>
    @include('layouts._front.head')
</head>
@vite([])
<body id="top">
    <header>
        @include('layouts._front.header')
    </header>
    <div class="page-content">

        @yield('content')

    </div>
    <footer class="footer">

        @include('layouts._front.footer')

    </footer>

    @include('layouts._front.script')

</body>

</html>

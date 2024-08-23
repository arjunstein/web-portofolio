<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts._front.head')
</head>

<body>

    <main>
        <aside class="sidebar" data-sidebar>
            @include('layouts._front.sidebar')
        </aside>

        <div class="main-content">
            <nav class="navbar">
                @include('layouts._front.header')
            </nav>
            @yield('content')
        </div>
    </main>

    @include('layouts._front.script')
</body>

</html>

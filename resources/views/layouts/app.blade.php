<!DOCTYPE html>
<html lang="en">

<head>
    <x-metalink />
</head>

<body class="index-page">

    <x-header />

    <main class="main">
        @yield('content')
    </main>

    <x-footer />

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <x-script />

</body>

</html>

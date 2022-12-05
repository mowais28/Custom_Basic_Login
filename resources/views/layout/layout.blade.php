<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Author" content="M Owais">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('asset/img/favicon.png') }}" type="image/x-icon">
    {{-- boostrap Css 4.6 --}}
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    {{-- Fontawesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    {{-- Custom Style Css --}}
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
</head>

<body>

    {{-- Page Wrapper --}}
    <div id="wrapper">


        {{-- Side Navigation --}}
        <x-sidebar></x-sidebar>

        {{-- App Pages Conten --}}
        @yield('ContentSection')


    </div>



    {{-- Jquery --}}
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    {{-- Bootstrap Bundle 4.6 --}}
    <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Custom JS Script --}}
    <script src="{{ asset('asset/js/custom_script.js') }}"></script>

</body>

</html>

<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/app.js')}}"></script>
    <title>@yield('title')</title>
    <!--Google Fonts-->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
<!-- Nav Menu -->
@include('partials.navbar')

@if(session('mustVerifyEmail'))
    <div class="alert alert-danger text-center">

        @lang('auth.you_must_verify_your_email',['link'=>route('send.email.verification')])
    </div>
    @if(session('verificationEmailSent'))
        <div class="alert alert-success text-center">
            @lang('auth.verification email sent')
        </div>
    @endif

@endif
<div class="container">
    @yield('content')
</div>

</body>

</html>

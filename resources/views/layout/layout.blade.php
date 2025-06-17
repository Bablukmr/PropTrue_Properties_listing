<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'PropTrue')</title>
    <meta name="description" content="@yield('description', 'PropTrue - Your Real Estate Partner')" />
    <meta name="keywords" content="@yield('keywords', 'real estate, property, buying, selling, renting')" />
    <meta name="author" content="@yield('author', 'Your Name')" />
    <meta property="og:title" content="@yield('og_title', 'RealFun')" />
    <meta property="og:description" content="@yield('og_description', 'Your Real Estate Partner')" />
    <meta property="og:image" content="@yield('og_image', asset('images/default.jpg'))" />
    <meta property="og:url" content="@yield('og_url', url()->current())" />
    <meta property="og:type" content="@yield('og_type', 'website')" />
    <meta name="twitter:card" content="@yield('twitter_card', 'summary_large_image')" />
    <meta name="twitter:title" content="@yield('twitter_title', 'RealFun')" />
    <meta name="twitter:description" content="@yield('twitter_description', 'Your Real Estate Partner')" />
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/default.jpg'))" />
    <meta name="twitter:site" content="@yield('twitter_site', '@yourtwitterhandle')" />
    <meta name="twitter:creator" content="@yield('twitter_creator', '@yourtwitterhandle')" />
    <link rel="canonical" href="@yield('canonical', url()->current())" />

    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Optional: <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @yield('head')
</head>

<body>

    @include('includes.header')
    @yield('content')
    @include('includes.footer')

</body>

</html>

@php
    $company = config('company');
    $pageTitle = trim($title ?? '') !== '' ? $title.' | '.$company['name'] : $company['name'].' | '.$company['tagline'];
    $metaDescription = $description ?? $company['description'];
    $canonical = $canonical ?? url()->current();
    $ogImage = $ogImage ?? asset('images/og-default.jpg');
@endphp
<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Primary SEO --}}
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ $canonical }}">
    <meta name="robots" content="index, follow">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $company['name'] }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $ogImage }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    {{-- Fonts: Bodoni Moda (display), Hanken Grotesk (body), Geist (labels), Material Symbols (icons) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,wght@0,400..900;1,400..900&family=Hanken+Grotesk:wght@300;400;700&family=Geist:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    {{-- Structured data (Organization on every page + page-specific schema) --}}
    @include('partials.jsonld')
    @stack('jsonld')

    {{-- Compiled assets (Tailwind v3 + SCSS via Vite) --}}
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-surface text-on-surface font-body-md selection:bg-dragon-red selection:text-white">
    @yield('content')
</body>
</html>

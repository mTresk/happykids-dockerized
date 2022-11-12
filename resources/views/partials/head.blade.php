<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>{{ $site_name }}</title>
    <meta name="description" content="{{ $site_description }}">
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $site_name }}">
    <meta property="og:description" content="{{ $site_description }}">
    <meta property="og:image" content="{{ url('/storage/'.$og_image) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ url('') }}">
    <meta property="twitter:url" content="{{ route('home') }}">
    <meta name="twitter:title" content="{{ $site_name }}">
    <meta name="twitter:description" content="{{ $site_description }}">
    <meta name="twitter:image" content="{{ url('/storage/'.$og_image) }}">

    <!-- Scripts -->
    @vite('resources/js/app.js')
</head>

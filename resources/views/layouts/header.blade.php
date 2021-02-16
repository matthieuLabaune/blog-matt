<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    SEO TITRE DE LA PAGE--}}
    {{--    <title>{{ config('app.name', 'Blog Matt Lab') }}</title>--}}
    <title>{{ isset($post) && $post->seo_title ? $post->seo_title :  config('app.name') }}</title>
    {{--    SEO DESCRIPTION DE LA PAGE--}}
    <meta name="description"
          content="{{ isset($post) && $post->meta_description ? $post->meta_description : __(config('app.description')) }}">
    {{--    SEO DESCRIPTION DES MOTS-CLEFS DU POST --}}
    @if(isset($post) && $post->meta_keywords)
        <meta name="keywords" content="{{ $post->meta_keywords }}">
    @endif
    {{--    SEO DESCRIPTION DE L'AUTEUR DE LA PAGE--}}
    <meta name="author" content="{{ isset($post) ? $post->user->name : __(config('app.author')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="antialiased">

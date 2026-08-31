<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $brand['name'])</title>
    <meta name="description" content="@yield('description', $brand['description'])">
    <style>
        :root {
            --brand-primary: {{ $brand['colors']['primary'] }};
            --brand-accent: {{ $brand['colors']['accent'] }};
            --brand-bg: {{ $brand['colors']['bg'] }};
            --accent: {{ config('brands.accent') }};
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[var(--brand-bg)]">
@include('partials.ribbon')
@yield('content')
</body>
</html>

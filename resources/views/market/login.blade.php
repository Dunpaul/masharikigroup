@extends('layouts.app')

@section('title', 'Login - Masharket')

@section('content')

    @include('partials.navbar')

    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-md mx-auto px-6 lg:px-8">
            <div class="mb-10 text-center">
                <h1 class="text-3xl md:text-4xl font-medium text-[#111111]">Delegate Login</h1>
                <p class="mt-3 text-gray-600">Log in with the email and password you used to register.</p>
            </div>

            @if (session('error'))
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-6 py-4 text-red-800">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('market.login.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-primary)]">
                </div>
                <button type="submit" class="w-full inline-flex items-center justify-center rounded-2xl bg-[var(--brand-primary)] px-7 py-4 text-white font-medium shadow-lg transition duration-300 hover:-translate-y-0.5">
                    Log In
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-500">
                Not registered yet? <a href="{{ route('market.exhibitors.create') }}" class="text-[var(--brand-primary)] hover:underline">Register as an exhibitor</a>
            </p>
        </div>
    </section>

    @include('partials.footer')

@endsection

@extends('layouts.app')

@section('title', 'Apply - '.$brand['short_name'])

@section('content')

    @include('partials.navbar')

    @php $hasHero = \App\Models\PageHero::forPage($brand['key'], request()->route()->getName())->active()->exists(); @endphp
    <section @class(['relative overflow-hidden bg-white flex items-center justify-center text-center px-6', 'min-h-screen' => $hasHero, 'py-16 md:py-24' => ! $hasHero])>
        @include('partials.page-hero')
        @if ($hasHero)
            <div class="absolute inset-0 bg-black/60"></div>
        @endif
        <div class="relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 {{ $hasHero ? 'text-white' : 'text-gray-900' }}">Apply Now</h1>
            <p class="{{ $hasHero ? 'text-white/90' : 'text-gray-600' }}">Fill in the form below to start your application.</p>
        </div>
    </section>

    <section class="bg-white py-16 md:py-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-8 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 rounded-lg border border-red-200 bg-red-50 p-4 text-red-800">
                    <p class="font-semibold mb-2">Please fix the following:</p>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (! $cohort)
                <div class="bg-white rounded-2xl shadow-elevated p-8 md:p-12 text-center">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">Applications are currently closed</h2>
                    <p class="text-gray-600">We're not accepting new applications right now — check back soon for the next intake.</p>
                </div>
            @else
            <div class="bg-white rounded-2xl shadow-elevated p-8 md:p-12">
                <form action="{{ route('academy.apply.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    @foreach ($fields as $field)
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                {{ $field->label }} @if ($field->required) * @endif
                            </label>

                            @switch($field->type)
                                @case('textarea')
                                    <textarea
                                        name="{{ $field->key }}"
                                        rows="5"
                                        @if ($field->required) required @endif
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                    >{{ old($field->key) }}</textarea>
                                    @break

                                @case('select')
                                    <select
                                        name="{{ $field->key }}"
                                        @if ($field->required) required @endif
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                    >
                                        <option value="">Select an option</option>
                                        @foreach ($field->resolvedOptions() as $value => $label)
                                            <option value="{{ $value }}" @selected(old($field->key) === $value)>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @break

                                @case('radio')
                                    <div class="flex flex-wrap gap-6">
                                        @foreach ($field->resolvedOptions() as $value => $label)
                                            <label class="flex items-center">
                                                <input type="radio" name="{{ $field->key }}" value="{{ $value }}" @if ($field->required) required @endif class="mr-2">
                                                {{ $label }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @break

                                @case('checkbox')
                                    <label class="flex items-center">
                                        <input type="checkbox" name="{{ $field->key }}" value="1" @if ($field->required) required @endif class="mr-2">
                                        Yes
                                    </label>
                                    @break

                                @case('file')
                                    <input
                                        type="file"
                                        name="{{ $field->key }}[]"
                                        @if ($field->multiple) multiple @endif
                                        @if ($field->required) required @endif
                                        accept=".pdf,.jpg,.jpeg,.png,.mp4,.mov,.doc,.docx"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg"
                                    >
                                    @break

                                @case('date')
                                    <input
                                        type="date"
                                        name="{{ $field->key }}"
                                        value="{{ old($field->key) }}"
                                        @if ($field->required) required @endif
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                    >
                                    @break

                                @default
                                    <input
                                        type="{{ $field->type }}"
                                        name="{{ $field->key }}"
                                        value="{{ old($field->key) }}"
                                        @if ($field->required) required @endif
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                    >
                            @endswitch
                        </div>
                    @endforeach

                    <button type="submit" class="w-full px-8 py-4 bg-gray-900 text-white font-bold rounded-full hover:bg-gray-800 transition">
                        SUBMIT APPLICATION
                    </button>
                </form>
            </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

@endsection

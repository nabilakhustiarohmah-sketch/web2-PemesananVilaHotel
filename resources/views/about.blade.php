@extends('layouts.app')

@section('title', 'About')

@section('content')

{{-- HERO SECTION --}}
<div class="text-center mb-12">
    <h1 class="text-4xl md:text-5xl font-bold text-blue-800 mb-4">
        About VilHo
    </h1>
    <p class="text-gray-600 max-w-2xl mx-auto text-lg">
        VilHo is a platform that helps you find and book the best hotels and villas
        easily, quickly, and comfortably.
    </p>
</div>

{{-- INFO CARDS --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- Card 1 --}}
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
        <div class="text-4xl mb-3">🏨</div>
        <h3 class="text-xl font-semibold text-blue-700 mb-2">
            Easy to Use
        </h3>
        <p class="text-gray-600 text-sm">
            Simple interface makes searching and booking fast and practical.
        </p>
    </div>

    {{-- Card 2 --}}
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
        <div class="text-4xl mb-3">🔒</div>
        <h3 class="text-xl font-semibold text-blue-700 mb-2">
            Trusted
        </h3>
        <p class="text-gray-600 text-sm">
            Your data is secure and transactions are handled securely.
        </p>
    </div>

    {{-- Card 3 --}}
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
        <div class="text-4xl mb-3">🌴</div>
        <h3 class="text-xl font-semibold text-blue-700 mb-2">
            Comfortable
        </h3>
        <p class="text-gray-600 text-sm">
            Best hotel & villa choices for a relaxing stay.
        </p>
    </div>

</div>

@endsection
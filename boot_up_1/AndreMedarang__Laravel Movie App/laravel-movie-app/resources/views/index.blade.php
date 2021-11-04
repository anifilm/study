@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-4 gap-8">
                <div class="mt-8">
                    <a href="#">
                        <img src="/img/poster.jpg" alt="poster" class="">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray-300">Parasite</a>
                    </div>
                </div>

            </div>

        </div>

        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Now Playing</h2>

        </div>
    </div>
@endsection

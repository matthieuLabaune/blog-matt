@extends('front.layout')

@section('content')
    <div class="px-4 py-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl bg-yellow-300">
        <div class="max-w-xl sm:mx-auto lg:max-w-2xl">
            <div class="flex flex-col mb-16 sm:text-center sm:mb-0">
                <span class="relative text-9xl">Blog</span>
                <p class="text-base text-gray-700 md:text-lg mt-5">
                    Des articles, des tutos, des astuces, des conseils ou des avis.
                </p>
            </div>
        </div>
    </div>


    <div class="px-4 py-14 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl">
        <div class="grid gap-8 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
            @foreach($posts as $post)
                <x-front.post-card :post="$post"/>
            @endforeach

            <div class="row">
                <div class="column large-12">
                    {{ $posts->links('front.pagination') }}
                </div>
            </div>

        </div>
    </div>


@endsection

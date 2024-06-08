@extends('layout')

@section('content')
    @include('partials._search')


    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{ asset('images/no-image.png') }}" alt="item photo" />

                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->price }}</div>
                <x-listing-tags :tagsCsv="$listing->tags" />

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Item Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{ $listing->description }}
                        </p>
                        <div class="border border-gray-200 w-full mb-6">
                            <br>
                            <i>Contact Seller</i>

                            <p class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                                <b> Phone no: </b>{{ $listing->contactPhone }}

                            </p>                            
                            <p class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                                <b>Email: </b> {{ $listing->contactEmail }}

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

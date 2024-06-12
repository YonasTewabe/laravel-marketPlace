@extends('layout')

@section('content')
<a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i>
        Back to Home
    </a>
    <x-card class=" p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Listing
            </h2>
            <p class="mb-4">Post an item to sell</p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Item</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    value="{{ old('title') }}" />
                @error('title')
                    <p class="text-red-500 text-xs
                    mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">Price</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="price"
                    placeholder="Example: 10,000" value="{{ old('price') }}" />
                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    placeholder="Example: Addis Ababa, etc" value="{{ old('location') }}" />
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="ContactEmail" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="contactEmail"
                    value="{{ old('contactEmail') }}" />
                @error('contactEmail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="contactPhone" class="inline-block text-lg mb-2">Contact Phone</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="contactPhone"
                    value="{{ old('contactPhone') }}" />
                @error('contactPhone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example: Samsung, Tv, Furniture, etc" value="{{ old('tags') }}" />
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
        <label for="photo" class="inline-block text-lg mb-2">
            Item Photo
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="photo"
        />
        @error('photo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
        
    </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Item Description (Optional)
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="5"
                    placeholder="Include status of item, how to be contacted etc">
                {{ old('description') }}
            </textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Post item
                </button>

                <a href="/" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"> Back </a>
            </div>
        </form>
    </x-card>
@endsection

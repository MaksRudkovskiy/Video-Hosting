@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-3xl font-bold mb-6 text-center">Загрузить видеоролик</h2>
            <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Название ролика</label>
                    <input type="text" name="title" id="title" class="w-full p-2 border rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Описание ролика</label>
                    <textarea name="description" id="description" class="w-full p-2 border rounded-lg">{{ old('description') }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-gray-700">Категория ролика</label>
                    <select name="category" id="category" class="w-full p-2 border rounded-lg @error('category') border-red-500 @enderror" required>
                        <option value="">Выберите категорию</option>
                        <!-- Пример категорий, добавьте свои -->
                        <option value="comedy">Комедия</option>
                        <option value="education">Образование</option>
                        <option value="music">Музыка</option>
                    </select>
                    @error('category')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="video" class="block text-gray-700">Видеофайл</label>
                    <input type="file" name="video" id="video" class="w-full p-2 border rounded-lg @error('video') border-red-500 @enderror" required>
                    @error('video')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg">Загрузить</button>
            </form>
        </div>
    </div>
</div>
@endsection
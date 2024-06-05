@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-8">Последние видеоролики</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($videos as $video)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <video class="w-full" controls>
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                    </video>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">{{ $video->title }}</h3>
                        <p class="text-gray-600">{{ $video->description }}</p>
                        <form action="{{ route('likes', $video) }}" method="POST">
                        @csrf
                        <button type="submit">Лайки {{ $video->likes }}</button>
                        </form>

                        <form action="{{ route('dislikes', $video) }}" method="POST">
                            @csrf
                            <button type="submit">Дизлайки {{ $video->dislikes }}</button>
                        </form>   
                    </div>
                </div>
                
            @endforeach
            @if(Auth::check())
                <a href="{{ route('videos.create') }}" class="btn btn-primary mt-3">Создать видос</a>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">профиль</a>
            @endif
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <video class="w-full" controls>
            <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
        </video>
        <div class="p-6">
            <h2 class="text-3xl font-bold mb-4">{{ $video->title }}</h2>
            <p class="text-gray-700 mb-4">{{ $video->description }}</p>
            <div class="flex items-center mb-4">
                <span class="text-green-500">{{ $video->likes }} лайков</span>
                <span class="text-red-500 ml-4">{{ $video->dislikes }} дизлайков</span>
            </div>
            <div class="text-gray-600 mb-4">Загружено: {{ $video->created_at->format('d.m.Y H:i') }}</div>
            <div class="border-t pt-4">
                <h3 class="text-2xl font-semibold mb-4">Комментарии</h3>
                @foreach ($video->comments as $comment)
                    <div class="mb-4">
                        <p class="text-gray-800">{{ $comment->comment }}</p>
                        <div class="text-gray-600 text-sm">
                            <span>Автор: {{ $comment->user->name }}</span>
                            <span> - {{ $comment->created_at->format('d.m.Y H:i') }}</span>
                        </div>
                    </div>
                @endforeach
                @auth
                <form action="{{ route('comments.store', $video) }}" method="POST" class="mt-4">
                    @csrf
                    <textarea name="comment" class="w-full p-2 border rounded-lg mb-2" rows="3" placeholder="Оставить комментарий"></textarea>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Отправить</button>
                </form>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
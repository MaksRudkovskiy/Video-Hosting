@extends('layouts.app')

@section('content')
@php
    $videos = \App\Models\Video::latest()->get();
@endphp
<div class="container mx-auto py-12">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-3xl font-bold mb-6 text-center">Управление видеороликами</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Название</th>
                            <th class="py-2 px-4 border-b">Описание</th>
                            <th class="py-2 px-4 border-b">Дата загрузки</th>
                            <th class="py-2 px-4 border-b">Ограничения</th>
                            <th class="py-2 px-4 border-b">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $video->title }}</td>
                                <td class="py-2 px-4 border-b">{{ $video->description }}</td>
                                <td class="py-2 px-4 border-b">{{ $video->created_at->format('d.m.Y H:i') }}</td>
                                <td class="py-2 px-4 border-b">{{ $video->restriction }}</td>
                                <td class="py-2 px-4 border-b">
                                    <form action="{{ route('admin.videos.restriction', $video) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="restriction" class="p-2 border rounded-lg">
                                            <option value="none" {{ $video->restriction == 'none' ? 'selected' : '' }}>Нет ограничений</option>
                                            <option value="violation" {{ $video->restriction == 'violation' ? 'selected' : '' }}>Нарушение</option>
                                            <option value="shadow_ban" {{ $video->restriction == 'shadow_ban' ? 'selected' : '' }}>Теневой бан</option>
                                            <option value="ban" {{ $video->restriction == 'ban' ? 'selected' : '' }}>Бан</option>
                                        </select>
                                        <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg">Обновить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
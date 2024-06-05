@extends('layouts.auth')

@section('content')
<div class="container mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="mt-6 text-3xl font-medium">{{ __('Ваш профиль') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <a href="{{ route('videos.create') }}" class="px-12 bg-blue-500 text-white py-2 rounded-lg mt-12 block max-w-52 text-center">Создать видео</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

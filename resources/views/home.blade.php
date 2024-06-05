@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Типо дом') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Молодец залогинился!') }}
                     <!-- Добавьте кнопку или ссылку для перехода на страницу создания видео -->
                     <a href="{{ route('videos.create') }}" class="btn btn-primary mt-3">Создать видос</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

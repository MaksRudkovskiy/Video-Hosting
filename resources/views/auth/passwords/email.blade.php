@extends('layouts.auth')

@section('content')
<div class="mt-8">
    <div class="w-80 mx-auto block">
        <div class="">
            <div class="">
                <div class="font-medium text-xl text-center">{{ __('Сброс пароля') }}</div>

                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3 mt-6">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Эл. почта') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="block w-full h-12 p-3 border-black border-1 rounded-md" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Отправить запрос на смену пароля') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

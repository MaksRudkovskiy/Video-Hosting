@extends('layouts.auth')

@section('content')
<div class="mt-8">
    <div class="w-80 mx-auto block">
        <div class="">
            <div class="">
                <div class="font-medium text-xl text-center">{{ __('Регистрация') }}</div>

                <div class="">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="mt-6 block">{{ __('Никнейм') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="block w-full h-12 p-3 border-black border-1 rounded-md" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Эл. Почта') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="block w-full h-12 p-3 border-black border-1 rounded-md" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="block w-full h-12 p-3 border-black border-1 rounded-md" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Подтвердите пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="block w-full h-12 p-3 border-black border-1 rounded-md" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="font-medium h-11 w-full max-w-48 rounded text-hover mt-5 py-2 text-center mx-auto block border-black border-1 rounded">
                                    {{ __('Зарегистрироваться') }}
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

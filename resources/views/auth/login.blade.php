@extends('layouts.auth')

@section('content')
<div class="mt-8">
    <div class="w-80 mx-auto block">
        <div class="">
            <div class="">
                <div class="font-medium text-xl text-center">{{ __('Вход в аккаунт') }}</div>

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3 mt-6">
                            <label for="email" class="col-form-label text-md-end">{{ __('Эл. почта') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="block w-full h-12 p-3 border-black border-1 rounded-md" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 mt-6">
                            <label for="password" class="col-md-4 col-form-label text-md-end mt-6">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="@error('password') is-invalid @enderror block w-full h-12 p-3 border-black border-1 rounded-md" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="rounded-md" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Запомнить меня') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="font-medium h-11 w-full max-w-48 rounded text-hover mt-5 py-2 text-center mx-auto block border-black border-1 rounded">
                                    {{ __('Войти') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="mt-2 block" href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

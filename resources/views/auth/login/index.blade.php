<x-layout>
    <x-slot name="title">
        Вход
    </x-slot>
    <div class="mt-5 mx-auto" style="max-width: 500px; width: 100%;">
        <h2 class="mb-4 text-center">Вход</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="my-10 d-flex flex-column" method="POST" action="{{ route('login.store') }}">
            @csrf
            <div class="mb-3 w-100">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control  @error('email') is-invalid @enderror"  placeholder="Email" name="email" id="email" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 w-100">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror"  placeholder="Пароль" name="password" id="password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Запомнить меня
                </label>
            </div>
            
            <button type="submit" class="btn btn-primary mb-3">Войти</button>
            <div class="d-flex justify-content-between">
                <a href="{{ route('forgot-password.create') }}">Забыл пароль</a>
                <a href="{{ route('register.index') }}">Зарегистрироваться</a>
            </div>
            
            
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var inputs = document.querySelectorAll('.form-control');

            inputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    if (input.classList.contains('is-invalid')) {
                        input.classList.remove('is-invalid');
                    }
                });
            });
        });
    </script>
</x-layout>


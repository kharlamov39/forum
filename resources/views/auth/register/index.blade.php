<x-layout>
    <div class="mt-5 mx-auto" style="max-width: 500px; width: 100%;">
        <h2 class="mb-4 text-center">Регистрация</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="my-10 d-flex flex-column" method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="mb-3 w-100">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="Имя" name="name" required value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
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
            <div class="mb-3 w-100">
                <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror"  placeholder="Подтверждение пароля"  name="password_confirmation" id="password_confirmation" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary mb-3">Зарегистрироваться</button>
            <div class="mb-3 w-100">
                <span>Уже зарегистрированы?</span> <a style="color: blue;" href="{{ route('login.index') }}">Войти</a>
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

        


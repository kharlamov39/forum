<x-layout>
    <div>
        <h2>Регистрация</h2>
        <form class="my-10" method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="name" placeholder="Имя" name="name" required value="{{ old('name') }}">
                @error('name')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control"  placeholder="Email" name="email" id="email" required value="{{ old('email') }}">
                @error('email')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control"  placeholder="Пароль" name="password" id="password" required>
                @error('password')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                <input type="password" class="form-control"  placeholder="Подтверждение пароля"  name="password_confirmation" id="password_confirmation" required>
                @error('password_confirmation')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary mb-3">Зарегистрироваться</button>
            <div class="mb-3">
                <span>Уже зарегистрированы?</span> <a style="color: blue;" href="{{ route('login.index') }}">Войти</a>
            </div>
            
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-layout>

        


<x-layout>
    <div class="container">
        <h2>Регистрация</h2>
        <form class="my-10" method="POST" action="{{ route('register.store') }}">
            @csrf
            <input class="form-control" type="text" placeholder="Имя"  name="name" id="name" required value="{{ old('name') }}">
            <input class="form-control" type="email" placeholder="Email" name="email" id="email" required value="{{ old('email') }}">
            <input class="form-control" type="password" placeholder="Пароль" name="password" id="password" required>
            <input class="form-control" type="password" placeholder="Подтверждение пароля"  name="password_confirmation" id="password_confirmation" required>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            <div>
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

        


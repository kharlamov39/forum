<x-layout>
    <div>
        <h2>Вход</h2>
        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            @if (session('status'))
                <span style="color: green;">{{ session('status') }}</span>
            @endif
               
            <div>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" required value="{{ old('email') }}">
                @error('email')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
        
            <div>
                <label for="password">Пароль</label><br>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="remember">
                    Запомнить меня
                </label>
                <input type="checkbox" name="remember" id="remember">
            </div>

            
            <div style="margin: 20px 0px;">
                <button type="submit">Войти</button>
            </div>
            <div>
                <a href="{{ route('forgot-password.create') }}">Забыл пароль</a>
            </div>
        </form>
    </div>
</x-layout>

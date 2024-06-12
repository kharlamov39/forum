<x-layout>
    <div>
        <h2>Новый пароль</h2>
        <form method="POST" action="{{ route('password.reset.store') }}">
            @csrf

            @if (session('status'))
                <span style="color: green;">{{ session('status') }}</span>
            @endif

            <div>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" required value="{{ old('email', $request->email) }}">
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
                <label for="password">Подтверждение пароля</label><br>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
                @error('password_confirmation')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <input type="hidden" name="token" value="{{ $request->token }}">
        
            <div style="margin: 20px 0px;">
                <button type="submit">Обновить пароль</button>
            </div>

        </form>
    </div>
</x-layout>

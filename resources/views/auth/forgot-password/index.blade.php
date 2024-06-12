<x-layout>
    <div>
        <h2>Восстановить пароль</h2>

        @if (session('status'))
            <span style="color: green;">{{ session('status') }}</span>
        @endif

        <form method="POST" action="{{ route('forgot-password.store') }}">
            @csrf
               
            <div>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email"  value="{{ old('email') }}">
                @error('email')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            
            <div style="margin: 20px 0px;">
                <button type="submit">Отправить</button>
            </div>
        </form>

    </div>
</x-layout>

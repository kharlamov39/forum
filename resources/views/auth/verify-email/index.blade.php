<x-layout>
    <div>
        <h2>Подтверждение почты</h2>
        @if (session('message'))
            <span style="color: green;">{{ session('message') }}</span>
        @endif
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                Подтвердите адрес электронной почты
            </div>
        
            <button>Отправить ссылку на почту</button>    

        </form>
    </div>
</x-layout>
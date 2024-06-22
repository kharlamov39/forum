<x-layout>
    @foreach($users as $user)
        <h2>
            {{ $user->name }} <br>
            {{ $user->email }}
        </h2>
        @if($user->role_id)
            <p>Роль {{ $user->role->name }}</p>
        @endif
    @endforeach
</x-layout>
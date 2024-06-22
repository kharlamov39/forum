<x-layout>
    <table class="table mt-5">
        <h2 class="text-center my-5">Users</h2>
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td> {{ $user->name }}</td>
                <td> {{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>
                    @if(!$user->isAdmin())
                        <a class="btn btn-danger"> Delete</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
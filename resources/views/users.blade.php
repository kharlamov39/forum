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
                @if($user->email_verified_at)
                    <td> {{ $user->email }}</td>
                @else 
                    <td style="color: red;"> {{ $user->email }}</td>
                @endif
                <td>{{ $user->role->name }}</td>
                <td>
                    <a href="" class="btn btn-danger delete-link"  data-bs-toggle="modal" data-bs-target="#exampleModal"> 
                        <form style="display: none;" action="{{ route('users.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit">
                        </form>
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Предупреждение</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы действительно хотите удалить данного пользователя?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancel-delete" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-danger" id="confirm-delete">Удалить</button>
            </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Находим все ссылки для удаления
            var deleteLinks = document.querySelectorAll('.delete-link');

            deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Отменяем стандартное поведение перехода по ссылке
                // Обработчик клика по кнопке подтверждения
                let deleteForm = link.querySelector('form');
                document.getElementById('confirm-delete').addEventListener('click', function() {
                    deleteForm.submit();
                });
            });
            });
        });
    </script>

</x-layout>
<x-layout>
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="text-center my-5">Темы</h1>
        <button class="btn btn-primary">Создать тему +</button>
    </div>

    <?php 
    // dd($topics);
    ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Тема</th>
                <th scope="col">Автор</th>
                <th scope="col">Ответы</th>
                <th scope="col">Последнее сообщение</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topics as $topic)
                <tr>
                    <th scope="row">{{ $topic->text }}</th>
                    <td>{{ $topic->user->name }}</td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
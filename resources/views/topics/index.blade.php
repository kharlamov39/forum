<x-layout>
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="text-center my-5">Темы</h1>
        <a class="btn btn-primary" href="{{ route('topics.create') }}">Создать тему +</a>
    </div>

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
                    <th scope="row">
                        <a href="{{ route('topics.show', $topic->id) }}">
                          {{ $topic->text }}  
                        </a>
                    </th>
                    <td>{{ $topic->user->name }}</td>
                    <td>{{ $topic->comments_count }}</td>
                    <td>
                        @if ($topic->comments_count)
                        <p class="my-0">
                            {{ $topic->latestComment->text }}
                        </p>
                        <a href="">{{ $topic->latestComment->user->name }}</a>
                        @php
                            // Преобразуем время комментария в нужный формат
                            $formattedDateTime = \Carbon\Carbon::parse($topic->latestComment->created_at)->isoFormat('D MMMM YYYY H:mm');
                        @endphp
                        <span>
                            {{ $formattedDateTime }}
                        </span>        
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
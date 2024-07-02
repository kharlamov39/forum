<x-layout>
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="text-center my-5">Темы</h1>
        <button class="btn btn-primary">Создать тему +</button>
    </div>

    <div>
        @foreach($topics as $topic)
            <div>
                <h2>{{ $topic->text }}</h2>
            </div>
        @endforeach
    </div>
</x-layout>
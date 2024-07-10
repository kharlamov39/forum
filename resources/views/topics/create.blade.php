<x-layout>
    <x-slot name="title">
        Создать тему
    </x-slot>
    <h2 class="my-5">Новая тема</h2>

    <form action="{{ route('topics.store') }}" method="POST">
        @csrf 
        <div class="mb-3">
            <label for="text" class="form-label">Название темы</label>
            <input type="text" class="form-control" name="text" id="text" placeholder="Название темы" required>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Описание</label>
            <textarea class="form-control" id="body" rows="5" name="body" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            Отправить
        </button>
    </form>
</x-layout>
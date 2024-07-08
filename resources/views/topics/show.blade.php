<x-layout>
    <div class="my-5">

        <div class="table-comment">
            <div class="table-row">
                <div class="table-cell full-width">
                    {{ $topic->created_at->isoFormat('D MMMM YYYY H:mm') }}
                </div>
            </div>
            <div class="table-row">
                <div class="table-cell left-cell ">
                    <a href="">
                        {{ $topic->user->name }} 
                    </a>
                </div>
                <div class="table-cell right-cell topic-name">
                    {{ $topic->text }}
                </div>
            </div>
            <div class="table-row">
                <div class="table-cell left-cell user-info">
                    @if($topic->user->role_id == 1)
                        <span class="admin">
                            Администратор
                        </span>
                    @endif
                    <p>
                        Создано тем: {{ $users[$topic->user->id]->topics_count }}<br>
                        Сообщений: {{ $users[$topic->user->id]->comments_count }}
                    </p>
                    <p>
                    Зарегистрирован: <br> {{ $topic->user->created_at->isoFormat('D MMMM YYYY H:mm') }}
                    </p>
                </div>
                <div class="table-cell right-cell">
                    {{ $topic->body }}
                </div>
            </div>
        </div>
        
        @if($comments)
            @foreach($comments as $comment)
                <div class="table-comment">
                    <div class="table-row" style="position: relative;">
                        <div class="table-cell full-width">
                            {{ $comment->created_at->isoFormat('D MMMM YYYY H:mm') }}
                        </div>
                        @if(Auth::user()->isAdmin())
                            <form action="{{ route('comment.delete', ['topicId' => $topic->id, 'commentId' => $comment->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="position: absolute; top: 0; right: 0px; height: 100%; border-radius: 0px;" class="btn btn-danger" type="submit">
                                    Удалить
                                </button>
                            </form>
                        @endif

                    </div>
                    <div class="table-row">
                        <div class="table-cell left-cell ">
                            <a href="">
                               {{ $comment->user->name }} 
                            </a>
                        </div>
                        <div class="table-cell right-cell topic-name">
                           Re: {{ $topic->text }}
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell left-cell user-info">
                            @if($comment->user->role_id == 1)
                                <span class="admin">
                                    Администратор
                                </span>
                            @endif
                            <p>
                                Создано тем: {{ $users[$comment->user->id]->topics_count }}<br>
                                Сообщений: {{ $users[$comment->user->id]->comments_count }}
                            </p>
                           <p>
                            Зарегистрирован: <br> {{ $comment->user->created_at->isoFormat('D MMMM YYYY H:mm') }}
                           </p>
                        </div>
                        <div class="table-cell right-cell">
                            {{ $comment->text }}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        @auth
            @if(session('error'))
            <div class="alert alert-danger mb-0 container">
                {{ session('error') }}
            </div>
            @endif
            <form action="{{ route('comment.store', $topic->id) }}" method="POST" class="my-5" id="#commentForm">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="comment">Ваш комментарий</label>
                    <textarea class="form-control" name="comment" id="comment"></textarea>
                </div>
                <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                <button class="btn btn-primary" type="submit">
                    Отправить
                </button>
            </form>
        @endauth

        <!-- комментарии -->
    </div>
    
</x-layout>
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
                    Зарегистрирован: <br> {{ $topic->user->created_at->isoFormat('D MMMM YYYY H:mm') }}
                    </p>
                </div>
                <div class="table-cell right-cell">
                    {{ $topic->body }}
                </div>
            </div>
        </div>
        
        @if($topic->comments)
            @foreach($topic->comments as $comment)
                <div class="table-comment">
                    <div class="table-row">
                        <div class="table-cell full-width">
                            {{ $comment->created_at->isoFormat('D MMMM YYYY H:mm') }}
                        </div>
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

        <!-- комментарии -->
    </div>
    
</x-layout>
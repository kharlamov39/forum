<x-layout>
    <div class="my-5">
    
        <div class="border-bottom border-secondary">
            <h2 class="">{{ $topic->text }}</h2>
            <p class="mb-0">
                {{ $topic->body }}
            </p>
            <a href="">
                {{ $topic->user->name }} 
            </a>
        </div>
        
        @if($topic->comments)
            @foreach($topic->comments as $comment)
                <div>
                    <p>
                        {{ $comment->text }}
                    </p>
                </div>
            @endforeach
        @endif
        <!-- комментарии -->
    </div>
    
</x-layout>
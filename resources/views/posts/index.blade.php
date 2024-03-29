@include('posts.header')

<main>
    <div class="container">

        <h1 class="fs-2 my-3">自分の投稿</h1>
        @if(session('flash_message'))
        <p class="alert alert-success ">{{ session('flash_message') }}</p>
        @endif

        @if (session('error_message'))
        <p class="alert alert-danger">{{ session('error_message') }}</p>
        @endif

        <div class="mb-2">
            <a href="{{ route('posts.create') }}" class="text-decoration-none">新規投稿</a>
        </div>

        @if($posts->isNotEmpty())
        @foreach($posts as $post)
        <article>
            <div class="flex-room">
                <div class="card mb-3">

                    <a href="{{ route('posts.show', $post) }}" style="text-decoration: none; color: #333;">
                        <div class="card-body main-room">
                            <div class="text-flex">
                                <form action="{{ route('posts.index',$post) }}">
                                    @csrf
                                    <button type="submit" class="no-border-button">
                                        <img src="{{ $post->icon }}" alt="User Icon" class="icon-image">
                                        {{ $post->user_name }}
                                    </button>
                                </form>
                                <p class="time-text">{{ $post->created_at }}</p>
                            </div>
                            <p class="card-text">{{ $post->content }}</p>
                            <div class="d-flex">
                                <form action="{{ route('posts.destroy',$post) }}" method="POST" onsubmit="return confirm('本当に削除してもよろしいですか？');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">削除</button>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </article>
        @endforeach
        @else
        <p>投稿はありません。</p>
        @endif
</main>

@include('posts.footer')
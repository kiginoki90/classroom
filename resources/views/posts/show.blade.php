@include('posts.header')

    <main>
    <div class="container">

    <h1 class="fs-2 my-3">投稿詳細</h1>

        @if (session('flash_message'))
        <p class="text-success">{{ session('flash_message') }}</p>
        @endif

        <a href="{{ route('posts.index') }}" class="text-decoration-none">&lt; 戻る</a>

        <article>
        <div class="card mb-3">
                     <div class="card-body">
                     <h2 class="card-title fs-5">{{ $post->user_name }}</h2>
                     <p class="card-text">{{ $post->content }}</p>
        </article>

        @if ($post->user_id === Auth::id())
        <div class="d-flex">
        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('本当に削除してもよろしいですか？');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">削除</button>
        @endif

        </form>

    </main>



    @include('posts.footer')
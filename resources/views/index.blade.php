{{-- ホーム画面 --}}
<x-layout>
    <x-slot name=title>
        My BBS
    </x-slot>

    <h1>
        <span>My BBS</span>
        <a href="{{ route('posts.create') }}">[Add]</a>
    </h1>

    <ul>
        {{-- 以下二つは同じ意味 --}}
        {{-- <li><?php echo htmlspecialchars($posts[0], ENT_QUOTES, 'UTF-8'); ?></li> --}}
        {{-- <li>{{ $posts[0] }}</li>
    </ul>
    <ul>
        {{-- $postsが空の場合は@emptyへ --}}
        @forelse ($posts as $post)
            <li>
                {{-- <a href="/posts/{{$index}}"> --}}
                {{-- <a href="{{ route('posts.show', $post->id) }}"> --}}

                {{-- 第二引数の$postには$post->idが自動でセットされる。 --}}
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
            </li>
        @empty
            <li>No posts yet!</li>
        @endforelse
    </ul>
</x-layout>

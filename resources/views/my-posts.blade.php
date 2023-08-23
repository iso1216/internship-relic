<x-app-layout>
    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        @if (!empty($posts))
            <div class="grid grid-cols-1 gap-4">
                @foreach ($posts as $post)
                    <div class="bg-white shadow p-6 rounded-lg">
                        <h4 class="text-lg font-bold">{{ $post->title }}</h4>
                        <p class="text-gray-800">{{ $post->body }}</p>
                        <p class="text-gray-800">{{ $post->updated_at }}</p>

                        <div class="mt-4 flex">
                            <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-primary mr-2"
                                role="button">
                                {{ __('編集') }}
                            </a>
                            <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">
                                    {{ __('削除') }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex justify-center items-center h-full">
                <p class="text-lg text-gray-600">投稿はありません。</p>
            </div>
        @endif
    </div>
</x-app-layout>

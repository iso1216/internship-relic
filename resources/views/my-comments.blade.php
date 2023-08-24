<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('自分のコメント一覧') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        @if (!empty($comments))
            <div class="grid grid-cols-1 gap-4">
                @foreach ($comments as $comment)
                    <div class="bg-white shadow p-6 rounded-lg">
                        <p class="text-gray-800">{{ $comment->comment_text }}</p>
                        <p class="text-gray-800">{{ $comment->updated_at }}</p>

                        <div class="mt-4 flex">
                            <a href="{{ route('comment.edit', ['id' => $comment->id]) }}" class="btn btn-primary mr-2"
                                role="button">
                                {{ __('編集') }}
                            </a>
                            <form action="{{ route('comment.destroy', ['id' => $comment->id]) }}" method="post">
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
                <p class="text-lg text-gray-600">コメントはありません。</p>
            </div>
        @endif
    </div>
</x-app-layout>

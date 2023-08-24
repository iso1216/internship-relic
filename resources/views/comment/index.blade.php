<x-app-layout>
    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            <a href="{{ route('mycomments', ['id'=>$id]) }}" class="inline-block ml-4 py-2 px-4 btn btn-secondary text-decoration-none">
                {{ __('コメントを確認する') }}
            </a>
        </div>

        <div class="my-4">
            @if (!empty($comments))
                <ul>
                    @foreach ($comments as $comment)
                        <li class="mb-6 bg-white border rounded-lg p-4">
                            <p class="text-gray-1000 mt-4">{{ $comment->comment_text }}</p>
                            <div class="flex justify-between mt-8">
                                <p class="text-gray-600">{{ $comment->user->name }}</p>
                                <p class="text-gray-600">{{ $comment->updated_at }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">コメントはありません</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

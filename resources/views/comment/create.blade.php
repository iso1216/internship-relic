<x-app-layout>
    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        <div class="my-4">
            <div class="bg-white shadow p-6 rounded-lg">
                <form action="{{ route('comment.store', ['id'=>$id]) }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="comment_text" class="block text-gray-700 text-sm font-bold mb-2">コメント</label>
                        <textarea name="comment_text" id="comment_text" rows="6" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="py-2 px-4 btn btn-primary">投稿する</button>
                        <a href="{{ route('comment.index', ['id'=>$id]) }}" class="py-2 px-4 ml-4 btn btn-secondary">キャンセル</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('事故登録一覧') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        @if (!empty($trafficAccidents))
            <div class="grid grid-cols-1 gap-4">
                @foreach ($trafficAccidents as $trafficAccident)
                    <div class="bg-white shadow p-6 rounded-lg">
                        <h4 class="text-lg font-bold">{{ $trafficAccident->title }}</h4>
                        <p class="text-gray-800">{{ $trafficAccident->body }}</p>
                        <p class="text-gray-800">{{ $trafficAccident->updated_at }}</p>

                        <div class="mt-4 flex">
                            <a href="{{ route('trafficAccident.edit', ['id' => $trafficAccident->id]) }}" class="btn btn-primary mr-2"
                                role="button">
                                {{ __('編集') }}
                            </a>
                            <form action="{{ route('trafficAccident.destroy', ['id' => $trafficAccident->id]) }}" method="trafficAccident">
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
                <p class="text-lg text-gray-600">登録された事故情報はありません</p>
            </div>
        @endif
    </div>          

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('post.index') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    コメント欄
                </a>
            </div>
        </div>
</div>

</x-app-layout>
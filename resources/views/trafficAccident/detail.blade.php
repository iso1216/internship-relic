<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('事故登録一覧') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        @if (!empty($trafficAccident))
        <ul>
            <li class="mb-6 bg-white border rounded-lg p-4">
                <h3 class="text-lg font-bold mb-2 border-bottom">{{ $trafficAccident->user->name }}</h3>
                <div class="flex justify-between mt-8">
                    <p class="text-gray-600">{{ $trafficAccident->accident_place }}</p>
                    <p class="text-gray-800">{{ $trafficAccident->accident_detail }}</p>
                    <p class="text-lg">{{ $trafficAccident->accident_time }}</p>
                </div>
            </li>
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 mt-28">
                <a href="{{ route('comment.index', ['id' => $trafficAccident->id]) }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    <div class="inline-block rounded-lg bg-gray-300 hover:bg-gray-400 py-2 px-60 text-gray-800 hover:text-black">
                        {{ __('コメント欄') }}
                    </div>
                </a>
                <div class="flex justify-center items-center mt-4">
                    <a href="{{ route('comment.create', ['id' => $trafficAccident->id]) }}" class="inline-block py-2 px-4 btn btn-primary text-decoration-none">
                        {{ __('コメントする') }}
                    </a>
                </div>
            </div>
        </ul>
        @else
            <div class="flex justify-center items-center h-full">
                <p class="text-lg text-gray-600">登録された事故情報はありません</p>
            </div>
        @endif
    </div>

</x-app-layout>

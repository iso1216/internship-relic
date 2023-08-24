<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('事故登録一覧') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        @if (!empty($trafficAccident))
        <ul>
            <div class="flex justify-center mb-6 bg-white border rounded-lg p-4">
                <p class="text-lg font-bold mb-2">{{ $trafficAccident->user->name }}</p>
                <p class="absolute right-48 text-lg">{{ $trafficAccident->accident_time }}</p>
                <div class="mt-8">
                    <p class="text-xl font-bold">{{ $trafficAccident->accident_place }}</p>
                    <iframe src="https://maps.google.co.jp/maps?output=embed&q={{ $trafficAccident->accident_place }}" width="600" height="400" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <label class="p-2 text-2xl font-bold text-gray-800">{{ __('詳細') }}</label>
                    <p class="text-gray-800">{{ $trafficAccident->accident_detail }}</p>
                </div>
            </div>
            <div class="absolute right-12">
                <a href="{{ route('comment.index', ['id' => $trafficAccident->id]) }}" class="block w-full text-center font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    <div class="inline-block rounded-lg bg-gray-300 hover:bg-gray-400 py-2 px-8 text-gray-800 hover:text-black">
                        {{ __('コメント') }}
                    </div>
                </a>
            </div>
        </ul>
        @else
            <div class="flex justify-center items-center h-full">
                <p class="text-lg text-gray-600">登録された事故情報はありません</p>
            </div>
        @endif
    </div>
</x-app-layout>
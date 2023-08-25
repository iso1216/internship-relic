<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('事故登録一覧') }}
        </h2>
    </x-slot>

    <div class="relative max-w-7xl mx-auto mt-10 sm:px-6 lg:px-16">
        @if (!empty($trafficAccident))
        <div class="flex justify-center mb-6 bg-white border rounded-lg p-4">
            <p class="absolute left-48 text-2xl font-bold mb-2">{{ $trafficAccident->user->name }}</p>
            <div class="mt-8">
                <label class="pt-4 text-3xl font-bold text-gray-800">{{ __('事故発生場所') }}</label>
                <p class="text-xl font-bold">{{ $trafficAccident->accident_place }}</p>
                <iframe src="https://maps.google.co.jp/maps?output=embed&q={{ '名古屋市'.$trafficAccident->accident_place }}" width="600" height="400" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <label class="pt-4 text-3xl font-bold text-gray-800">{{ __('詳細') }}</label>
                <p class="text-gray-800 text-lg">{{ $trafficAccident->accident_detail }}</p>
                <label class="pt-4 text-3xl font-bold text-gray-800">{{ __('発生時刻') }}</label>
                <p class="text-xl">{{ $trafficAccident->accident_time }}</p>
            </div>
            <div class="absolute bottom-12 right-24">
                <a href="{{ route('comment.index', ['id' => $trafficAccident->id]) }}" class="block w-full text-center font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    <div class="inline-block rounded-lg bg-gray-300 hover:bg-gray-400 py-2 px-8 text-gray-800 hover:text-black">
                        {{ __('コメント') }}
                    </div>
                </a>
            </div>
        </div>
        @else
            <div class="flex justify-center items-center h-full">
                <p class="text-lg text-gray-600">登録された事故情報はありません</p>
            </div>
        @endif
    </div>
</x-app-layout>
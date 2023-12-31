<x-app-layout>
    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="m-4">
            <a href="{{ route('trafficAccident.create') }}" class="inline-block py-2 px-4 text-black border-2 rounded-xl border-gray-500 font-bold bg-blue-200 hover:bg-sky-100 text-decoration-none shadow">
                {{ __('事故登録する') }}
            </a>

            <a href="{{ route('mytrafficaccidents') }}" class="text-black border-gray-500 border-2 rounded-xl font-bold inline-block ml-8 py-2 px-4 bg-blue-200 hover:bg-sky-100 text-decoration-none shadow">
                {{ __('登録した事故を確認する') }}
            </a>
        </div>

        <div class="my-4">
            @if (!empty($trafficAccidents))
                <ul class="px-8">
                    @foreach ($trafficAccidents as $trafficAccident)
                        <li class="mb-6 bg-white border rounded-lg p-4">
                            <h3 class="text-lg border-bottom">{{ $trafficAccident->user->name }}</h3>
                            <div class="flex justify-between mt-2">
                                <p class="text-gray-600 text-xl">{{ $trafficAccident->accident_place }}</p>
                                <p class="text-lg">{{ $trafficAccident->accident_time }}</p>
                            </div>
                            <a href="{{ route('trafficAccident.detail', ['id' => $trafficAccident->id]) }}" class="inline-block ml-4 btn btn-secondary text-decoration-none">
                                {{ __('事故詳細ページ') }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">事故情報はありません。</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

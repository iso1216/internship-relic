<x-app-layout>
    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            <a href="{{ route('trafficAccident.create') }}" class="inline-block py-2 px-4 btn btn-primary text-decoration-none">
                {{ __('事故登録する') }}
            </a>

            <a href="{{ route('mytrafficaccidents') }}" class="inline-block ml-4 py-2 px-4 btn btn-secondary text-decoration-none">
                {{ __('自分の事故登録を確認する') }}
            </a>

            <a href="{{ route('trafficAccident.detail') }}" class="inline-block ml-4 py-2 px-4 btn btn-secondary text-decoration-none">
                {{ __('事故詳細ページ') }}
            </a>
        </div>

        <div class="my-4">
            @if (!empty($trafficAccidents))
                <ul>
                    @foreach ($trafficAccidents as $trafficAccident)
                        <li class="mb-6 bg-white border rounded-lg p-4">
                            <h3 class="text-lg font-bold mb-2 border-bottom">{{ $trafficAccident->user->name }}</h3>
                            <div class="flex justify-between mt-8">
                                <p class="text-gray-600">{{ $trafficAccident->accident_place }}</p>
                                <p class="text-lg">{{ $trafficAccident->accident_time }}</p>
                            </div>
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

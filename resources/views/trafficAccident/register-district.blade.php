<x-app-layout>
    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            @if (!empty($register_Accidents))
                <ul class="px-8">
                    @foreach ($register_Accidents as $accident)
                        <li class="mb-6 bg-white border rounded-lg p-4">
                            <h3 class="text-lg border-bottom">{{ $accident->user->name }}</h3>
                            <div class="flex justify-between mt-2">
                                <p class="text-gray-600 text-xl">{{ $accident->accident_place }}</p>
                                <p class="text-lg">{{ $accident->accident_time }}</p>
                            </div>
                            <a href="{{ route('trafficAccident.detail', ['id' => $accident->id]) }}" class="inline-block ml-4 btn btn-secondary text-decoration-none">
                                {{ __('事故詳細ページ') }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">投稿はありません。</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

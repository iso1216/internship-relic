<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('事故一覧') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            <a href="{{ route('trafficAccident.create') }}" class="inline-block py-2 px-4 btn btn-primary text-decoration-none">
                {{ __('事故登録する') }}
            </a>

            <a href="{{ route('mytrafficaccidents') }}" class="inline-block ml-4 py-2 px-4 btn btn-secondary text-decoration-none">
                {{ __('自分の事故登録を確認する') }}
            </a>
        </div>

        <div class="my-4">
            @if (!empty($trafficAccidents))
                <ul>
                    @foreach ($trafficAccidents as $trafficAccident)
                        <li class="mb-6 bg-white border rounded-lg p-4">
                            <h3 class="text-lg font-bold mb-2 border-bottom">{{ $trafficAccident->title }}</h3>
                            <p class="text-gray-1000 mt-4">{{ $trafficAccident->body }}</p>
                            <div class="flex justify-between mt-8">
                                <p class="text-gray-600">{{ $trafficAccident->user->name }}</p>
                                <p class="text-gray-600">{{ $trafficAccident->updated_at }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">登録した事故情報はありません</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

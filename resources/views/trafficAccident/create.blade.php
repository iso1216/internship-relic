<?php $place_data = ["未設定","千種区","東区","北区","西区","中村区","中区","昭和区","瑞穂区","熱田区","中川区","港区","南区","守山区","緑区","名東区","天白区"]; ?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規事故登録') }}
            
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        <div class="my-4">
            <div class="bg-white shadow p-6 rounded-lg">
                <form action="{{ route('trafficAccident.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="accident_place" class="block text-gray-700 text-sm font-bold mb-2">事故発生地区</label>
                        <select id="accident_place" name="accident_place" class="mt-1 block w-full" autocomplete="current_accident_place" >
                        @foreach ($place_data as $place)
                            <option value="{{$place}}">{{$place}}</option> 
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="accident_time" class="block text-gray-700 text-sm font-bold mb-2">事故発生時刻</label>
                        <input type="time" id="accident_time" name="accident_time" required />
                    </div>
                    <div class="mb-4">
                        <label for="accident_detail" class="block text-gray-700 text-sm font-bold mb-2">本文</label>
                        <textarea name="accident_detail" id="accident_detail" rows="6" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="py-2 px-4 btn btn-primary">投稿する</button>
                        <a href="{{ route('home') }}" class="py-2 px-4 ml-4 btn btn-secondary">キャンセル</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
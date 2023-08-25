<?php $place_data = ["千種区","東区","北区","西区","中村区","中区","昭和区","瑞穂区","熱田区","中川区","港区","南区","守山区","緑区","名東区","天白区"]; ?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('事故登録編集') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body mt-4">
                        <form method="POST" action="{{ route('trafficAccident.update', $trafficAccident->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row my-4">
                                <label for="accident_place" class="col-md-4 col-form-label text-md-right">{{ __('地区') }}</label>
                                <div class="col-md-6">
                                    <select id="accident_place" name="accident_place" class="mt-1 block w-full" autocomplete="current_accident_place" >
                                    @foreach ($place_data as $place)
                                        <option value="{{$place}}"
                                            @if($place==$trafficAccident->accident_place ) selected @endif>
                                            {{$place}}</option> 
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="accident_time" class="col-md-4 col-form-label text-md-right">{{ __('発生時刻') }}</label>
                                <div class="col-md-6">
                                    <input id="accident_time" type="time" class="form-control @error('accident_time') is-invalid @enderror" name="accident_time" value="{{ old('accident_time', $trafficAccident->accident_time) }}" required autocomplete="accident_time" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="accident_detail" class="col-md-4 col-form-label text-md-right">{{ __('本文') }}</label>
                                <div class="col-md-6">
                                    <textarea name="accident_detail" id="accident_detail" rows="6" class="form-control @error('accident_detail') is-invalid @enderror" required autocomplete="accident_time" autofocus>{{ old('accident_detail', $trafficAccident->accident_detail) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('変更を保存する') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

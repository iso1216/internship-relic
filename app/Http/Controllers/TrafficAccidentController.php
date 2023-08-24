<?php

namespace App\Http\Controllers;

use App\Models\TrafficAccident;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrafficAccidentController extends Controller
{
    public function index()
    {
        $trafficAccidents = TrafficAccident::orderBy('updated_at', 'desc')->get();
        return view('trafficAccident.index', compact('trafficAccidents'));
    }

    public function detail()
    {
        $trafficAccidents = TrafficAccident::orderBy('updated_at', 'desc')->get();
        return view('trafficAccident.detail', compact('trafficAccidents'));
    }

    public function register()
    {
        $register_Accidents = TrafficAccident::where('accident_place', User::select('register_place')->where('id', Auth::id())->pluck('register_place'))->orderBy('updated_at', 'desc')->get();
        return view('trafficAccident.register-district', compact('register_Accidents'));
    }

    public function create()
    {
        return view('trafficAccident.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'accident_place' => 'required|string|max:255',
            'accident_time' => 'required|string',
            'accident_detail' => 'required|string|max:255',
        ]);
        /**ModelsのAccident */
        $trafficAccident = new TrafficAccident();
        $trafficAccident->accident_place = $validatedData['accident_place'];
        $trafficAccident->accident_time = $validatedData['accident_time'];
        $trafficAccident->accident_detail = $validatedData['accident_detail'];
        $trafficAccident->user_id = Auth::id();
        $trafficAccident->save();

        return redirect()->route('home')->with('success', '投稿が作成されました');
    }

    public function myTrafficAccidents()
    {
        $trafficAccidents = TrafficAccident::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('my-trafficAccidents', compact('trafficAccidents'));
    }

    public function edit($id)
    {
        $trafficAccident = TrafficAccident::findOrFail($id);
        return view('trafficAccident.edit', compact('trafficAccident'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'accident_place' => 'required|string|max:255',
            'accident_time' => 'required|string',
            'accident_detail' => 'required|string|max:255',
        ]);

        $trafficAccident = TrafficAccident::findOrFail($id);
        $trafficAccident->accident_place = $validatedData['accident_place'];
        $trafficAccident->accident_time = $validatedData['accident_time'];
        $trafficAccident->accident_detail = $validatedData['accident_detail'];
        $trafficAccident->save();

        return redirect()->route('mytrafficaccidents')->with('success', '投稿が更新されました');
    }

    public function destroy($id)
    {
        $trafficAccident = TrafficAccident::findOrFail($id);
        $trafficAccident->delete();

        return redirect()->route('mytrafficaccidents')->with('success', '投稿が削除されました');
    }
}


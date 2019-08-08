<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('home', compact('user'));
    }
    public function update()
    {
        $user = auth()->user();
        $user->size = request()->get('size');
        $user->favorite_numbers = ($numbers = request()->get('favorite_numbers')) ? explode(',', $numbers) : null;
        $user->save();
        return redirect()->route('home');
    }
    public function clear_cache()
    {
        \Artisan::call('cache:clear');
        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Radius;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function home(Request $request)
    {
        return view('contents.home');
    }

    public function data(Request $request)
    {
        $data = Radius::simplePaginate(10);
        return view('contents.data', compact('data'));
    }

    public function deleteAll()
    {
        DB::table('radius')->truncate();
        return redirect()->back()->with('success', 'All data has been deleted.');
    }
}

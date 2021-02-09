<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use App\Models\UpdateHistory;

class TopController extends Controller
{
    public function index ()
    {
        $updateHistorys = UpdateHistory::orderBy('update_history_id', 'desc')->get();
        return view('top', compact('updateHistorys'));
    }
}

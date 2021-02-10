<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemKind;

class SearchController extends Controller
{
    public function index()
    {
        $itemKinds = ItemKind::all();
        $items = [];
        foreach ($itemKinds as $itemKind) {
            $items[$itemKind['item_id']]['data'] = Item::where('item_id', $itemKind['item_id'])->orderBy('item_number', 'asc')->get();
            $items[$itemKind['item_id']]['item_kind'] = $itemKind;
        }

        return view('search', compact('items'));
    }
}

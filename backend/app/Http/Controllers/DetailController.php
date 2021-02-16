<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemKind;
use App\Models\Skill;
use App\Models\Assist;
use App\Models\Characteristic;
use App\Models\Album;

class DetailController extends Controller
{
    public function index($albumNo)
    {
        $album = Album::where('album_no', $albumNo)->get();
        if ($album->isNotEmpty()) {
            $album = $album[0];
            $captions = [
                'attribute' => Item::where('item_id', 2)->where('item_number', $album->attribute)->get()[0]->item_name,
                'type' => Item::where('item_id', 3)->where('item_number', $album->type)->get()[0]->item_name,
                'rarity' => Item::where('item_id', 4)->where('item_number', $album->rarity)->get()[0]->item_name,
                'weapon' => Item::where('item_id', 5)->where('item_number', $album->weapon)->get()[0]->item_name,
                'gp' => Item::where('item_id', 6)->where('item_number', $album->gp)->get()[0]->item_name,
                'skill1_zero' => $album->skill1_zero ? Skill::where('skill_id', $album->skill1_zero)->get()[0] : '',
                'skill2_zero' => $album->skill2_zero ? Skill::where('skill_id', $album->skill2_zero)->get()[0] : '',
                'skill1_max' => $album->skill1_max ? Skill::where('skill_id', $album->skill1_max)->get()[0] : '',
                'skill2_max' => $album->skill2_max ? Skill::where('skill_id', $album->skill2_max)->get()[0] : '',
                'assist1_zero' => $album->assist1_zero ? Assist::where('assist_id', $album->assist1_zero)->get()[0] : '',
                'assist2_zero' => $album->assist2_zero ? Assist::where('assist_id', $album->assist2_zero)->get()[0] : '',
                'assist1_max' => $album->assist1_max ? Assist::where('assist_id', $album->assist1_max)->get()[0] : '',
                'assist2_max' => $album->assist2_max ? Assist::where('assist_id', $album->assist2_max)->get()[0] : '',
                'characteristic1' => $album->characteristic1 ? Characteristic::where('characteristic_id', $album->characteristic1)->get()[0]->characteristic_name : '',
                'characteristic2' => $album->characteristic2 ? Characteristic::where('characteristic_id', $album->characteristic2)->get()[0]->characteristic_name : '',
            ];

            return view('detail', compact('album', 'captions'));
        } else {
            return redirect()->action('App\Http\Controllers\TopController@index');
        }
    }
}

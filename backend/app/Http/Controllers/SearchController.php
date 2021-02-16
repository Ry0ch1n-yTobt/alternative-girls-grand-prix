<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemKind;
use App\Models\Skill;
use App\Models\Assist;
use App\Models\Characteristic;
use App\Models\Album;

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

    public function search(Request $request)
    {
        $chars = $request->chars;
        $attributeTypes = $request->attributeTypes;
        $types = $request->types;
        $rarities = $request->rarities;
        $weapons = $request->weapons;
        $gps = $request->gps;
        $skillKinds = $request->skillKinds;
        $skillCondition = $request->skillCondition;
        $assistKinds = $request->assistKinds;
        $assistCondition = $request->assistCondition;
        $characteristicKinds = $request->characteristicKinds;
        $characteristicCondition = $request->characteristicCondition;

        // スキル、アシスト、特性の分類から取得するidを取得する
        $skills = $assists = $characteristics = [];
        if ($skillKinds) {
            if ($skillCondition) {
                foreach ($skillKinds as $skillKind) {
                    $skills[] = Skill::where('skill_kind', $skillKind)->select('skill_id')->get();
                }
            } else {
                $skills = Skill::where('skill_kind', $skillKinds)->select('skill_id')->get();
            }
        }

        if ($assistKinds) {
            if ($assistCondition) {
                foreach ($assistKinds as $assistKind) {
                    $assists[] = Assist::where('assist_kind', $assistKind)->select('assist_id')->get();
                }
            } else {
                $assists = Assist::where('assist_kind', $assistKinds)->select('assist_id')->get();
            }
        }

        if ($characteristicKinds) {
            if ($characteristicCondition) {
                foreach ($characteristicKinds as $characteristicKind) {
                    $characteristics[] = Characteristic::where('characteristic_kind', $characteristicKind)->select('characteristic_id')->get();
                }
            } else {
                $characteristics = Characteristic::where('characteristic_kind', $characteristicKinds)->select('characteristic_id')->get();
            }
        }

        // キャラ
        $albums = Album::when($chars, function ($query) use ($chars) {
            return $query->whereIn('char', $chars);
        })
            // 属性
            ->when($attributeTypes, function ($query) use ($attributeTypes) {
                return $query->whereIn('attribute', $attributeTypes);
            })
            // タイプ
            ->when($types, function ($query) use ($types) {
                return $query->whereIn('type', $types);
            })
            // レアリティ
            ->when($rarities, function ($query) use ($rarities) {
                return $query->whereIn('rarity', $rarities);
            })
            // 武器種
            ->when($weapons, function ($query) use ($weapons) {
                return $query->whereIn('weapon', $weapons);
            })
            // 衣装開放
            ->when($gps, function ($query) use ($gps) {
                return $query->whereIn('gp', $gps);
            })
            // スキル
            ->when($skills, function ($query) use ($skills, $skillCondition) {
                // スキルが1つのみ設定されている場合はOR検索
                if (count($skills) == 1) {
                    return $query->where(function ($query) use ($skills) {
                        $query->whereIn('skill1_max', $skills[0])
                            ->orWhereIn('skill2_max', $skills[0]);
                    });
                } else {
                    if ($skillCondition) {
                        // AND
                        return $query->where(function ($query) use ($skills) {
                            $query->whereIn('skill1_max', $skills[0])
                                ->whereIn('skill2_max', $skills[1]);
                        })
                            ->orWhere(function ($query) use ($skills) {
                                $query->whereIn('skill1_max', $skills[1])
                                    ->whereIn('skill2_max', $skills[0]);
                            });
                    } else {
                        // OR
                        return $query->where(function ($query) use ($skills) {
                            $query->whereIn('skill1_max', $skills)
                                ->orWhereIn('skill2_max', $skills);
                        });
                    }
                }
            })
            // アシスト
            ->when($assists, function ($query) use ($assists, $assistCondition) {
                // アシストが1つのみ設定されている場合はOR検索
                if (count($assists) == 1) {
                    return $query->where(function ($query) use ($assists) {
                        $query->whereIn('assist1_max', $assists[0])
                            ->orWhereIn('assist2_max', $assists[0]);
                    });
                } else {
                    if ($assistCondition) {
                        // AND
                        return $query->where(function ($query) use ($assists) {
                            $query->whereIn('assist1_max', $assists[0])
                                ->whereIn('assist2_max', $assists[1]);
                        })
                            ->orWhere(function ($query) use ($assists) {
                                $query->whereIn('assist1_max', $assists[1])
                                    ->whereIn('assist2_max', $assists[0]);
                            });
                    } else {
                        // OR
                        return $query->where(function ($query) use ($assists) {
                            $query->whereIn('assist1_max', $assists)
                                ->orWhereIn('assist2_max', $assists);
                        });
                    }
                }
            })
            // 特性
            ->when($characteristics, function ($query) use ($characteristics, $characteristicCondition) {
                // 特性が1つのみ設定されている場合はOR検索
                if (count($characteristics) == 1) {
                    return $query->where(function ($query) use ($characteristics) {
                        $query->whereIn('characteristic1', $characteristics[0])
                            ->orWhereIn('characteristic2', $characteristics[0]);
                    });
                } else {
                    if ($characteristicCondition) {
                        // AND
                        return $query->where(function ($query) use ($characteristics) {
                            $query->whereIn('characteristic1', $characteristics[0])
                                ->whereIn('characteristic2', $characteristics[1]);
                        })
                            ->orWhere(function ($query) use ($characteristics) {
                                $query->whereIn('characteristic1', $characteristics[1])
                                    ->whereIn('characteristic2', $characteristics[0]);
                            });
                    } else {
                        // OR
                        return $query->where(function ($query) use ($characteristics) {
                            $query->whereIn('characteristic1', $characteristics)
                                ->orWhereIn('characteristic2', $characteristics);
                        });
                    }
                }
            })
            ->where('delete_flg', 0)
            ->orderBy('rarity', 'desc')
            ->orderBy('album_no', 'asc')
            ->get();

        if (count($albums) == 0 || count($albums) > 100) {
            $json = [
                'result' => 'fail',
                'view' => '',
                'count' => count($albums),
            ];
        } else {
            foreach ($albums as &$album) {
                $album['attributeCaption'] = Item::select('item_name')->where('item_id', 2)->where('item_number', $album['attribute'])->get()[0]->item_name;
                $album['typeCaption'] = Item::select('item_name')->where('item_id', 3)->where('item_number', $album['type'])->get()[0]->item_name;
                $album['rarityCaption'] = Item::select('item_name')->where('item_id', 4)->where('item_number', $album['rarity'])->get()[0]->item_name;
                $album['weaponCaption'] = Item::select('item_name')->where('item_id', 5)->where('item_number', $album['weapon'])->get()[0]->item_name;
                $album['gpCaption'] = Item::select('item_name')->where('item_id', 6)->where('item_number', $album['gp'])->get()[0]->item_name;
                $album['skill1Caption'] = $album['skill1_max'] ? Skill::select('skill_name')->where('skill_id', $album['skill1_max'])->get()[0]->skill_name : '-';
                $album['skill2Caption'] = $album['skill2_max'] ? Skill::select('skill_name')->where('skill_id', $album['skill2_max'])->get()[0]->skill_name : '-';
                $album['assist1Caption'] = $album['assist1_max'] ? Assist::select('assist_name')->where('assist_id', $album['assist1_max'])->get()[0]->assist_name : '-';
                $album['assist2Caption'] = $album['assist2_max'] ? Assist::select('assist_name')->where('assist_id', $album['assist2_max'])->get()[0]->assist_name : '-';
                $album['characteristic1Caption'] = $album['characteristic1'] ? Characteristic::select('characteristic_name')->where('characteristic_id', $album['characteristic1'])->get()[0]->characteristic_name : '-';
                $album['characteristic2Caption'] = $album['characteristic2'] ? Characteristic::select('characteristic_name')->where('characteristic_id', $album['characteristic2'])->get()[0]->characteristic_name : '-';
            }
            $view = view('result', compact('albums'))->render();
            $json = [
                'result' => 'success',
                'view' => $view,
                'count' => count($albums),
            ];
        }

        return json_encode($json);
    }
}

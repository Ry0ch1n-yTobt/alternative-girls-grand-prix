@extends('layout')
@section('title')詳細 - {{ $album->album_name }}@endsection
@section('content')
    <h2>詳細 - {{ $album->album_name }}</h2>
    <p class="info-header">基本情報</p>
    <div class='text-nowrap table-responsive'>
        <table class="table table-striped table-hover table-fixed">
            <thead>
                <th>アルバムNo.</th>
                <th>名称</th>
                <th>属性</th>
                <th>タイプ</th>
                <th>レアリティ</th>
                <th>武器種</th>
                <th>衣装解放</th>
            </thead>
            <tbody>
                <td class="text-center">{{ str_pad($album->album_no, 4, 0, STR_PAD_LEFT) }}</td>
                <td class="text-center">{{ $album->album_name }}</td>
                <td class="text-center">{{ $captions['attribute'] }}</td>
                <td class="text-center">{{ $captions['type'] }}</td>
                <td class="text-center">{{ $captions['rarity'] }}</td>
                <td class="text-center">{{ $captions['weapon'] }}</td>
                <td class="text-center">{{ $captions['gp'] }}</td>
            </tbody>
        </table>
    </div>
    <p class="info-header">ステータス</p>
    <div class='text-nowrap table-responsive'>
        <table class="table table-striped table-hover table-fixed">
            <thead>
                <th>衣装版</th>
                <th>体力</th>
                <th>攻撃力</th>
                <th>防御力</th>
                <th>素早さ</th>
                <th>回避</th>
                <th>クリティカル</th>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" class="text-center">0</td>
                    <td class="text-center">{{ $album->physical_zero }}</td>
                    <td class="text-center">{{ $album->atack_zero }}</td>
                    <td class="text-center">{{ $album->defence_zero }}</td>
                    <td class="text-center">{{ $album->speed }}</td>
                    <td class="text-center">{{ $album->accuracy }}</td>
                    <td class="text-center">{{ $album->avoidance }}</td>
                </tr>
                <tr>
                    <td scope="row" class="text-center">MAX</td>
                    <td class="text-center">{{ $album->physical_max }}</td>
                    <td class="text-center">{{ $album->atack_max }}</td>
                    <td class="text-center">{{ $album->defence_max }}</td>
                    <td class="text-center">{{ $album->speed }}</td>
                    <td class="text-center">{{ $album->accuracy }}</td>
                    <td class="text-center">{{ $album->avoidance }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p class="info-header">スキル</p>
    <div class='text-nowrap table-responsive'>
        <table class="table table-striped table-hover table-fixed">
            <thead>
                <th>衣装版</th>
                <th>スキル1名称</th>
                <th>スキル1説明</th>
                <th>スキル2名称</th>
                <th>スキル2説明</th>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" class="text-center">0</td>
                    <td class="text-center">{{ $captions['skill1_zero'] ? $captions['skill1_zero']['skill_name'] : '' }}</td>
                    <td>{{ $captions['skill1_zero'] ? $captions['skill1_zero']['skill_discription'] : '' }}</td>
                    <td class="text-center">{{ $captions['skill2_zero'] ? $captions['skill2_zero']['skill_name'] : '' }}</td>
                    <td>{{ $captions['skill2_zero'] ? $captions['skill2_zero']['skill_discription'] : '' }}</td>
                </tr>
                <tr>
                    <td scope="row" class="text-center">MAX</td>
                    <td class="text-center">{{ $captions['skill1_max'] ? $captions['skill1_max']['skill_name'] : '' }}</td>
                    <td>{{ $captions['skill1_max'] ? $captions['skill1_max']['skill_discription'] : '' }}</td>
                    <td class="text-center">{{ $captions['skill2_max'] ? $captions['skill2_max']['skill_name'] : '' }}</td>
                    <td>{{ $captions['skill2_max'] ? $captions['skill2_max']['skill_discription'] : '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p class="info-header">アシスト</p>
    <div class='text-nowrap table-responsive'>
        <table class="table table-striped table-hover table-fixed">
            <thead>
                <th>衣装版</th>
                <th>アシスト1名称</th>
                <th>アシスト1説明</th>
                <th>アシスト2名称</th>
                <th>アシスト2説明</th>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" class="text-center">0</td>
                    <td class="text-center">{{ $captions['assist1_zero'] ? $captions['assist1_zero']['assist_name'] : '' }}</td>
                    <td>{{ $captions['assist1_zero'] ? $captions['assist1_zero']['assist_discription'] : '' }}</td>
                    <td class="text-center">{{ $captions['assist2_zero'] ? $captions['assist2_zero']['assist_name'] : '' }}</td>
                    <td>{{ $captions['assist2_zero'] ? $captions['assist2_zero']['assist_discription'] : '' }}</td>
                </tr>
                <tr>
                    <td scope="row" class="text-center">MAX</td>
                    <td class="text-center">{{ $captions['assist1_max'] ? $captions['assist1_max']['assist_name'] : ''}}</td>
                    <td>{{ $captions['assist1_max'] ? $captions['assist1_max']['assist_discription'] : ''}}</td>
                    <td class="text-center">{{ $captions['assist2_max'] ? $captions['assist2_max']['assist_name'] : ''}}</td>
                    <td>{{ $captions['assist2_max'] ? $captions['assist2_max']['assist_discription'] : ''}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p class="info-header">特性</p>
        <div class='text-nowrap table-responsive'>
            <table class="table table-striped table-hover table-fixed">
            <thead>
                <th>特性1</th>
                <th>特性2</th>
            </thead>
            <tbody>
                <td scope="row" class="text-center">{{ $captions['characteristic1'] }}
                <td scope="row" class="text-center">{{ $captions['characteristic2'] }}
            </tbody>
        </table>
    </div>
    <button type="button" name="return">戻る</button>
@endsection

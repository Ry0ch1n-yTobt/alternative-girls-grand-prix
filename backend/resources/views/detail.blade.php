@extends('layout')
@section('title')詳細 - {{ $album->album_name }}@endsection
@section('content')
    <h2>詳細</h2>
    <p>基本情報</p>
    <table class="table">
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
            <td scope="row">{{ $album->album_no }}</td>
            <td>{{ $album->album_name }}</td>
            <td>{{ $captions['attribute'] }}</td>
            <td>{{ $captions['type'] }}</td>
            <td>{{ $captions['rarity'] }}</td>
            <td>{{ $captions['weapon'] }}</td>
            <td>{{ $captions['gp'] }}</td>
        </tbody>
    </table>
    <p>ステータス</p>
    <table class="table">
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
                <td scope="row">0</td>
                <td>{{ $album->physical_zero }}</td>
                <td>{{ $album->atack_zero }}</td>
                <td>{{ $album->defence_zero }}</td>
                <td rowspan="2">{{ $album->speed }}</td>
                <td rowspan="2">{{ $album->accuracy }}</td>
                <td rowspan="2">{{ $album->avoidance }}</td>
            </tr>
            <tr>
                <td scope="row">MAX</td>
                <td>{{ $album->physical_max }}</td>
                <td>{{ $album->atack_max }}</td>
                <td>{{ $album->defence_max }}</td>
            </tr>
        </tbody>
    </table>
    <p>スキル</p>
    <table class="table">
        <thead>
            <th>衣装版</th>
            <th>スキル1名称</th>
            <th>スキル1説明</th>
            <th>スキル2名称</th>
            <th>スキル2説明</th>
        </thead>
        <tbody>
            <tr>
                <td scope="row">0</td>
                <td>{{ $captions['skill1_zero'] ? $captions['skill1_zero']['skill_name'] : '' }}</td>
                <td>{{ $captions['skill1_zero'] ? $captions['skill1_zero']['skill_discription'] : '' }}</td>
                <td>{{ $captions['skill2_zero'] ? $captions['skill2_zero']['skill_name'] : '' }}</td>
                <td>{{ $captions['skill2_zero'] ? $captions['skill2_zero']['skill_discription'] : '' }}</td>
            </tr>
            <tr>
                <td scope="row">MAX</td>
                <td>{{ $captions['skill1_max'] ? $captions['skill1_max']['skill_name'] : '' }}</td>
                <td>{{ $captions['skill1_max'] ? $captions['skill1_max']['skill_discription'] : '' }}</td>
                <td>{{ $captions['skill2_max'] ? $captions['skill2_max']['skill_name'] : '' }}</td>
                <td>{{ $captions['skill2_max'] ? $captions['skill2_max']['skill_discription'] : '' }}</td>
            </tr>
        </tbody>
    </table>
    <p>アシスト</p>
    <table class="table">
        <thead>
            <th>衣装版</th>
            <th>アシスト1名称</th>
            <th>アシスト1説明</th>
            <th>アシスト2名称</th>
            <th>アシスト2説明</th>
        </thead>
        <tbody>
            <tr>
                <td scope="row">0</td>
                <td>{{ $captions['assist1_zero'] ? $captions['assist1_zero']['assist_name'] : '' }}</td>
                <td>{{ $captions['assist1_zero'] ? $captions['assist1_zero']['assist_discription'] : '' }}</td>
                <td>{{ $captions['assist2_zero'] ? $captions['assist2_zero']['assist_name'] : '' }}</td>
                <td>{{ $captions['assist2_zero'] ? $captions['assist2_zero']['assist_discription'] : '' }}</td>
            </tr>
            <tr>
                <td scope="row">MAX</td>
                <td>{{ $captions['assist1_max'] ? $captions['assist1_max']['assist_name'] : ''}}</td>
                <td>{{ $captions['assist1_max'] ? $captions['assist1_max']['assist_discription'] : ''}}</td>
                <td>{{ $captions['assist2_max'] ? $captions['assist2_max']['assist_name'] : ''}}</td>
                <td>{{ $captions['assist2_max'] ? $captions['assist2_max']['assist_discription'] : ''}}</td>
            </tr>
        </tbody>
    </table>
    <p>特性</p>
    <table class="table">
        <thead>
            <th>特性1</th>
            <th>特性2</th>
        </thead>
        <tbody>
            <td scope="row">{{ $captions['characteristic1'] }}
            <td scope="row">{{ $captions['characteristic2'] }}
        </tbody>
    </table>
    <button type="button"><a href="{{ url('/search') }}">戻る</a></button>
@endsection

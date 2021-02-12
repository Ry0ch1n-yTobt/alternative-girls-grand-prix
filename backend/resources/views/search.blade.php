@extends('layout')
@section('title', '検索')
@section('content')
    <h2>検索条件</h2>
    <div>
        @foreach ($items as $item)
            <p>{{ $item['item_kind']['item_caption'] }}</p>
            @foreach ($item['data'] as $data)
                <div>
                    <label for="{{ $item['item_kind']['item_kind'] }}{{ $data->item_number }}" class="col-lg-2 col-sm-3 col-xs-6">
                        <input type="checkbox" class="checkbox" name="{{ $item['item_kind']['item_kind'] }}" id="{{ $item['item_kind']['item_kind'] }}{{ $data->item_number }}" value="{{ $data->item_number }}">{{ $data->item_name }}
                    </label>
                </div>
            @endforeach
            @if ($item['item_kind']['item_id'] >= 7)
                <label><input type="radio" class="radio" name="{{ $item['item_kind']['item_kind'] }}_condition" value="1" checked>AND</label>
                <label><input type="radio" class="radio" name="{{ $item['item_kind']['item_kind'] }}_condition" value="0">OR</label>
            @endif
        @endforeach
    </div>
    <div>
        <button type="button" name="reset_btn" id="resetBtn">リセット</button>
        <button type="button" name="search_btn" id="searchBtn">検　索</button>
    </div>
    <div></div>
    <table class="table">
        <colgroup>
        </colgroup>
        <thead>
            <tr>
                <th colspan="7">基本情報</th>
                <th colspan="6">スキル・特性・耐性(衣装盤MAX時)</th>
            </tr>
            <tr>
                <th>詳細</th>
                <th>名称</th>
                <th>属性</th>
                <th>タイプ</th>
                <th>レアリティ</th>
                <th>武器種</th>
                <th>衣装解放</th>
                <th>スキル1</th>
                <th>スキル2</th>
                <th>アシスト1</th>
                <th>アシスト2</th>
                <th>特性1</th>
                <th>特性2</th>
            </tr>
        </thead>
        <tbody id="searchResult"></tbody>
    </table>
@endsection

@extends('layout')
@section('title', '検索')
@section('content')
    <h2>検索条件</h2>
    @foreach ($items as $item)
        <p class="font-weight-bold">{{ $item['item_kind']['item_caption'] }}</p>
        <div class="row">
            @foreach ($item['data'] as $data)
                <div class="col-lg-2 col-sm-3 col-xs-4">
                    <label for="{{ $item['item_kind']['item_kind'] }}{{ $data->item_number }}">
                        <input type="checkbox" class="checkbox" name="{{ $item['item_kind']['item_kind'] }}" id="{{ $item['item_kind']['item_kind'] }}{{ $data->item_number }}" value="{{ $data->item_number }}">{{ $data->item_name }}
                    </label>
                </div>
                @endforeach
            </div>
        @if ($item['item_kind']['item_id'] >= 7)
            <label><input type="radio" class="radio" name="{{ $item['item_kind']['item_kind'] }}_condition" value="1" checked>AND</label>
            <label><input type="radio" class="radio" name="{{ $item['item_kind']['item_kind'] }}_condition" value="0">OR</label>
        @endif
        <hr>
    @endforeach
    <div class="btn-area">
        <button type="button" name="reset_btn" id="resetBtn">リセット</button>
        <button type="button" name="search_btn" id="searchBtn">検　索</button>
    </div>
        <div class='text-nowrap table-responsive'>
        <table class="table table-striped table-hover table-fixed">
            <thead>
                <tr>
                    <th colspan="7" class="text-center">基本情報</th>
                    <th colspan="6" class="skills text-center">スキル・特性・耐性(衣装盤MAX時)</th>
                </tr>
                <tr>
                    <th>詳細</th>
                    <th>名称</th>
                    <th>属性</th>
                    <th>タイプ</th>
                    <th>レアリティ</th>
                    <th>武器種</th>
                    <th>衣装解放</th>
                    <th class="skills">スキル1</th>
                    <th class="skills">スキル2</th>
                    <th class="skills">アシスト1</th>
                    <th class="skills">アシスト2</th>
                    <th class="skills">特性1</th>
                    <th class="skills">特性2</th>
                </tr>
            </thead>
            <tbody id="searchResult"></tbody>
        </table>
    </div>
@endsection

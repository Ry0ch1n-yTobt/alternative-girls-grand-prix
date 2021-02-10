@extends('layout')
@section('title', 'オルガル2 グランプリDB 検索')
@section('content')
    <h2>検索条件</h2>
    <div>
        @foreach ($items as $item)
            <p>{{ $item['item_kind']['item_caption'] }}</p>
            @foreach ($item['data'] as $data)
                <div>
                    <label><input type="checkbox" name="{{ $item['item_kind']['item_kind'] }}" value="{{ $data->item_number }}">{{ $data->item_name }}</label>
                </div>
            @endforeach
            @if ($item['item_kind']['item_id'] >= 7)
                <label><input type="radio" name="{{ $item['item_kind']['item_kind'] }}_condition" value="1" checked>AND</label>
                <label><input type="radio" name="{{ $item['item_kind']['item_kind'] }}_condition" value="0">OR</label>
            @endif
        @endforeach
    </div>
@endsection

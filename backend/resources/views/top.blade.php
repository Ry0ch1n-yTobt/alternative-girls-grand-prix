@extends('layout')
@section('title', 'TOP')
@section('content')
    <table class="table updateHistorys">
        <thead>
            <th>更新日</th>
            <th>更新内容</th>
        </thead>
        <tbody>
            @foreach ($updateHistorys as $updateHistory)
                <tr>
                    <td>{{ $updateHistory->update_history_date->format('Y/m/d') }}</td>
                    <td>{{ $updateHistory->update_history_details }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <h3>注意事項</h3>
        <a>
            このサイトは、個人により作成、管理、運営されています。<br>
            可能な限り早めの更新を心がけておりますが、更新されない場合はしばらくお待ちいただくかTwitterにてご連絡ください。<br>
            また、確認はしておりますが誤字脱字、不具合等がある場合はお手数ですが、同様に詳細をTwitterにてご報告ください。
        </a>
    </div>
    <a href="https://twitter.com/intent/tweet?screen_name=algr2_GP_DB&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-show-count="false">Tweet to @algr2_GP_DB</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <div>
        <a>
            著作権は、開発元であるQualiArts様にすべて帰属します。<br>
            本サイトは予告なく閉鎖する可能性があります。予めご了承ください。<br>
            本サイトは、Google Chromeによる表示を推奨しております。<br>
            広告が表示される場合がありますが、使用しているサーバーにより表示されているものであり、管理人に利益が発生するものではありません。<br>
            サイトの利用により、損害や不具合等が利用者に対し発生しても、管理人は一切責任を負いかねます。申し訳ありませんが、ご利用は利用者本人の責任でお願いします。
        </a>
    </div>
    <a class="navbar-brand" href="{{ url('/search' )}}">検索画面へ</a>
@endsection

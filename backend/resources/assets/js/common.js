$(function () {
    // リセット
    $('#resetBtn').on('click', function () {
        $('.checkbox').prop('checked', false);
        $('.radio').val([1]);
    });

    // 検索実行
    $('#searchBtn').on('click', function () {
        // $(this).prop('disabled', true);
        // キャラ
        let chars = $('[name=char]:checked').map(function () {
            return $(this).val();
        }).get();
        // 属性
        let attributeTypes = $('[name=attribute]:checked').map(function () {
            return $(this).val();
        }).get();
        // タイプ
        let types = $('[name=type]:checked').map(function () {
            return $(this).val();
        }).get();
        // レアリティ
        let rarities = $('[name=rarity]:checked').map(function () {
            return $(this).val();
        }).get();
        // 武器種
        let weapons = $('[name=weapon]:checked').map(function () {
            return $(this).val();
        }).get();
        // 衣装解放
        let gps = $('[name=gp]:checked').map(function () {
            return $(this).val();
        }).get();
        // スキル
        let skills = $('[name=skill]:checked').map(function () {
            return $(this).val();
        }).get();
        let skillCondition = $('[name=skill_condition]:checked').val();
        // アシスト
        let assists = $('[name=assist]:checked').map(function () {
            return $(this).val();
        }).get();
        let assistCondition = $('[name=assist_condition]:checked').val();
        // 特性
        let characteristics = $('[name=characteristic]:checked').map(function () {
            return $(this).val();
        }).get();
        let characteristicCondition = $('[name=characteristic_condition]:checked').val();

        // バリデーションチェック
        if (skills.length >= 3 && skillCondition == '1') {
            alert('スキルを3つ以上選択、かつ条件をANDには設定できません。\nスキル選択を2つ以下にするかORに変更してください。');
            $(this).prop('disabled', false);
            return false;
        }
        if (assists.length >= 3 && assistCondition == '1') {
            alert('アシストを3つ以上選択、かつ条件をANDには設定できません。\nアシスト選択を2つ以下にするかORに変更してください。');
            $(this).prop('disabled', false);
            return false;
        }
        if (characteristics.length >= 3 && characteristicCondition == '1') {
            alert('特性を3つ以上選択、かつ条件をANDには設定できません。\n特性選択を2つ以下にするかORに変更してください。');
            $(this).prop('disabled', false);
            return false;
        }

        // 検索
        $.ajax({
            type: "GET",
            url: "ajax/search",
            timeout: 1000000,
            data: {
                'chars': chars,
                'attributeTypes': attributeTypes,
                'types': types,
                'rarities': rarities,
                'weapons': weapons,
                'gps': gps,
                'skillKinds': skills,
                'skillCondition': skillCondition,
                'assistKinds': assists,
                'assistCondition': assistCondition,
                'characteristicKinds': characteristics,
                'characteristicCondition': characteristicCondition,
            },
            dataType: "json",
            beforeSend: function () {
                $('#searchResult').html('');
                $('#spinner').removeClass('is-hide');
            }
        }).done(function (json) {
            $(this).prop('disabled', false);
            if (json.result == 'success') {
                $('#searchResult').html(json.view);
            } else {
                alert('検索結果が０件、もしくは多すぎます。\n検索条件を変更して再度検索してください。')
            }
            $('#spinner').addClass('is-hide');
        }).fail(function () {
            alert('通信に失敗しました。');
            $('#spinner').addClass('is-hide');
        });
    });

    // 詳細画面遷移
    $(document).on('click', '.detail', function () {
        let albumNo = $(this).parents('tr').data('album_no');
        window.location.href = '/detail/' + albumNo;
    });

    // 検索画面に戻る
    $('[name=return]').on('click', function () {
        window.location.href = '/search';
    })
});

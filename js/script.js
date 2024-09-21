$(document).ready(function() {
    // 都道府県のオプションを設定
    const prefectures = ["福島県", "千葉県", "愛媛県", "福岡県"];
    const $prefectureSelect = $('select[name="prefecture"]');

    prefectures.forEach(function(prefecture) {
        $prefectureSelect.append('<option value="' + prefecture + '">' + prefecture + '</option>');
    });

    // 都道府県に紐付くエリア名
    const primaryAreas = {
        "福島県": ["中通り", "浜通り", "会津"],
        "千葉県": ["北東部", "北西部", "南部"],
        "愛媛県": ["東予", "中予", "南予"],
        "福岡県": ["福岡地方", "北九州地方", "筑豊地方", "筑後地方"]
    };

    // 都道府県が選択されたときにエリアを更新
    $('select[name="prefecture"]').on('change', function() {
        const selectedPrefecture = $(this).val();
        const $primaryWxAreaSelect = $('select[name="primary_wx_area"]');
        $primaryWxAreaSelect.empty().append('<option value="">--最寄りエリア--</option>');

        if (primaryAreas[selectedPrefecture]) {
            primaryAreas[selectedPrefecture].forEach(function(area) {
                $primaryWxAreaSelect.append('<option value="' + area + '">' + area + '</option>');
            });
        }
    });

    // フォーム送信時の処理
    $('form').on('submit', function(e) {
        e.preventDefault(); // フォームのデフォルト送信を防止

        const data = {
            companyName: $('#CompanyName').val(),
            FCTUnitName: $('#FCT_unit_Name').val(),
            PVGroupCapacity: $('#PVgroup_capacity').val(),
            PCSGroupCapacity: $('#PCSgroup_capacity').val(),
            direction: $('#direction').val(),
            angle: $('#angle').val(),
            conversionEfficiency: $('#conversion_efficiency').val(),
            lossRate: $('#loss_rate').val(),
            prefecture: $prefectureSelect.val(),
            primaryWxArea: $('select[name="primary_wx_area"]').val(),
            timestamp: Date.now()
        };

        // 全ての項目が入力されているか確認
        if (Object.values(data).some(value => !value)) {
            alert("全ての項目を入力してください。");
            return;
        }
        // ここでデータをサーバーに送信したり、処理を行う
        console.log("データが正しく入力されました:", data);
        alert("送信完了！");
        // 実際にはここでフォームを送信する場合は以下の行を追加
        this.submit();
    });    
});

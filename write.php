<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 送信されたPOSTデータを受け取る
$companyName = isset($_POST['CompanyName']) ? $_POST['CompanyName'] : '';
$fctUnitName = isset($_POST['FCT_unit_Name']) ? $_POST['FCT_unit_Name'] : '';
$pvGroupCapacity = isset($_POST['PVgroup_capacity']) ? $_POST['PVgroup_capacity'] : '';
$pcsGroupCapacity = isset($_POST['PCSgroup_capacity']) ? $_POST['PCSgroup_capacity'] : '';
$direction = isset($_POST['direction']) ? $_POST['direction'] : '';
$angle = isset($_POST['angle']) ? $_POST['angle'] : '';
$conversionEfficiency = isset($_POST['conversion_efficiency']) ? $_POST['conversion_efficiency'] : '';
$lossRate = isset($_POST['loss_rate']) ? $_POST['loss_rate'] : '';
$prefecture = isset($_POST['prefecture']) ? $_POST['prefecture'] : '';
$primaryWxArea = isset($_POST['primary_wx_area']) ? $_POST['primary_wx_area'] : '';
$timestamp = date('Y-m-d H:i:s');

// データを1行分の配列にまとめる
$data = [
    $companyName,
    $fctUnitName,
    $pvGroupCapacity,
    $pcsGroupCapacity,
    $direction,
    $angle,
    $conversionEfficiency,
    $lossRate,
    $prefecture,
    $primaryWxArea,
    $timestamp
];

// CSVファイルへの書き込み
$file = fopen('data.csv', 'a');

// CSVファイルが存在しない場合、ヘッダーを追加
if (filesize('data.csv') == 0) {
    $header = ['CompanyName', 'FCTUnitName', 'PVGroupCapacity', 'PCSGroupCapacity', 'Direction', 'Angle', 'ConversionEfficiency', 'LossRate', 'Prefecture', 'PrimaryWxArea', 'Timestamp'];
    fputcsv($file, $header);
}

// データをCSVに書き込む
fputcsv($file, $data);

// ファイルを閉じる
fclose($file);

// ユーザーに成功メッセージを表示（必要に応じてリダイレクトなど）
echo "データが正常に保存されました。";
?>
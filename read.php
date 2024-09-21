<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSVデータの可視化</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #f0f0f0; /* 薄いグレー色 */
            font-weight: bold;
            padding: 8px;
        }

        td {
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* 奇数行に薄い背景色をつける */
        }
    </style>
</head>
<body>
    <h1>PV予測対象一覧</h1>

    <?php
    // CSVファイルのパス
    $file = __DIR__ . '/data.csv';

    // CSVファイルが存在するか確認
    if (!file_exists($file)) {
        echo "<p>CSVファイルが見つかりません。</p>";
        exit;
    }

    // CSVファイルを読み込み
    $csvData = array_map('str_getcsv', file($file));

    if (!empty($csvData)) {
        echo '<table>';
        
        // 0行目（カラムヘッダー）の処理
        echo '<tr>';
        foreach ($csvData[0] as $header) {
            echo '<th>' . htmlspecialchars($header) . '</th>';
        }
        echo '</tr>';

        // 1行目以降のデータを処理
        for ($i = 1; $i < count($csvData); $i++) {
            echo '<tr>';
            foreach ($csvData[$i] as $cell) {
                echo '<td>' . htmlspecialchars($cell) . '</td>';
            }
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "<p>CSVファイルにデータがありません。</p>";
    }
    ?>
</body>
</html>

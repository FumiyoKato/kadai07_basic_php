<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <title>PVFCT-setting-administration</title>
</head>
<body>
    <!-- /// ヘッダー領域 /// -->
    <header>
        <div class="WDS_icon">
            <a href="https://www.weatherdatascience.tokyo/post/2020cfguide" target="_blank" rel="noopener noreferrer">
                <img src="img/WDSlogo.png" alt="WeahterDataScience_logo">
            </a>
        </div>
        <div class="site_thema">
            <h1>太陽光発電出力予測設定&管理ページ</h1>
        </div>
    </header>
    <!-- /// ヘッダー領域 ここまで /// -->

    <!-- /// 事業者単位の予測対象PVスペック登録項目 /// -->
    <main>
        <!-- 事業者（課金主体）単位 -->
        <section class="container">
        <form action="write.php" method="post">

            <!-- 事業者名入力パーツ -->
            <div id="Applicant">  
                <label id="label_CompanyName" for="CompanyName">事業者名</label>
                <input type="text" id="CompanyName" name="CompanyName">
            </div>

            <!-- /// 予測単位の定義領域 /// -->
            <div id="FCT_unit">
                <!-- 予測単位名パーツ -->
                <div class="FCT_unit_Name">
                    <table>
                        <tr>
                            <th><label for="FCT_unit_Name">予測単位名</label></th>
                            <td><input type="text" id="FCT_unit_Name" name="FCT_unit_Name"></td>
                        </tr>
                    </table>
                </div>
                
                <!-- /// 発電所スペック領域 /// -->
                <div class="PVgroup_spec">
                    <div class="PVgroup_wrapper">
                        <table>
                            <tr>
                                <td>設備容量</td>
                                <td>
                                    <div class="input-wrapper">
                                        <input type="number" id="PVgroup_capacity" name="PVgroup_capacity"><span>[kW]</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>パワコン容量</td>
                                <td>
                                    <div class="input-wrapper">
                                        <input type="number" id="PCSgroup_capacity" name="PCSgroup_capacity"><span>[kW]</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="PVgroup_wrapper">
                        <table>
                            <tr>
                                <td>設置方位</td>
                                <td>
                                    <div class="input-wrapper">
                                        <input type="number" id="direction" name="direction"><span>[度]</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>設置角度</td>
                                <td>
                                    <div class="input-wrapper">
                                        <input type="number" id="angle" name="angle"><span>[度]</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="PVgroup_wrapper">
                        <table>
                            <tr>
                                <td>パワコン変換効率</td>
                                <td>
                                    <div class="input-wrapper">
                                        <input type="number" id="conversion_efficiency" name="conversion_efficiency"><span>[%]</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>ロス率</td>
                                <td>
                                    <div class="input-wrapper">
                                        <input type="number" id="loss_rate" name="loss_rate"><span>[%]</span>
                                    </div>
                                </td>
                            </tr>
                        </table>    
                    </div>
                    <div class="PVgroup_wrapper">
                        <table>
                            <tr>
                                <td>気象ポイント</td>
                                <td>
                                    <select name="prefecture">
                                        <option value="">--都道府県--</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <select name="primary_wx_area">
                                        <option value="">--最寄りエリア--</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>  
                </div>
                <!-- /// 発電所スペック領域 ここまで /// -->
            </div>
            <!-- /// 予測単位の定義領域 ここまで /// -->

            <!-- 予測単位追加設定ボタンパーツ -->
            <div class="add_FCT_unit">
                <button id="add_unit_button" onclick="add_FCT_unit()">発電所or発電所群を追加</button>
            </div>

            <!-- PV出力予測サービス申し込みボタンパーツ -->
            <div id="apply">
                <button type="submit", id="apply_button">申し込み</button>
            </div>

            <!-- 設定保存日時表示パーツ -->
            <div id="timestampDisplay"></div>

        </form>
        </section>
            <!-- /// 事業者（課金主体）単位 ここまで /// -->
    </main>
</body>
</html>
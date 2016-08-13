<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="css/semantic.css">
    <style>
        ::selection {
            background-color: #CCE2FF;
            color: rgba(0, 0, 0, 0.87);
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        html {
            font-size: 14px;
            box-sizing: border-box;
        }

        body {
            margin: 0px;
            padding: 0px;
            overflow-x: hidden;
            min-width: 320px;
            background: #FFFFFF;
            font-family: 'Lato', 'Helvetica Neue', Arial, Helvetica, sans-serif;
            font-size: 14px;
            line-height: 1.4285em;
            color: rgba(0, 0, 0, 0.87);
            font-smoothing: antialiased;
        }

        html, body {
            height: 100%;
        }

        img {
            border: 0;
        }

        p {
            font-size: 1.2em;
            margin: 0em 0em 1em;
            line-height: 1.4285em;
        }

        .ui.image {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            max-width: 100%;
            background-color: transparent;
        }

        img.ui.image {
            display: block;
        }

        .ui.centered.image {
            margin-left: auto;
            margin-right: auto;
        }

        .ui.massive.images .image, .ui.massive.images img, .ui.massive.images svg, .ui.massive.image {
            width: 960px;
            height: auto;
            font-size: 1.71428571rem;
        }

        div {
            display: block;
        }

        .ui.center.aligned {
            text-align: center;
        }

        .ui.header:not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) {
            font-size: 1.28em;
        }

        .ui.header {
            border: none;
            margin: calc(2rem - 0.14285em) 0em 1rem;
            padding: 0em 0em;
            font-family: 'Lato', 'Helvetica Neue', Arial, Helvetica, sans-serif;
            font-weight: bold;
            line-height: 1.2857em;
            text-transform: none;
            color: rgba(0, 0, 0, 0.87);
        }

        h2.ui.header {
            font-size: 1.714rem;
        }

        .ui.grid {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
            padding: 0em;
        }

        .ui.grid {
            margin-top: -1rem;
            margin-bottom: -1rem;
            margin-left: -1rem;
            margin-right: -1rem;
        }

        .ui.grid > * {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .ui.grid > .column:not(.row), .ui.grid > .row > .column {
            position: relative;
            display: inline-block;
            width: 6.25%;
            padding-left: 1rem;
            padding-right: 1rem;
            vertical-align: top;
        }

        .ui.grid > .column:not(.row) {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .ui.grid > .row > [class*="ten wide"].column, .ui.grid > .column.row > [class*="ten wide"].column, .ui.grid > [class*="ten wide"].column, .ui.column.grid > [class*="ten wide"].column {
            width: 62.5% !important;
        }

        .ui.grid > .row > [class*="six wide"].column, .ui.grid > .column.row > [class*="six wide"].column, .ui.grid > [class*="six wide"].column, .ui.column.grid > [class*="six wide"].column {
            width: 37.5% !important;
        }

        .border.grid {
            border-top: thin solid;
            margin-top: 10px;
        }

        /* All Sizes */

        .ui.container {
            display: block;
            max-width: 100% !important;
        }

        /* Mobile */

        @media only screen and (max-width: 767px) {
            .ui.container {
                width: auto !important;
                margin-left: 1em !important;
                margin-right: 1em !important;
            }

            .ui.grid.container {
                width: auto !important;
            }

        }

        /* Tablet */

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .ui.container {
                width: 723px;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            .ui.grid.container {
                width: calc(723px + 2rem) !important;
            }
        }

        /* Small Monitor */

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .ui.container {
                width: 933px;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            .ui.grid.container {
                width: calc(933px + 2rem) !important;
            }
        }

        /* Large Monitor */

        @media only screen and (min-width: 1200px) {
            .ui.container {
                width: 1127px;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            .ui.grid.container {
                width: calc(1127px + 2rem) !important;
            }
        }

        .ui.segment {
            position: relative;
            background: #FFFFFF;
            /*box-shadow: 0px 1px 2px 0 rgba(34, 36, 38, 0.15);*/
            margin: 1rem 0em;
            padding: 1em 1em;
            border-radius: 0.28571429rem;
            border-top: 1px solid rgba(34, 36, 38, 0.15);
            font-size: 1rem;
        }
    </style>
</head>
<body>
<div class="ui container">
    <img class="ui massive centered image" src="https://vongola12324.github.io/img/istm/header/istm.png" alt="ISTM">
    <hr class="center aligned"/>
    <div class="ui center aligned header">
        <img src="https://vongola12324.github.io/img/istm/header/special.jpg" alt="Special of this e-Paper"
             style="width: 100%">
        <p style="color: grey; font-size: 0.8em"><i>Special of this e-Paper: Feng Chia University and other
                sister
                university. Photo by: Unknown.</i></p>
    </div>
    <div class="ui border grid">
        <div class="six wide column">
            <img class="ui image" src="https://vongola12324.github.io/img/istm/topics/Section1.jpg"
                 style="min-width: 100%">
        </div>
        <div class="ten wide column">
            <h2 class="ui header" style="margin-top: 10px">國際學院招生捷報！菁英薈萃，招生人數全壘打</h2>
            <p>
                逢甲大學國際學院選擇名列全球百大的國外名校作為合作夥伴，合設「2年逢甲+2年海外名校」的全新留學模式。無論是「美國普渡大學電機資訊工程雙學士學位學程」、「美國聖荷西州立大學商學大數據分析雙學士學位學程」或「澳洲墨爾本皇家理工大學商學與創新雙學士學位學程」，都吸引很多優質高三生報名。經過激烈的競爭後，目前國際學院招生人數全壘打，學生來自台灣優質高中及東南亞地區頂尖高中。<br>
                <a href="http://www.istm.fcu.edu.tw/CH/Events/Detail/26">更多內容</a>
            </p>
        </div>
    </div>

    <div class="ui border grid">
        <div class="ten wide column">
            <h2 class="ui header" style="margin-top: 10px">Study World留遊學巡迴教育展 逢甲大學國際合作專班詢問度高</h2>
            <p>
                228連假期間，本校國際學院參加2016 Study
                World國際留遊學巡迴教育展，於台北、台中、高雄、台南四地與學生家長進行交流，介紹與國外知名大學合作的國際專班，包含電機資訊工程專班（美國普渡大學）、商學大數據分析專班（美國聖荷西州立大學）和商學與創新專班（澳洲皇家墨爾本理工大學）。<br>
                <a href="http://www.istm.fcu.edu.tw/CH/Events/Detail/16">更多內容</a>
            </p>
        </div>
        <div class="six wide column">
            <img class="ui image" src="https://vongola12324.github.io/img/istm/topics/Section2.jpg"
                 style="min-width: 100%">
        </div>
    </div>

    <div class="ui border grid">
        <div class="six wide column">
            <img class="ui image" src="https://vongola12324.github.io/img/istm/topics/Prof.Jesiek.jpg"
                 style="min-width: 100%">
        </div>
        <div class="ten wide column">
            <h2 class="ui header" style="margin-top: 10px">美國普渡大學教授蒞臨本校　舉辦專題式學習及高效能評量研討會</h2>
            <p>
                近年來教育學家發現，以學生為中心的「專題式學習」，相較於傳統上以老師為知識中心的「廣播式教學」，更能啟發學生、讓學生樂於學習。因此本校國際學院與教學資源中心邀請美國普渡大學教授Dr.
                Brent K. Jesiek於5月23日至25日蒞臨本校主持「專題式學習及高效能評量研討會」，透過演講、教學演示、諮詢等活動，讓本校教師踴躍參與。<br>
                <a href="http://www.istm.fcu.edu.tw/CH/Events/Detail/22">更多內容</a>
            </p>
        </div>
    </div>

    <div class="ui border grid">
        <div class="ten wide column">
            <h2 class="ui header" style="margin-top: 10px">皇家墨爾本理工大學（RMIT）報導： 逢甲大學來訪 台澳合作擴展全球參與度</h2>
            <p>
                <strong>RMIT報導</strong>：台灣台中逢甲大學國際科技與管理學院院長的造訪，再度提升RMIT的全球連結度！<br>
                RMIT商學院最近有貴賓來訪──逢甲大學國際學院院長曾明哲教授。首席副校長安德魯·麥金太爾及副校長伊恩·帕爾默誠摯歡迎曾明哲副院長的到來，共同商討兩校合作項目。<br>
                <a href="http://www.istm.fcu.edu.tw/CH/Events/Detail/17">更多內容</a>
            </p>
        </div>
        <div class="six wide column">
            <img class="ui image" src="https://vongola12324.github.io/img/istm/topics/visitRMIT.png"
                 style="min-width: 100%">
        </div>
    </div>

    <div class="ui border grid">
        <div class="six wide column">
            <img class="ui image" src="https://vongola12324.github.io/img/istm/topics/wind.jpg" style="min-width: 100%">
        </div>
        <div class="ten wide column">
            <h2 class="ui header" style="margin-top: 10px">國際學院學生挑戰Real Project　協助德商解決風力發電問題</h2>
            <p>
                國際學院商學與創新雙學士學位學程大一學生於6月22日參訪德商風電能源技術服務有限公司，針對該公司提出的企業問題擬訂策略及解決方案，並向該公司高層主管進行簡報，學生的專業見解及穩健台風大獲好評，德商風電表示，對於本校學生不僅能掌握公司的根本問題，還能提出他們沒有想過的策略與解決方案，感到非常驚訝與讚賞。因此也邀請學生於下學期共同合作，讓在場學生大為振奮。<br>
                <a href="http://www.istm.fcu.edu.tw/CH/Events/Detail/24">更多內容</a>
            </p>
        </div>
    </div>

    <div class="ui border grid">
        <div class="ten wide column">
            <h2 class="ui header" style="margin-top: 10px">國際學院大一新生  玩轉英語high翻天 通往RMIT之路 - 2016 IELTS精進營</h2>
            <p>
                逢甲大學國際學院於1月9-13日，舉辦「通往RMIT之路 - 2016
                IELTS精進營」。學生們連續5天、每日11小時的專注於IELTS測驗練習與講解，非但沒有叫苦連天，反倒激起了學習英文的熱情，寒假期間還主動要求營隊老師繼續輔導英文。<br>
                <a href="http://www.istm.fcu.edu.tw/CH/Events/Detail/14">更多內容</a>
            </p>
        </div>
        <div class="six wide column">
            <img class="ui image" src="https://vongola12324.github.io/img/istm/topics/EnglishCamp.png"
                 style="min-width: 100%">
        </div>
    </div>

    <div class="ui border grid">
        <div class="six wide column">
            <img class="ui image" src="https://vongola12324.github.io/img/istm/topics/CathyChen2.jpg"
                 style="min-width: 100%">
        </div>
        <div class="ten wide column">
            <h2 class="ui header" style="margin-top: 10px">美國聖荷西州立大學商學大數據分析學程主任 陳婉淑榮獲美國統計學會會士</h2>
            <p>
                美國權威的統計學術組織：美國統計學會（American Statistical Association, ASA）主席潔西卡‧烏茲（Jessica
                Utts ）宣布，逢甲大學特聘教授陳婉淑榮獲美國統計學會會士（ASA fellow），她同時也是國際學院「美國聖荷西州立大學商學大數據分析學程」主任。<br>
                <a href="http://www.istm.fcu.edu.tw/CH/Events/Detail/25">更多內容</a>
            </p>
        </div>
    </div>

    <div class="ui border grid">
        <div class="ten wide column">
            <h2 class="ui header" style="margin-top: 10px">美國聖荷西州立大學校友   林德茂副總裁暢談大數據分析</h2>
            <p>
                上海華欽資訊科技股份有限公司林德茂副總裁於3月30日應本校國際學院邀請，進行「成功專案管理的關鍵要素」演講，分享他在美國與大陸奮鬥35年的心路歷程。林副總裁是美國聖荷西州立大學（San
                José State University,
                SJSU）校友，而該校也與本校國際學院合作辦學，開設商學大數據分析雙學士學位學程，因此林副總裁接受國際學院專訪，談論他對矽谷及大數據分析的看法。<br>
                <a href="http://www.istm.fcu.edu.tw/CH/Events/Detail/28">更多內容</a>
            </p>
        </div>
        <div class="six wide column">
            <img class="ui image" src="https://vongola12324.github.io/img/istm/topics/JamesLin.jpg"
                 style="min-width: 100%">
        </div>
    </div>

    <p class="ui center aligned segment" style="border-left: none;border-bottom: none;border-right: none;">
        If you want to get more information or read more, here is our website: <a
            href="http://www.istm.fcu.edu.tw/">http://www.istm.fcu.edu.tw/</a><br>
        Feng Chia University International School of Technology and Management<br>
        逢甲大學國際科技與管理學院<br>
    </p>
</div>
</body>
</html>

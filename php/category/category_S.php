<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>소분류 카테고리 페이지</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/category_S.css">
</head>

<body>
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->

    <?php
        include "../include/header.php";
    ?>
    
    <main id="category_S">
        <section id="banner">
            <div class="banner__inner">
                <figure>
                    <img src="../../html/asset/img/bannerBee.png" alt="마스코트">
                </figure>
                
                <div class="banner__desc">
                    <span class="sub__title">TIPS</span>
                    <h2 class="main__title">전자기기</h2>
                    <p class="banner__info">
                        다양한 정보를 <br>
                        종류별로 모아놨습니다.
                    </p>
                </div>
            </div>
        </section>
        <!-- //banner -->

        <section id="category" class="container">
            <h3>분류별로 꿀팁들을 찾아보세요!</h3>
            <div class="category__inner">
                <div class="categoryIcon">
                    <a href="#">
                        <div class="icon icon1"></div>
                        <h4>수리</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="#">
                        <div class="icon icon2"></div>
                        <h4>가전</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="#">
                        <div class="icon icon3"></div>
                        <h4>휴대폰</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="#">
                        <div class="icon icon4"></div>
                        <h4>관리</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="#">
                        <div class="icon icon5"></div>
                        <h4>기타</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="#">
                        <div class="icon icon6"></div>
                        <h4>드론</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="#">
                        <div class="icon icon7"></div>
                        <h4>컴퓨터</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="#">
                        <div class="icon icon8"></div>
                        <h4>테크</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="#">
                        <div class="icon icon9"></div>
                        <h4>로봇</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="#">
                        <div class="icon icon10"></div>
                        <h4>아이디어</h4>
                    </a>
                </div>
            </div>
        </section>
        <!-- //category -->

        <section id="todayBestTip" class="container">
            <h3>오늘의 '<em>전자기기</em>' 꿀팁 <em>BEST_3</em></h3>
            <div class="list__inner">
                <ul>
                    <li class="gold"><a href="#"><h4>침수된 휴대폰을 쌀통에 담궈두면 살릴 수 있다!?</h4></a></li>
                    <li class="silver"><a href="#"><h4>컴퓨터 수리하는 법 OOO을 하면 된다!</h4></a></li>
                    <li class="bronze"><a href="#"><h4>용산에서 호구당하지 않는 법(feat.업계 종사자)</h4></a></li>
                </ul>
            </div>
        </section>
    </main>
</body>

</html>
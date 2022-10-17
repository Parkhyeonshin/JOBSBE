<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>small_cg</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/small_cg.css">

    <?php 
        include "../include/link.php";
    ?>

</head>

<body>
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->
    

    <main id="main">
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

        <section id="subTitle">
            <nav>
                <ul>
                    <li class="active"><a href="#c">핸드폰</a></li>
                    <li><a href="#c">컴퓨터</a></li>
                    <li><a href="#c">선풍기</a></li>
                    <li><a href="#c">에어컨</a></li>
                </ul>
            </nav>
            <a href="#c" class="prev"><span class="ir">이전</span></a>
            <a href="#c" class="next"><span class="ir">다음</span></a>
        </section>
        <!-- //subTitle -->

        <section id="issue">
            <div class="issue__inner container">
                <h2>🔥 오늘의 인기 글</h2>
                <article class="cont">
<?php
    // 두개의 테이블 join
    $sql = "SELECT b.myTipsID, b.TipsTitle, b.TipsView, b.TipsLike, b.regTime FROM myTips b JOIN myMember m ON (b.myMemberID = m.myMemberID) ORDER BY TipsLike DESC LIMIT 0, 1";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        if($count > 0){
            $info = $result -> fetch_array(MYSQLI_ASSOC);
            echo "<div class = 'issue__title'>";
            echo "<h3>";
            echo "<a href='TipsView.php?myTipsID={$info['myTipsID']}'>".$info['TipsTitle']."</a>";
            echo "</h3>";
            echo "<div class='icon'>";
            echo "<a href='#' class='like'>".$info['TipsLike']."</a>";
            echo "<a href='#' class='view'>".$info['TipsView']."</a>";
            echo "</div>";
            echo "</div>";
            echo "<div class='issue__date'>".date('Y-m-d', $info['regTime'])."</div>";
        } 
        else {
            echo "<div class='issue__title'>게시글 오류입니다. 관리자에게 문의하세요!</div>";
        }
    }
?>
                    <!-- <div class="issue__title">
                        <h3>    
                            <a href="#">스미싱 당한것 같은데 신고해야 되나요? 어쩌고저쩌고</a>
                        </h3>
                        <div class="icon">
                            <a href="#" class="like">10k</span></a>
                            <a href="#" class="view">1.2k</a>
                        </div>
                    </div>

                    <div class="issue__date">
                        2019-02-04
                    </div> -->
                </article>
            </div>
        </section>
        <!-- //issue -->

        <section id="info">
            <div class="info__inner container">
                <h2>🧐 정보 모아보기</h2>

<?php
     if(isset($_GET['page'])){
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }
    $viewNum = 4;
    $viewLimit = ($viewNum * $page) - $viewNum;

    // 두개의 테이블 join
    $sql = "SELECT b.myTipsID, b.TipsTitle, b.TipsView, b.TipsLike, b.regTime FROM myTips b JOIN myMember m ON (b.myMemberID = m.myMemberID) ORDER BY myTipsID DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);
    $info = $result -> fetch_array(MYSQLI_ASSOC);
    if($result){
        $count = $result -> num_rows;
        if($count > 0){
            if(!$info['TipsLike']){
                $info['TipsLike'] = 0;
            }else{};
            for($i =1; $i <= $count; $i++){
                echo "<article class='cont'>";
                echo "<div class='info__title'>";
                echo "<h3>";
                echo "<a href='#'>".$info['TipsTitle']."</a></h3>";
                echo "<div class='icon'>";
                echo "<a href='#' class='like'>".$info['TipsLike']."</a>";
                echo "<a href='#' class='view'>".$info['TipsView']."</a></div>";
                echo "</div>";
                echo "<div class='info__date'>".date('Y-m-d', $info['regTime'])."</div>";
                echo "</article>";
            }
        } 
        else {
            echo "<div class='issue__title'>게시글 오류입니다. 관리자에게 문의하세요!</div>";
        }
    }
?>

<!--                 
                <article class="cont">
                    <div class="info__title">
                        <h3>
                            <a href="#">에어팟 위치 찾기!!</a>
                        </h3>
                        <div class="icon">
                            <a href="#" class="like">10k</span></a>
                            <a href="#" class="view">1.2k</a>
                        </div>
                    </div>

                    <div class="info__date">
                        2019-02-04
                    </div>
                </article> -->
                <!-- //cont1 -->
                <div class="Tips__pages">
                    <ul>
<?php
    $sql = "SELECT count(myTipsID) FROM myTips";
    $result = $connect -> query($sql);
    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(myTipsID)'];
    // 총 페이지 개수
    $boardCount = ceil($boardCount/$viewNum);
    // echo $boardCount;
    // 현재 페이지를 기준으로 보여주고 싶은 개수
    $pageCurrent = 3;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;
    // 처음 페이지 초기화
    if($startPage < 1) $startPage = 1;
    // 마지막 페이지 초기화
    if($endPage >= $boardCount) $endPage = $boardCount;
    // 이전 페이지, 처음 페이지
    if($page != 1){
        $prevPage = $page - 1;
        echo "<li><a href='small_cg.php?page=1'>처음으로</a></li>";
        echo "<li><a href='small_cg.php?page={$prevPage}'>이전</a></li>";
    }
    // 페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";
        echo "<li class='{$active}'><a href='small_cg.php?page={$i}'>{$i}</a></li>";
    }
    // 다음 페이지, 마지막 페이지
    if($page != $endPage){
        $nextPage = $page + 1;
        echo "<li><a href='small_cg.php?page={$nextPage}'>다음</a></li>";
        echo "<li><a href='small_cg.php?page={$boardCount}'>마지막으로</a></li>";
    }
?>
                        <!-- <li><a href="#">처음으로</a></li>
                        <li><a href="#">이전</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">다음</a></li>
                        <li><a href="#">마지막으로</a></li> -->
                    </ul>
                </div>
            </div>


        <aside id="ad">
            <img src="../../html/asset/img/ad01.jpg" alt="멘트문명">
            <img src="../../html/asset/img/ad02.jpg" alt="오렌지쥬스">
        </aside>
        <!-- //ad -->
    </main>
    <!-- //main -->
</body>

</html>
<?php
    include "../connect/connect.php";

    // 변수 설정
    $type = $_POST['type'];
    $youID = $_POST['youID'];
    $youName = $_POST['youName'];

    $sql = "SELECT youName, youID FROM myMember ";
    
    if($type === "emailCheck"){
        $youEmail = $_POST['youEmail'];
        $sql .= "WHERE youID = '$youID' and youName = '$youName' and youEmail = '$youEmail';";
    }
    
    if($type === "phoneCheck") {
        $youPhone = $_POST['youPhone'];
        $sql .= "WHERE youID = '$youID' and youName = '$youName' and youPhone = '$youPhone';";
    }

    $result = $connect -> query($sql);
    $info = $result -> fetch_array(MYSQLI_ASSOC);
    $jsonResult = "bad"; 

    if($result -> num_rows === 1) {
        $jsonResult = "good"."이것은임시비밀번호 입니다.";
    }

    echo json_encode(array("result" => $jsonResult));
?>
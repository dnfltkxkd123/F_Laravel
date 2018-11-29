<?php
$user_id = $_POST['user_id'];
$user_pwd = $_POST['user_pwd'];
echo "id : ".$user_id." / pwd : ".$user_pwd;
echo "/";
//디비연결
//if 아이디로 검색
//있는 아이디의 경우에는 비밀번호 비교
//비밀번호가 맞으면 로그인 허용
//비밀번호가 맞지 않으면 로그인 거부
//없는 아이디는 로그인 거부
if($user_id == "name" && $user_pwd =="pwd"){
    echo "로그인 허용";
}else{
    //로그인 거부
    echo "로그인 거부";
}
?>
<?php
  //require('navigationbar3.php');

  require('tools.php');
  require('memberDao.php');
  session_start();
  $sessionOk = sessionVar('id');
  if($sessionOk){
    $mdao = new MemberDao();
    $member = $mdao -> getMember($sessionOk);
    $img = $member['img'];
    if($img == null){
      $img = "http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png";
    }
  }
  $url = requestValue('url');
  $num = requestValue('num');
  $currentPage = requestValue('page');
  
  loginBack();
 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='css/login.css'>
  <script type="text/javascript" src="js/ajax.js"></script>
</head>
<body onload="request('navi','navigationbar.php')">
<!--<div id='navi'></div>-->
<?php
  require('navigationbar3.php');
?>
  
  <div class="" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="loginmodal-container">
        <h1>로그인 해주세요</h1><br>

        <form action="login" ectype="multipart/form-data" >
          <input type="text" name="url" value="<?=$url?>" placeholder="아이디(ID)" style='display:none'>
          <input  type="text" name="page" value="<?=$currentPage?>" placeholder="아이디(ID)" style='display:none'>
          <input  type="text" name="num" value="<?=$num?>" placeholder="아이디(ID)" style='display:none'>
          <input type="text" name="id" placeholder="아이디(ID)">
          <input type="password" name="pw" placeholder="비밀번호(Password)">
          <input type="submit" name="login" class="login loginmodal-submit" value="로그인">
        </form>
          
        <div class="login-help">
          <a href="register_form.php">회원가입</a> - <a href="#">Forgot Password</a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
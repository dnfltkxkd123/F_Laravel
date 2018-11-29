<?php
  session_start();
  require('tools.php');
  require('memberDao.php');
  $sessionOk = sessionVar('id');
  $thisUrl = 'main_page.php';
  if($sessionOk){
    $mdao = new MemberDao();
    $member = $mdao -> getMember($sessionOk);
    $img = $member['img'];
    if($img == null){
      $img = "http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png";
    }
  }
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" style='cursor:default'>ChanMin PHP</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="main_page.php">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">추천책 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="recommend_board.php?tema=역사">역사</a></li>
              <li><a href="recommend_board.php?tema=백과사전">백과사전</a></li>
              <li><a href="recommend_board.php?tema=철학">철학</a></li>
              <li><a href="recommend_board.php?tema=종교">종교</a></li>
              <li><a href="recommend_board.php?tema=사회과학">사회과학</a></li>
              <li><a href="recommend_board.php?tema=자연과학">자연과학</a></li>
              <li><a href="recommend_board.php?tema=기술과학">기술과학</a></li>
              <li><a href="recommend_board.php?tema=예술">예술</a></li>
              <li><a href="recommend_board.php?tema=어학">어학</a></li>
              <li><a href="recommend_board.php?tema=문학">문학</a></li>
          </ul>
        </li>
        <li><a href="openBoard.php?page=1">자유게시판</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="donate_book.php">도서기부<span class="caret"></span></a>
          <ul class='dropdown-menu'>
            <li><a href="donate_book.php?tema=역사">역사</a></li>
            <li><a href="donate_book.php?tema=백과사전">백과사전</a></li>
            <li><a href="donate_book.php?tema=철학">철학</a></li>
            <li><a href="donate_book.php?tema=종교">종교</a></li>
            <li><a href="donate_book.php?tema=사회과학">사회과학</a></li>
            <li><a href="donate_book.php?tema=자연과학">자연과학</a></li>
            <li><a href="donate_book.php?tema=기술과학">기술과학</a></li>
            <li><a href="donate_book.php?tema=예술">예술</a></li>
            <li><a href="donate_book.php?tema=어학">어학</a></li>
            <li><a href="donate_book.php?tema=문학">문학</a></li>
          </ul>
        </li>
      </ul>
      
      <form action='login.php' method='post' enctype='multipart/form-data'>
        <ul class="nav navbar-nav navbar-right">
        <?php
          if($sessionOk){
            ?>
              <li><a><span class="glyphicon" style='cursor:default'><img class="avatar img-circle" src="<?=$img?>" / style='width:25px;height:25px;'> <?= $_SESSION['nickname']?>님 환영합니다.</span></a></li>
              <li><!--<a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> 로그아웃</a>-->
                <input type='button' class='btn btn-primary btn-md' style='margin-top:8px;margin-left:5px' onclick="location.href='logout.php'" value='로그아웃'>
                <input type='button' class='btn btn-primary btn-md' style='margin-top:8px;margin-left:5px;margin-right:5px;' onclick="location.href='member_update_form.php'" value='회원정보 수정'>
              </li>
            <?php
          }else{
            ?>
            
              <li><input class="form-control mr-sm-2" type="text" placeholder="ID" aria-label="Search" style='margin-top:8px;' name='id'></li>
              <li><input class="form-control mr-sm-2" type="password" placeholder="PASSOWRD" aria-label="Search" style='margin-top:8px;' name='pw'></li>
              <li><!--<a href="login_form.php" id='login'><span class="glyphicon glyphicon-log-in"></span> 로그인</a>-->
                <input type='submit' class='btn btn-primary btn-md' value='로그인' style='margin-top:8px;margin-left:5px'>

                <input type='button' class='btn btn-primary btn-md' value='회원가입' style='margin-top:8px;margin-left:5px;margin-right:5px;' onclick="location.href='register_form.php'" ></li>
              <li><!--<a href="register_form.php"><span class="glyphicon glyphicon-user"></span> 회원가입</a>--></li>
            
            <?php
          }
        ?>
      </ul>
    </form>
    </div>
  </nav>

<?php
/*
  require('tools.php');
  require('memberDao.php');
 // require('recommendDao.php');
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
*/
  $currentPage = isset($currentPage)?$currentPage:'1';
  $num = isset($num)?$num:'1';
  $url = isset($url)?$url:'main_page.php';
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
            <li><a href="recommend_board.php?thema=역사&page=1">역사</a></li>
              <li><a href="recommend_board.php?thema=백과사전&page=1">백과사전</a></li>
              <li><a href="recommend_board.php?thema=철학&page=1">철학</a></li>
              <li><a href="recommend_board.php?thema=종교&page=1">종교</a></li>
              <li><a href="recommend_board.php?thema=사회과학&page=1">사회과학</a></li>
              <li><a href="recommend_board.php?thema=자연과학&page=1">자연과학</a></li>
              <li><a href="recommend_board.php?thema=기술과학&page=1">기술과학</a></li>
              <li><a href="recommend_board.php?thema=예술&page=1">예술</a></li>
              <li><a href="recommend_board.php?thema=어학&page=1">어학</a></li>
              <li><a href="recommend_board.php?thema=문학&page=1">문학</a></li>
          </ul>
        </li>
        <li><a href="openBoard.php?page=1">자유게시판</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="donate_book.php">도서기부<span class="caret"></span></a>
          <ul class='dropdown-menu'>
            <li><a href="donate_book.php?thema=역사&page=1">책받기</a></li>
            <li><a href="donate_book.php?thema=백과사전&page=1">주문한책</a></li>
            <li><a href="donate_book2.php?thema=철학&page=1">주문받은책</a></li>
          </ul>
        </li>
      </ul>
      
      <form action='login.php?url=<?=$url?>&page=<?=$currentPage?>&num=<?=$num?>' method='post' enctype='multipart/form-data'>
        <ul class="nav navbar-nav navbar-right">
        <?php
          if($sessionOk){
            ?>
              <li><a><span class="glyphicon" style='cursor:default'><img class="avatar img-circle" src="<?=$img?>" / style='width:25px;height:25px;'> <?= $_SESSION['nickname']?>님 환영합니다.</span></a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> 로그아웃</a>
                <!--<input type='button' class='btn btn-primary btn-md' style='margin-top:8px;margin-left:5px' onclick="location.href='logout.php'" value='로그아웃'>
                <input type='button' class='btn btn-primary btn-md' style='margin-top:8px;margin-left:5px;margin-right:5px;' onclick="location.href='member_update_form.php'" value='회원정보 수정'>-->
              </li>
              <li><a href="member_update_form.php?url=<?=$url?>&page=<?=$currentPage?>&num=<?=$num?>"><span class="glyphicon glyphicon-user"></span> 회원정보 수정</a></li>
            <?php
          }else{
            ?>
            
              <!--<li><input class="form-control mr-sm-2" type="text" placeholder="ID" aria-label="Search" style='margin-top:8px;' name='id'></li>
                  <li><input class="form-control mr-sm-2" type="password" placeholder="PASSOWRD" aria-label="Search" style='margin-top:8px;' name='pw'></li>-->
              <li>
                <a href="login_form.php?url=<?=$url?>&page=<?=$currentPage?>&num=<?=$num?>" id='login'><span class="glyphicon glyphicon-log-in"></span> 로그인</a>

                <!--<input type='submit' class='btn btn-primary btn-md' value='로그인' style='margin-top:8px;margin-left:5px'>
                    <input type='button' class='btn btn-primary btn-md' value='회원가입' style='margin-top:8px;margin-left:5px;margin-right:5px;' onclick="location.href='register_form.php'" >-->
              </li>
              <li><a href="register_form.php"><span class="glyphicon glyphicon-user"></span> 회원가입</a></li>
            
            <?php
          }
        ?>
      </ul>
    </form>
    </div>
  </nav>
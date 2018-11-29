<?php
  $url='openBoard_page.php';
  session_start();
  require('tools.php');
  require('openBoardDao.php');
  require('commentDao.php');
  require('memberDao.php');
  $sessionOk = sessionVar('id');
  $mdao = new MemberDao();
  if($sessionOk){
    $member = $mdao -> getMember($sessionOk);
    $img = $member['img'];
    if($img == null){
      $img = "http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png";
    }
  }
  define('ONE_PAGE_LIST',5);
  define('PAGE_LINK',5);
  $nickname = sessionVar('nickname');
  $currentPage = requestValue('page');
  /*
  $title = requestValue('title');
  $date = requestValue('date');
  */
  $num = requestValue('num');

  $boardDao = new OpenBoardDao();
  $data = $boardDao -> getBoardData($num);
  $title = $data['title'];
  $date = $data['date'];
  $text = $data['text'];

  $member = $mdao -> getNickname($data['nickname']);
  $memberImg = $member['img'];

  $commentDao = new CommentDao();
  $commentData = $commentDao -> getCommentData($num);
  $commentCount = $commentDao -> commentCount($num);
  

  if($commentCount>=0){
    $pageCount = ceil($commentCount/ONE_PAGE_LIST);
    if($currentPage>$pageCount){
      $currentPage = $pageCount;
    }
    if($currentPage<1){
      $currentPage = 1;
    }
    $start = ($currentPage-1)*ONE_PAGE_LIST;
    $onePageList = $commentDao -> getOnePageList($num,$start,ONE_PAGE_LIST);

    $firstLink = floor(($currentPage-1)/PAGE_LINK)*PAGE_LINK + 1;
    $lastLink =  $firstLink + PAGE_LINK -1;
    if($lastLink > $pageCount){
      $lastLink = $pageCount;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel='stylesheet' href='css/post.css'>
  <link rel='stylesheet' href='css/comment.css'>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/ajax.js"></script>
  <script>
    function check(){
      var yn = confirm('정말 삭제하겠습니까?');
      if(yn){
        location.href='openBaord_delete.php?num=<?=$num?>';
      }
    }
  </script>
</head>
<body onload="request('navi','navigationbar.php')">
<!--<div id='navi'></div>-->
<?php
  require_once('navigationbar3.php');
?>
  <div class='container'>
      <div class="row">
          <div class="panel panel-default widget">
              <div class="panel-heading">
                <strong>제목 : <?=$title?><!--제목--></strong>
                <br><br>
                작성자 : <img src='<?=$memberImg?>' width='25px' height='25px' class='img-circle'> <?=$data['nickname']?><!--작성자 이름--> /날짜 : <?=$date?><!--날짜--> <br>
                조회수<!--조회수/--> <!--댓글--> <?=$data['hit']?>
              </div>
              <div class="panel-body">
                <?php if($nickname == $data['nickname']):?>
                <input type='button' onclick="check()" value='삭제'  method="post" class='btn btn-primary' style='float:right'>
                <input type='button' onclick="location.href='openBoard_register_form.php?url<?=$url?>&form=update&num=<?=$num?>&page=<?=$currentPage?>&title=<?=$title?>'" value='수정'  method="post" class='btn btn-primary' style='float:right;margin-right:5px;'>
                <?php endif?>
                <br>
                <div style='overflow: auto;'><?=$text?></div>
                  
                  <form  action="comment.php"   enctype='multipart/form-data'>
                    <div class=' text margin_top'>
                      <br>
                      <span class="label label-info" style='padding:5px;'>댓글작성</span>
                      <textarea  name="text" wrap="virtual" rows='5' class="msg_text"></textarea>
                      <input name='num' type='text' style='display: none' value='<?=$num?>'>
                      <input name='page' type='text' style='display: none' value='<?=$currentPage?>'>
                      <br>
                      <?php if($nickname):?>
                        <input type='submit' value='등록' class='btn btn-primary'> 
                      <?php endif?>
                      <?php if(!$nickname):?>
                        <input type='submit' value='등록' class='btn btn-primary' onclick="alert('로그인 해주세요');return false;"> 
                      <?php endif?>
                      <input type='button' value='전체글' class='btn btn-primary' onclick="location.href='openBoard.php?page=1'">
                      <br><br>
                    </div>
                </form>

                <div class="row" style='padding:10px;'>
                    <div class="panel panel-default widget">
                      <div class="panel-heading">
                         <span class="glyphicon glyphicon-comment"></span>
                         <br>
                         <h3 class="panel-title">댓글수</h3>
                         <span class="label label-info"><?=$commentCount?></span>
                         <br>
                      </div>

						<div class="container">
							<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
							  <div class="row">
							  <!-- Contenedor Principal -->
							    <div class="comments-container">
							    <ul id="comments-list" class="comments-list">
							      <li>
							        <div class="comment-main-level">
							          <!-- Avatar -->
							          <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
							          <!-- Contenedor del Comentario -->
							          <div class="comment-box">
							            <div class="comment-head">
							              <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
							              <span>hace 20 minutos</span>
							              <i class="fa fa-reply"></i>
							              <i class="fa fa-heart"></i>
							            </div>
							            <div class="comment-content">
							              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
							            </div>
							          </div>
							        </div>
							        <!-- Respuestas de los comentarios -->
							        <ul class="comments-list reply-list">
							          <li>
							            <!-- Avatar -->
							            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
							            <!-- Contenedor del Comentario -->
							            <div class="comment-box">
							              <div class="comment-head">
							                <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
							                <span>hace 10 minutos</span>
							                <i class="fa fa-reply"></i>
							                <i class="fa fa-heart"></i>
							              </div>
							              <div class="comment-content">
							                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
							              </div>
							            </div>
							          </li>

							          <li>
							            <!-- Avatar -->
							            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
							            <!-- Contenedor del Comentario -->
							            <div class="comment-box">
							              <div class="comment-head">
							                <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
							                <span>hace 10 minutos</span>
							                <i class="fa fa-reply"></i>
							                <i class="fa fa-heart"></i>
							              </div>
							              <div class="comment-content">
							                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
							              </div>
							            </div>
							          </li>
							        </ul>
							      </li>

							      <li>
							        <div class="comment-main-level">
							          <!-- Avatar -->
							          <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
							          <!-- Contenedor del Comentario -->
							          <div class="comment-box">
							            <div class="comment-head">
							              <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
							              <span>hace 10 minutos</span>
							              <i class="fa fa-reply"></i>
							              <i class="fa fa-heart"></i>
							            </div>
							            <div class="comment-content">
							              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
							            </div>
							          </div>
							        </div>
							      </li>
							    </ul>
							  </div>
							</div>
						</div>
           
                    </div>
                </div>
              </div> 
          </div>
      </div>
    </div>

</body>
</html>
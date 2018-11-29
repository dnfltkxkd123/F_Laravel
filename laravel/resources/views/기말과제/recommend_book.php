<?php
  $url='recommend_book.php';
  session_start();
  require('tools.php');
  require('recommendDao.php');
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

  $recommendDao = new RecommendDao();
  $data = $recommendDao -> getRecommendData($num);
  $title = $data['title'];
  $date = $data['date'];
  $thema = $data['thema'];
  $bookImg = $data['img'];
  $content = $data['content'];

  $member = $mdao -> getNickname($data['nickname']);
  $memberImg = $member['img'];

  $commentDao = new CommentDao('recommend_comment');
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
<html>
<head>
    <meta charset="UTF-8">
    <title>jQuery Events</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel='stylesheet' href='css/post.css'>
  <link rel='stylesheet' href='css/comment.css'>
  <link rel='stylesheet' href='css/recommend3.css'>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/ajax.js"></script>
</head>
<body> 
  <?php require('navigationbar3.php') ?>
    <div class="box">
        <div class="wrap">
            <ul class="l-row">
                <li class="l-col">
                    <div class="editor">
                        <div class='thema'><span><?=$thema?></span></div>
                        <img src="<?=$bookImg?>" width='148px' height='210px' class="editor-icon"/>
                        <div class='editor-text'>
                            <h2><?=$title?></h2>
                            <writer><p>작성자: <img src='<?=$memberImg?>' width='25px' height='25px' class='img-circle'><?=$data['nickname'];?></p></writer>
                            <time><p>추천일:<?=$date?></p></time>
                            <p><?=$content?>
                            </p>
                        </div>
                        
                    </div>
                    <form  action="comment.php"   enctype='multipart/form-data' method='post'>
                            <div class='text-box'>
                              <br>
                              <span class="label label-info" style='padding:5px;'>댓글작성</span>
                              <textarea  name="text" wrap="virtual" rows='5' style='width:100%'></textarea>
                              <input name='num' type='text' style='display: none' value='<?=$num?>'>
                              <input name='table' type='text' style='display: none' value='recommend_comment'>
                              <input name='page' type='text' style='display: none' value='<?=$currentPage?>'>
                              <input name='url' type='text' style='display: none' value='<?=$url?>'>
                              <br>
                              <?php if($nickname):?>
                                <input type='submit' value='등록' class='btn btn-primary'> 
                              <?php endif?>
                              <?php if(!$nickname):?>
                                <input type='submit' value='등록' class='btn btn-primary' onclick="alert('로그인 해주세요');return false;"> 
                              <?php endif?>
                              <input type='button' value='전체글' class='btn btn-primary' onclick="location.href='recommend_board.php?page=1&thema=<?=$thema?>'">
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
                      <div class="panel-body">
                        <ul class="list-group">
                          <?php foreach($onePageList as $comment):?>
                            <li  class="list-group-item" style='border-color:rgba(0,0,0,0);'>
                              <article class="row" >
                                <div class="col-md-2 col-sm-2" style='width:150px;height:150px;' ><!-- hidden-xs-->
                                 <figure class="thumbnail" style='border-color:rgba(0,0,0,0);'> 
                                   <?php 
                                      $commentMember = $mdao -> getNickname($comment['nickname']);
                                      $commentImg = $commentMember['img'];
                                      if($commentImg == null){
                                        $commentImg ='http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png';
                                      }
                                      if($comment['nickname'] == $nickname){
                                        $commentNickname = '나';
                                        $style = "style='color:red;'";
                                      }else{
                                        $commentNickname = $comment['nickname'];
                                        $style = '';
                                      }
                                    ?>
                                    <img class="img-responsive avatar img-circle" src="<?=$commentImg?>" style='width:100px;height:100px;'/>
                                    <figcaption class="text-center" <?=$style?>><?=$commentNickname?></figcaption>
                                  </figure>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                  <div class="panel panel-default arrow left">
                                    <div class="panel-body">
                                      <header class="text-left">
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> <?=$comment['date']?></time>
                                      </header>
                                      <div class="comment-post" style='overflow:auto;'>
                                        <br>
                                        <p><?=$comment['text']?></p>
                                        <?php if($nickname == $comment['nickname']):?>
                                          <div class="action">
                                            <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                              <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-xs" title="Delete" onclick="location.href = 'deleteComment.php?count=<?=$comment['count']?>&table=recommend_comment'">
                                              <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                          </div>
                                        <?php endif?>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                               </article>
                              </li>
                              <?php endforeach ?>
                                <br>
                                <div style='text-align:center;'>
                                  <?php if($currentPage > PAGE_LINK ):?>
                                    <a href='openBoard_page.php?num=<?=$num?>&page=<?=$currentPage-5?>'>< </a>
                                  <?php endif?>

                                  <?php for($i=$firstLink ; $i<=$lastLink ; $i++): ?>
                                    <a href='openBoard_page.php?num=<?=$num?>&page=<?=$i?>'><?= $i ?> </a>
                                  <?php endfor?>

                                  <?php if($lastLink != $pageCount):?>
                                    <a href='openBoard_page.php?num=<?=$num?>&page=<?=$currentPage+5?>'>> </a>
                                  <?php endif?>

                                </div>
                            </ul>
                          </div> 
                        </div>
                      </div>
                </li>
                
            </ul>
        </div>
    
                
</body>
</html>
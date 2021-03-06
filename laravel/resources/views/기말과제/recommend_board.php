<?php
  $url='recommendBoard';
  require('tools.php');
  require('memberDao.php');
  require('recommendDao.php');
  $thema = requestValue('thema');
  $url = 'recommend_board';
  session_start();
  $currentPage = requestValue('page');
  $sessionOk = sessionVar('id');
  if($sessionOk){
    $mdao = new MemberDao();
    $member = $mdao -> getMember($sessionOk);
    $img = $member['img'];
    if($img == null){
      $img = "http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png";
    }
  }
  define('ONE_PAGE_LIST',10);
  define('PAGE_LINK',5);
  
  $loginOk = isset($_SESSION['id']);//sessionVar('id');

  
  $recommendDao = new RecommendDao();
  $currentPage = requestValue('page');
  //echo $currentPage;
  $listCount = $recommendDao -> getListCount($thema);

  if($listCount >= 0){
    $pageCount = ceil($listCount/ONE_PAGE_LIST);
    if($currentPage > $pageCount){
      $currentPage = $pageCount;
    }
    if($currentPage < 1){
      $currentPage = 1;
    }
    $start = ($currentPage-1)*ONE_PAGE_LIST;
    $onePageList = $recommendDao -> getOnePageList($thema,$start,ONE_PAGE_LIST);
    //$onePageList = isset($onePageList)?$onePageList:'';
    $firstLink = floor(($currentPage-1)/PAGE_LINK)*PAGE_LINK+1;
    $lastLink = $firstLink + PAGE_LINK -1;

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='css/recommend2.css'>
  <script type="text/javascript" src="js/ajax.js"></script>
  <script>
      function loginCheck(check){
        if(check){
            location.href='recommend_form?page=<?=$currentPage?>&go=recommend_insert';
        }else{
            alert('로그인 해주세요!!');
        }
      }
  </script>
</head>
<body onload="request('navi','navigationbar.php')">
<!--<div id='navi'></div>-->
<?php
  require('navigationbar3.php');
?>
  <button id="myShowHidebtn" class="btn btn-primary" onclick="loginCheck(<?=$loginOk?>)" style='position:fixed;float:right;margin-right:10px;'>책추천 하기</button>
<div class="box">
        <h1 class='header'><?=$thema?> 추천</h1>

        <div class="wrap">
            <ul class="l-row">
                
                <?php foreach($onePageList as $row): ?>
                <li class="l-col">
                    <div class="editor">
                        <div class='thema'><span><?=$thema?> 추천</span></div>
                        <img src="<?=$row['img']?>" width='148px' height='210px' class="editor-icon"/>
                        <div class='editor-text'>
                            <h2><a href='recommendBook?num=<?=$row['num']?>&thema=<?=$row['thema']?>'><?=$row['title']?></a></h2>
                            <time><p>추천일:<?=$row['date']?></p></time>
                            <p><a href='recommendBook.php?num=<?=$row['num']?>'><?=$row['content']?></a></p>
                        </div>
                    </div>
                </li>
                <?php endforeach ?>
                <li class="l-col">
                    <div class="editor">
                        <div class='thema'><span><?=$thema?> 추천</span></div>
                        <img src="images/1701281_recommend_어전쟁책3d모델링.jpg" width='148px' height='210px' class="editor-icon"/>
                        <div class='editor-text'>
                            <h2><a href='recommendBook.php?page=<?=$currentPage?>'>제목</a></h2>
                            <time><p>추천일:2018-10-21</p></time>
                            <p><a href='recommendBook.php?page=<?=$currentPage?>'>Atom 1.27 brings numerous improvements to your Git and GitHub workflows, including support for multiple co-authors, separate amend and undo, a quicker way to open a pull request on github.com, as well as pulling and pushing directly from the status bar. Update today for a richer</a></p>
                        </div>
                    </div>
                </li>
                
            </ul>
                <?php if($currentPage>PAGE_LINK): ?>
                  <a href='?page=<?=$currentPage-5?>'><</a>
                <?php endif?>
                <?php for($i=$firstLink ; $i<=$lastLink ; $i++):?>
                  <a href='?page=<?=$i?>'><?=$i?></a>
                <?php endfor?>
                <?php if($lastLink != $pageCount): ?>
                  <a href='?page=<?=$currentPage+5?>'>></a>
                <?php endif?>
        </div>
    </div>
  
</body>
</html>
<?php
  session_start();
  require('tools.php');
  require('commentDao.php');
  $nickname = sessionVar('nickname');
  //$url = requestValue('url');
  //$page = requestValue('page');
  $num = requestValue('num');
  $text = requestValue('text');
  $text = nl2br($text);
  $table = requestValue('table');
  $commentDao = new CommentDao($table);
  //$commentDao -> insertComment($num,$nickname,$text);
  $commentDao -> insertComment($num,$nickname,$text);
  loginOk();
  //$url = bdUrl($url,$num,$page);
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Document</title>
  </head>
  <body>
    <script>
      //location.href = '<?=$url?>'
      history.back();
    </script>
  </body>
  </html>
  <?php
  //loginOk();
?>
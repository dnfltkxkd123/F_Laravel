<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OpenBoard;
class OpenBoardController extends Controller
{
    //
    public function insertData(){
    	session_start();
		require('tool.php');
		$nickname = $_SESSION['nickname'];
		$title = requestValue('title');
		$text = requestValue('text');
		$currnetPage = requestValue('page');
		OpenBoard::insertData($title,$nickname,$text);
		okGo('작성한 글이 성공적으로 등록 됬습니다.','openBoard?page='.$currnetPage);
    }

    public function updateData(){
    	session_start();
		require('tool.php');
		$title = requestValue('title');
		$nickname = $_SESSION['nickname'];
		$text = requestValue('text');
		$num = requestValue('num');
		$currentPage = requestValue('page');
		OpenBoard::updateData($num,$title,$text);
		okGo('작성한 글이 성공적으로 등록 됬습니다.','openBoard_page?page='.$currentPage.'&num='.$num);
    }

    public function deleteData(){
    	require('tool.php');
		$num = requestValue('num');
		OpenBoard::deleteData($num);
		okGo('작성한 글이 성공적으로 삭제 되었습니다.','openBoard?page=1');
	    }
}

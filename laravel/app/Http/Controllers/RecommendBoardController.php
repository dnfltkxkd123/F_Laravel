<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecommendBoard;

class RecommendBoardController extends Controller
{
    public function insertData(Request $request){
    	session_start();
		require('tool.php');
		$nickname = sessionVar('nickname');
		$id = sessionVar('id');
		$page = $request-> input('page');
		$title = $request->input('title');
		$thema = $request->input('thema');
		$content = $request->input('content');
		$content = nl2br($content);
		if($nickname &&$title && $thema && $content){
			
			if($request->hasFile('file')){
				
				$img = $request->file('file')->getClientOriginalName();
				$img = $id.'_recommend_'.$img;
				if(file_exists('images/'.$img)){
					$img ='p'.$img;
				}
				
				$tmp = 'images/'.$img;
				?>
				
				<script type="text/javascript">
					//alert('<?=$img ?>');
				</script>
				<?php
				$request -> file('file') -> move('images',$img);
				RecommendBoard::insertData($nickname,$title,$tmp,$thema,$content);
			}else{
				
				$img = 'http://placehold.it/148x210';

				RecommendBoard::insertData($nickname,$title,$img,$thema,$content);
				
			}
			
			okGo('등록완료!','recommendBoard?thema='.$thema.'&page='.$page);
			
		}else{
			?>
			<script type="text/javascript">
				alert('빈칸을 모두 넣어 주세요');
			</script>
			<?php
			
		}
    }

    public function updateData(Request $request){
    	session_start();
		require('tool.php');
		$nickname = sessionVar('nickname');
		$id = sessionVar('id');
		$page = $request-> input('page');
		$title = $request->input('title');
		$num = $request-> input('num');
		$thema = $request->input('thema');
		$content = $request->input('content');
		$content = nl2br($content);
		if($nickname &&$title && $thema && $content){
			
			if($request->hasFile('file')){
				
				$img = $request->file('file')->getClientOriginalName();
				$img = $id.'_recommend_update_'.$num.'_'.$img;
				if(file_exists('images/'.$img)){
					$img ='p'.$img;
				}
				
				$tmp = 'images/'.$img;
				?>
				
				<script type="text/javascript">
					//alert('<?=$img ?>');
				</script>
				<?php
				$request -> file('file') -> move('images',$img);
				RecommendBoard::updateData($num,$title,$tmp,$thema,$content);
			}else{
				$data = RecommendBoard::getData($num);
				$img = $data[0]->img;

				RecommendBoard::updateData($num,$title,$img,$thema,$content);
				
			}
			
			okGo('등록완료!','recommendBook?num='.$num.'&page='.$page);
			
		}else{
			?>
			<script type="text/javascript">
				alert('빈칸을 모두 넣어 주세요');
			</script>
			<?php
			
		}
    }

    public function deleteData(Request $request){
    	$num = $request-> input('num');
    	$thema = $request-> input('thema');
    	RecommendBoard::deleteData($num);
    	?>
				
				<script type="text/javascript">
					alert('삭제완료');
					location.href = 'recommendBoard?thema=<?=$thema?>';
				</script>
				<?php
    }
}

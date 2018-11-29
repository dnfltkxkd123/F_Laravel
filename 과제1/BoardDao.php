<!--게시판 DAO-->
<?php
	class BoardDao{
		private $db;//데이터 베이스의 정보를 담을 변수

		//BoardDao의 생성자
		public function __construct(){
			try{
				$this -> db = new PDO("mysql:host=localhost;dbname=php3","root","");//데이터 베이스이 정로를 불러옴
				$this -> db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$this -> db -> exec("set names utf8");//한글이 깨지지 않게 함
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}

		//게시판의 전체 글수 (전체 레코드 수)반환
		public function getDataCount(){
			try{
				$ps = $this -> db -> prepare("select count(*) from board");//쿼리 값을 설정
				$ps -> execute();//쿼리 실행
				$result = $ps -> fetchColumn();//칼럼의 값을 불러옴
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
			return $result;//결과값을 $result로 반환
		}

		//$num번 게시글의 데이터 반환
		public function getData($num){
			try{
				$ps = $this -> db -> prepare("select*from board where num = :num");//쿼리 값을 설정
				$ps -> bindValue(":num",$num,PDO::PARAM_INT);//쿼리의:num을 $num으로 바꿈
				$ps -> execute();//쿼리 실행
				$result = $ps->fetch(PDO::FETCH_ASSOC);//bd에서 얻은 정보를 연관 배열로 설정
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
			return $result;//결과값을 $result로 반환
		}

		//$start번부터 $row개의 게시글 데이터 반환(2차원 배열)
		public function getOnePageList($start,$rows){
			try{
				$ps = $this -> db -> prepare("select*from board order by num desc limit :start,:rows");//쿼리 값을 설정
				$ps -> bindValue(":start",$start,PDO::PARAM_INT);//쿼리의:start을 $start으로 바꿈
				$ps -> bindValue(":rows",$rows,PDO::PARAM_INT);//쿼리의:rows을 $rows으로 바꿈
				$ps -> execute();//쿼리 실행
				$result = $ps -> fetchAll(PDO::FETCH_ASSOC);//bd에서 얻은 정보를 연관 배열로 설정
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
			return $result;//결과값을 $result로 반환
		}

		//새글을 DB에 추가
		public function insertData($writer,$title,$content,$id){
			try{
				$ps = $this -> db -> prepare("insert into board(writer,title,content,regtime,hits,id) value(:writer,:title,:content,now(),0,:id)");//쿼리 값을 설정
				$ps -> bindValue(":writer",$writer,PDO::PARAM_STR);//쿼리의:writer을 $writer으로 바꿈
				$ps -> bindValue(":title",$title,PDO::PARAM_STR);//쿼리의:title을 $title으로 바꿈
				$ps -> bindValue(":content",$content,PDO::PARAM_STR);//쿼리의:content을 $content으로 바꿈
				$ps -> bindValue(":id",$id,PDO::PARAM_STR);//쿼리의:id을 $id으로 바꿈
				$ps -> execute();//쿼리 실행
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}

		//$num번 개시글 업데이트
		public function updateData($num,$writer,$title,$content){
			try{
				$ps = $this -> db -> prepare("update board set writer=:writer, title=:title, content=:content, regtime=now() where num=:num");//쿼리 값을 설정
				$ps -> bindValue(":writer",$writer,PDO::PARAM_STR);//쿼리의:writer을 $writer으로 바꿈
				$ps -> bindValue(":title",$title,PDO::PARAM_STR);//쿼리의:title을 $title으로 바꿈
				$ps -> bindValue(":content",$content,PDO::PARAM_STR);//쿼리의:content을 $content으로 바꿈
				$ps -> bindValue(":num",$num,PDO::PARAM_INT);//쿼리의:num을 $num으로 바꿈
				$ps -> execute();//쿼리 실행
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}

		//$num번 게시글 삭제
		public function deleteData($num){
			try{
				$ps = $this -> db -> prepare("delete from board where num=:num");//쿼리 값을 설정
				$ps -> bindValue(":num",$num,PDO::PARAM_INT);//쿼리의:num을 $num으로 바꿈
				$ps -> execute();//쿼리 실행

			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}
		//$num 게시글 조회수 증가
		public function increaseHits($num){
			try{
				$ps = $this -> db -> prepare("update board set hits = hits+1 where num=:num");//쿼리 값을 설정
				$ps -> bindValue(":num",$num,PDO::PARAM_INT);//쿼리의:num을 $num으로 바꿈
				$ps -> execute();//쿼리 실행
			}catch(PDOExeption $e){
				exit($e -> getMessage());
			}
		}
	}
?>
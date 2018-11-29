<!--회원등록 DAO-->
<?php
	class MemberDao{
		private $db;//데이터 베이스의 정보를 담을 변수

		//BoardDao의 생성자
		public function __construct(){
			try{
				$this -> db = new PDO("mysql:host=localhost;dbname=php3","root","");//데이터 베이스이 정로를 불러옴
				$this -> db -> exec("set names utf8");//한글이 깨지지 않게 함
				$this -> db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}

		//회원정보를 등록
		public function insertMember($id , $pw ,$name){
			try{
				$ps = $this -> db -> prepare("insert into member value(:id,:pw,:name)");//쿼리 값을 설정
				$ps -> bindValue(":id",$id,PDO::PARAM_STR);//쿼리의:id 를$id으로 바꿈
				$ps -> bindValue(":pw",$pw,PDO::PARAM_STR);//쿼리의:pw 를$pw으로 바꿈
				$ps -> bindValue(":name",$name,PDO::PARAM_STR);//쿼리의:name을 $name으로 바꿈
				$ps -> execute();//쿼리 실행
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}

		public function getMember($id){
			try{
				$ps = $this -> db -> prepare("select*from member where id=:id");//쿼리 값을 설정
				$ps -> bindValue(":id",$id,PDO::PARAM_STR);//쿼리의:id 를$id으로 바꿈
				$ps -> execute();//쿼리 실행
				$result = $ps -> fetch(PDO::FETCH_ASSOC);//bd에서 얻은 정보를 연관 배열로 설정
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
			return $result;//결과값을 $result로 반환
		}

		public function updateMember($id , $pw ,$name){
			try{
				$ps = $this -> db -> prepare("update member set pw=:pw , name=:name where id=:id");//쿼리의:id 를$id으로 바꿈
				$ps -> bindValue(":id",$id,PDO::PARAM_STR);//쿼리의:id 를$id으로 바꿈
				$ps -> bindValue(":pw",$pw,PDO::PARAM_STR);;//쿼리의:pw 를$pw으로 바꿈
				$ps -> bindValue(":name",$name,PDO::PARAM_STR);//쿼리의:name을 $name으로 바꿈
				$ps -> execute();//쿼리 실행
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}
	}
?>
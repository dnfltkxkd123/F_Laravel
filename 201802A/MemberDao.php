<?php
	class MemberDao{
		private $db;
		public function __construct(){
			try{
				$this -> db = new PDO("mysql:host=localhost;dbname=php","root","");
				$this -> db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$this -> db -> exec("set names utf8");
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
			
		}

		public function getMember($id){
			try{
				$sql = "select*from member where id=:id";
				$ps = $this -> db -> prepare($sql);
				$ps -> bindValue(":id",$id,PDO::PARAM_STR);
				$ps -> execute();
				$result = $ps -> fetch(PDO::FETCH_ASSOC);
			return $result;
			}catch(PDOExeption $e){
				exit($e->getMessage());
			}
			
		}

		public function insertMember($id,$pw,$name){
			try{
				$sql = "insert into member value(:id,:pw,:name)";
				$ps = $this -> db -> prepare($sql);
				$ps -> bindValue(":id",$id,PDO::PARAM_STR);
				$ps -> bindValue(":pw",$pw,PDO::PARAM_STR);
				$ps -> bindValue(":name",$name,PDO::PARAM_STR);
				$ps -> execute();
			}catch(PDOExeption $e){
				exit($e -> getMessage());
			}
			
		}

		public function updateMember($id,$pw,$name){
			try{
				$ps = $this -> db -> prepare("update member set pw=:pw , name=:name where id=:id");
				$ps -> bindValue(":id",$id,PDO::PARAM_STR);
				$ps -> bindValue(":name",$name,PDO::PARAM_STR);
				$ps -> bindValue(":pw",$pw,PDO::PARAM_STR);
				$ps -> execute();
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}

		
	}

	
?>
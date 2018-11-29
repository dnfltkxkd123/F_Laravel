<?php
	class Dao{
		private $db;

		public function __construct(){
			try{
				$this -> db = new PDO("mysql:host=localhost;dbname=php2","root","");
				$this -> db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$this -> db -> exec("set names utf8");
			}catch(PDOException $e){
				$e -> getMessage();
			}
		}

		public function getList($sort , $dir){
			try{
				$sql = "select*from webhard order by $sort $dir";
				$ps = $this-> db -> prepare($sql);
				$ps -> execute();
				$result = $ps -> fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}catch(PDOException $e){
				$e -> getMessage();
			}
		}

		public function add($name , $time , $size){
			try{
				$sql = "insert into webhard(fname,ftime,fsize) values(:name,:time,:size);";
				$ps = $this->db -> prepare($sql);
				$ps -> bindValue(":name",$name,PDO::PARAM_STR);
				$ps -> bindValue(":time",$time,PDO::PARAM_STR);
				$ps -> bindValue(":size",$size,PDO::PARAM_STR);
				$ps -> execute();
				$result = $ps -> fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}catch(PDOException $e){
				$e -> getMessage();
			}
			
		}

		public function delete($num){
			try{
				$sql = "select fname from webhard where num = :num";
				$prepare = $this->db->prepare($sql);
				$prepare -> bindValue(":num",$num,PDO::PARAM_INT);
				$prepare->execute();
				
				$result = $prepare -> fetchColumn();

				$sql = "delete from webhard where num = $num";
				$this -> db -> exec($sql);
				return $result;
			}catch(PDOException $e){
				$e -> getMessage();
			}
		}
	}
?>
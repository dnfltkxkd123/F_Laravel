<?php
	Class Dao{
		private $db;
		public function __construct(){
			try{
				$this -> db = new PDO("mysql:host=localhost;dbname=php2","root","");
				$this -> db ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$this -> db -> exec("set names utf8");
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}

		public function getList($sort,$dir){
			try{
				$sql = "select*from webhard order by $sort $dir";
				$prepare = $this->db->prepare($sql);
				$prepare->execute();
				$result = $prepare -> fetchAll(PDO::FETCH_ASSOC);
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
			return $result;
		}

		public function add($name,$time,$size){
			try{
				if($time == null){
					$time = date("Y-m-d H:i:s");
				}
				$sql = "insert into webhard(fname,ftime,fsize) values(:name,:time,:size);";
				$prepare = $this->db->prepare($sql);
				$prepare -> bindValue(":name",$name,PDO::PARAM_STR);
				$prepare -> bindValue(":time",$time,PDO::PARAM_STR);
				$prepare -> bindValue(":size",$size,PDO::PARAM_INT);
				$prepare->execute();
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}

		public function delete($num){
			try{
                $sql = "select fname from webhard where num = :num";
				$prepare = $this->db->prepare($sql);
				$prepare -> bindValue(":num",$num,PDO::PARAM_INT);
				$prepare->execute();

				$result = $prepare -> fetchColumn();

				$sql = "delete from webhard where num = :num ";
				$prepare = $this->db->prepare($sql);
				$prepare -> bindValue(":num",$num,PDO::PARAM_INT);
				$prepare->execute();
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
			return $result;
		}
	}
?>
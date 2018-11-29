<?php
	class Dao{
		private $db;
		public function __construct(){
			try{
				$this -> db = new PDO("mysql:host=localhost;dbname=php","root","");
				$this -> db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$this -> db -> exec("set names utf8");
				//deleteText();
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}

		public function insertText($text){
			try{
				$sql = "insert into nse_tb(content) values (:text)";
				$ps = $this -> db -> prepare($sql);
				$ps -> bindValue(":text",$text,PDO::PARAM_STR);
				//$ps -> execute();
				
				if($ps -> execute()){
					
				}else{
					echo "실패";
				}

			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}

		public function getText($text){
			header("Location: show.php?text=$text");
		}

		public function deleteText(){
			try{
				$sql = "delete from nse_tb;";
				$this -> db -> exec($sql);
			}catch(PDOException $e){
				exit($e -> getMessage());
			}
		}
	}
	
	
?>
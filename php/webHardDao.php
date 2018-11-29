<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		class WebHardDao{
			private $db;//PDO객체저장 프로퍼티
			//db에 접속하고 PDO객체를 $db에 저장
			public function __construct(){
				try{
					$this -> db = new PDO("mysql:host=localhost;dbname=php2","root","");
					$this -> db ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					$this -> db -> exec("set names utf8");
				}catch(PDOException $e){
					exit($e -> getMessage());
				}
			}
			//모든 업로드된 파일 정보 반환 (2차원 배열)
			//$sort 필드 기준으로 정렬 ,$dir는 정렬 방향(asc/desc)
			public function getFileList($sort , $dir){
				try{
					$this -> db -> exec("set names utf8");
					$sql = "select*from webhard order by $sort $dir";
					$pstmt = $this -> db->prepare($sql);
					$pstmt -> execute();
					$result = $pstmt -> fetchAll(PDO::FETCH_ASSOC);
				}catch(PDOException $e){
					exit($e -> getMessage());
				}
				return $result;
			}

			//새파일을 db에 추가
			public function addFileInfo($name,$time,$size){
				try{
					$this -> db -> exec("set names utf8");
					$sql = "insert into webhard(fname,ftime,fsize) values(
							:name,:time,:size);";
					$pstmt = $this ->db->prepare($sql);
					$pstmt -> bindValue(":name",$name,PDO::PARAM_STR);
					$pstmt -> bindValue(":time",$time,PDO::PARAM_STR);
					$pstmt -> bindValue(":size",$size,PDO::PARAM_INT);
					$pstmt -> execute();
				}catch(PDOException $e){
					exit($e -> getMessage());
				}
			}

			//$num번 파일 정보를 db에서 삭제하고 그 파일명을 반환
			public function deleteFileInfo($num){
				try {
					$this -> db -> exec("set names utf8");
					$sql = "select fname from webhard where num=:num";
					$pstmt = $this->db->prepare($sql);
					$pstmt->bindValue(":num", $num, PDO::PARAM_INT);
					$pstmt->execute();

					$result = $pstmt->fetchColumn();
	 
					$sql = "delete from webhard where num=:num";
					$pstmt = $this->db->prepare($sql);
					$pstmt->bindValue(":num", $num, PDO::PARAM_INT);
					$pstmt->execute();				
				}catch(PDOException $e) {
					exit($e->getMessage());
				}
					return $result;
			}
		}
	?>
</body>
</html>
1701281최찬민
<?php
		/*2번
		try{
			$db = new PDO('mysql:host=localhost;dbname=test','root','');
			$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$db -> exec('set names utf8');
			$db -> exec("create table member1701281 (
						 sn char(7) primary key,
						 name varchar(32),
						 password varchar(32),
						 birthYear int,
						 gender char(1),
						 syear int,
						 role char(1) default 'N'
						 );");
			$db -> exec(" insert into member1701281 values('1701281',
						'chanmin', '1111', 1994, 'M', 2, 'N')");
		}catch(PDOException $e){
			exit($e -> getMessage());
		}
		*/

		/*3~4번*/
		Class Member{
			private $db;
			function __construct(){
				try{
					$this -> db = new PDO('mysql:host=localhost;dbname=test','root','');
					$this -> db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					$this -> db ->  exec('set names utf8');
				}catch(PDOException $e){
					exit($e -> getMessage());
				}
			}

			function insertMember($sn,$name,$password,$birthYear,$gender,$syear){
				try{
					$ps = $this -> db -> prepare('insert into member1701281(sn,name,password,birthYear,gender,syear) value(:sn,:name,:password,:birthYear,:gender,:syear)');
					$ps -> bindValue(':sn',$sn,PDO::PARAM_STR);
					$ps -> bindValue(':name',$name,PDO::PARAM_STR);
					$ps -> bindValue(':password',$password,PDO::PARAM_STR);
					$ps -> bindValue(':birthYear',$birthYear,PDO::PARAM_INT);
					$ps -> bindValue(':gender',$gender,PDO::PARAM_STR);
					$ps -> bindValue(':syear',$syear,PDO::PARAM_STR);
					$ps -> execute();
					
				}catch(PDOException $e){
					exit($e -> getMessage());
				}
				
			}

			function getMember($sn){
				try{
					$ps = $this -> db -> prepare('select*from member1701281 where sn=:sn');
					$ps -> bindValue(':sn',$sn,PDO::PARAM_STR);
					$ps -> execute();
					$rs = $ps-> fetch(PDO::FETCH_ASSOC);
				}catch(PDOException $e){
					exit($e -> getMessage());
				}
				return $rs;
			}

			function getAllMember(){
				try{
					$ps = $this -> db -> prepare('select*from member1701281');
					$ps -> execute();
					$rs = $ps-> fetchAll(PDO::FETCH_ASSOC);
				}catch(PDOException $e){
					exit($e -> getMessage());
				}
				return $rs;
			}


		}



?>
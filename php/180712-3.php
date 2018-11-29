<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		class Person{
			/*public*/private $name, $addr,$phone,$age;



			public function setAge($age){
				if($a > 0 && $a<115){
					$this->age = $age;
				}
			}

			public function setName($name){
				$this -> $name = $name;
			}

			public function setAddr($addr){
				$this -> $addr = $addr;
			}

			public function setPhone($phone){
				$this -> $phone = $phone;
			}

			public function printInfo(){
				echo "$this->name $this->addr $this->phone <br>";
			}

			public function _construct($name,$addr,$phone){
				$this->name = $name;
				$this->addr = $addr;
				$this->phone = $phone;
			}

		}
		$p1 = new Person("밥","벼","010");
		//$p2 = new Person();
		/*
		$p1->name = "사람";
		$p1->addr = "서울";
		$p1->phone = "02-181818-19191";
		*/
		$p1->setName("최");
		$p1->setAddr("주소");
		$p1->setPhone("010");
		$p1->printInfo();
	?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	class Score{
		public $국어,$영어,$수학,$sum=0,$avg=0;

		public function __construct($국어,$영어,$수학){
			$this->국어 = $국어;
			$this->영어 = $영어;
			$this->수학 = $수학;
			$this->sum();
			$this->avg();
		}

		public function sum(){
			$this->sum += $this->국어;
			$this->sum += $this->영어;
			$this->sum += $this->수학;
		}
		public function avg(){
			$this->avg = ($this->sum)/3;
		}

		public function printScore(){
			echo "국어 : $this->국어 <br> 영어 : $this->영어  <br> 수학 : $this->수학  <br> 총점 : $this->sum  <br> 평균 : $this->avg ";
		}

	}
	$a = new Score(10,20,30);
	$a -> printScore();
	?>
</body>
</html>
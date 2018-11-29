1701281최찬민<br>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1></h1>
	<form action=' MemberAdd1701281.php' enctype="multipart/form-data" method='post'>
		<table border='1px'>
			<tr><th colspan='2'>회원등록</th></tr>
			<tr>
				<td>이름</td>
				<td><input name='name' type='text'></td>
			</tr>
			<tr>
				<td>아이디</td>
				<td><input name='sn' type='text'></td>
			</tr>
			<tr>
				<td>비밀번호</td>
				<td><input name='pw' type='password'></td>
			</tr>
			<tr>
				<td>태어난연도</td>
				<td><input name='birthYear' type='text'></td>
			</tr>
			<tr>
				<td>성별</td>
				<td>
					<select name='gender'>
						<option>M</option>
						<option>F</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>학년</td>
				<td>
					<select name='syear'>
						<option>1</option>
						<option>2</option>
						<option>3</option>
					</select>
				</td>
			</tr>
			<tr><th colspan='2'><input type='submit' value='등록'></th></tr>
		</table>
	</form>
</body>
</html>
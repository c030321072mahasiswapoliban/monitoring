<?php 
include 'koneksi/koneksi.php';
session_start();

$username = $_POST['user'];
$pass = $_POST['pass'];
// cek user
$result = mysqli_query($konek, "SELECT * FROM tb_web where username = '$username'");
$row = mysqli_fetch_assoc($result);

$user = $row['username'];
$ps = $row['password'];

if($username == $user){
	if(password_verify($pass, $ps)){
		$_SESSION["admin"] = true;
		header('location:admin');
	}
	else{
		echo "
		<script>
		alert('USERNAME/PASSWORD SALAH');
		window.location = 'login.php';
		</script>
		";
	}
}
else{
	echo "
	<script>
	alert('USERNAME/PASSWORD SALAH');
	window.location = 'login.php';
	</script>
	";
}

?>
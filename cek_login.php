<?php
include "inc/koneksi.php";
function anti_injection($data){
$filter = mysql_real_escape_string(stripslashes(strip_tags(
htmlspecialchars($data,ENT_QUOTES))));
return $filter;
}
$username = anti_injection($_POST['username']);
$pass = anti_injection(md5($_POST['password']));
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
?>
<script>
alert('Sekarang loginnya tidak bisa di injeksi lho.');
window.location.href='index.php';
</script>
<?php
}else{
$login =mysql_query("SELECT * FROM admins WHERE
username='$username' AND password='$pass'");
$ketemu =mysql_num_rows($login);
$r=mysql_fetch_array($login);
if ($ketemu > 0){
session_start();
$_SESSION['username']   = $r['username'];
$_SESSION['nama_lengkap']        = $r['nama_lengkap'];
$_SESSION['level']        = $r['level'];
$_SESSION['keterangan']=$r['keterangan'];
header('location:media.php');
    
}else{
?>
<script>
alert('Maaf, Username atau password salah.');
window.location.href='index.php';
</script>
<?php
}
}
?>
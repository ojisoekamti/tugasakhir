<?php
$idmenu	= explode(",",$_GET['idmenu']);
foreach($idmenu as $y){
    include "../../../inc/koneksi.php";
    //echo "INSERT INTO sys_groupmenu(idmenu,idlevel)VALUES(".$y.",1);";
    mysql_query("INSERT INTO sys_groupmenu(idmenu,idlevel)VALUES(".$y.",1)"); 
    }
?>
<script>
url = 'module/setting/hak-akses/index.php';
load(url);
</script>
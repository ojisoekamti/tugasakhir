<?php session_start();
include "inc/koneksi.php";
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    ?>
<script>alert("Jangan Kembali Kesini Percuma kagak bisa");

                window.location.replace("index.php");
                alert("masukin username sama pasword dulu ya guys !:)");
</script>
<?php

}else{


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sistem Informasi TAGANA</title>
	<link rel="stylesheet" type="text/css" href="themes/black/easyui.css">
	<link rel="stylesheet" type="text/css" href="themes/icon.css">
	<link rel="stylesheet" type="text/css" href="demo/demo.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/jquery.validationEngine.js"></script>
    <script type="text/javascript" language="javascript">
    function load(id){
    $('#pe').panel('refresh',id);
    }

    function progress(){
    var win = $.messager.progress({
    title:'Harap Tunggu',
    msg:'Sedang mempersiapkan data...'
    });
    setTimeout(function(){
    $.messager.progress('close');
    },500)
    }

    function Ganti(){
       var passwordlama = $('#passwordlama').val('getValue');
       var passwordbaru = $('#passwordbaru').val('getValue');

       alert($('#passwordlama').text('getValue'));
       }
    </script>
</head>
<body class="easyui-layout" onload="progress()">

	<div data-options="region:'north',border:false" style="height:100px;
    background:#0052A3;
    background-image: url('img/tagana.png');
    background-size: 80px 100px;
    background-repeat: no-repeat;
    ">
	  <h2 align="center"><br />SISTEM INFORMASI PENCATATAN INSENTIF<br />TARUNA SIAGA BENCANA (TAGANA)<br />DI PROVINSI BANTEN</h2>
    </div>
	<div data-options="region:'west',split:true,title:'Menu'" style="width:200px;">


        <div class="easyui-accordion" data-options="fit:true,border:false" style="width: 200px;">
				<div title="Main Menu" style="padding:10px;" data-options="iconCls:'icon-ok'">
					<ul class="easyui-tree" data-options="method:'get',animate:true,lines:true">
                    <?php include "menu.php"; ?>
                    </ul>
				</div>
				<div title="User Information" style="padding:10px;" data-options="iconCls:'icon-search'">
					You Loged In As <?php echo $_SESSION['username']; ?>
                    <div style="margin:10px 0;"></div>
                		<div style="padding:1px 0 1px 1px">
                            <?php echo $_SESSION['keterangan']; ?>
                	    </div>
                    
				</div>
				<div title="Help" style="padding:10px" data-options="iconCls:'icon-help'">
					
				</div>
		</div>
    </div>
	<div data-options="region:'south',border:false" style="height:40px;background:#666;padding:10px;">
     <center>Copyright @ 2015 @Kementerian Sosial Republik Indonesia</center>
    </div>
	<div data-options="region:'center',title:'Selamat Datang <?php echo $_SESSION['nama_lengkap']; ?>'">
    <div id="pe" class="easyui-panel" data-options="region:'center',title:'',"></div>

    </div>
</body>
</html>
     <?php } //include "content.php";
      ?>
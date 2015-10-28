
<script>

    function reload(){
        $.messager.confirm('Confirm','Apakah anda yakin akan mengganti tema?',function(r){
            if (r){
            <?php
            include "../../inc/koneksi.php";
            mysql_query("UPDATE sys_setting SET value='".$_GET['warna']."' WHERE idsetting = 1");
            
            ?>
            window.location.href='media.php';
            }
        });
    }
    $(document).ready(function() {

        reload();
    });
</script>
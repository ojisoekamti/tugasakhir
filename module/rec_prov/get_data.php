<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	include '../../inc/koneksi.php';
	
    
        $id = isset($_POST['id']);        	
     	$rs = mysql_query("select count(*) from rec_prov");
    	$row = mysql_fetch_row($rs);
    	$result["total"] = $row[0];
    

    
    if(empty($id)){
    	$rs = mysql_query("select * from rec_prov limit ".$offset.",".$rows);                  
	}else
    {
    	$rs = mysql_query("select * from rec_prov WHERE kd_rec_prov LIKE '%".$_POST['id']."%'");
    }  
    
    
      
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);

?>
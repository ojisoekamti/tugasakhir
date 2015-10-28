<?php
          function get_menu($data, $parent = 0) {
	      static $i = 1;
	      $tab = str_repeat(" ", $i);
	      if (isset($data[$parent])) {
		      $html = $tab."<ul class='easyui-tree' animate='true' lines='true'>"; 
		      $i++;
		      foreach ($data[$parent] as $v) {
			       $child = get_menu($data, $v->idmenu);
                   if($parent==0){
			       $html .= $tab."<li  data-options=\"state:'closed'\"><span>";
                   }else{
                   $html .= $tab."<li ><span>";
                   }
			       $html .= "<a onclick='load(\"".$v->url."\")'>".$v->judul."</a></span>";
			       if ($child) {
				       $i--;
				       $html .= $child;
				       $html .= $tab;
			       }
			       $html .= '</li>';
		      }
		      $html .= $tab."</ul>";
		      return $html;
	      } 
        else {
		      return false;
	      }
      }
      include "inc/koneksi.php";
      $result = mysql_query("SELECT * FROM sys_menu where level like '%".$_SESSION['level']."%' ORDER BY menuorder");
      while ($row = mysql_fetch_object($result)) {
	       $data[$row->idparent][] = $row;
      }
      $menu = get_menu($data);
      echo $menu;


?>
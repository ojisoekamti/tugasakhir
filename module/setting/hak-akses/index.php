<script type="text/javascript">
		function getChecked(){
			var nodes = $('#tt').tree('getChecked');
			var s = '';
			for(var i=0; i<nodes.length; i++){
				if (s != '') s += ',';
				s += (parseInt(nodes[i].text)).toString();
			}
			url = 'module/setting/hak-akses/save_data.php?idmenu='+s;
            load(url);
		}
	</script>
	<div class="easyui-panel" title="Hak Akses" style="width:1049px;height:470px;padding:10px;" >
		<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'west',split:true" style="width:300px;padding:10px">
				<table>
                	    		<tr>
                	    			<td>Level: </td>
                	    			<td>
                	    				<select name="kodepelanggan" id="kodepelanggan" class="easyui-combogrid" style="width:200px" data-options="
                                        panelWidth: 200,
                				        editable:false,
                                        idField: 'kodepelanggan',
                                        textField: 'kodepelanggan',
                                        url: 'module/transaksi/get_data_pelanggan.php',
                                        method: 'get',
                                        columns: [[
                                        {field:'idlevel',title:'Id Level',width:30},
                                        {field:'namalevel',title:'Nama',width:70,align:'center'}
                                        ]],
                                        fitColumns: true
                                        ">
                                  </select>
                	    		</tr>
                	    	</table>
			</div>
			<div data-options="region:'center'" style="padding:10px">
				
<?php
          function get_menu($data, $parent = 0) {
	      static $i = 1;
	      $tab = str_repeat(" ", $i);
	      if (isset($data[$parent])) {
		      $html = $tab."<ul id='tt' class='easyui-tree' animate='true' lines='true' checkbox='true'>"; 
		      $i++;
		      foreach ($data[$parent] as $v) {
			       $child = get_menu($data, $v->idmenu);
                   if($parent==0){
			       $html .= $tab."<li data-options=\"state:'closed'\"><span  id='pilih[]'>";
                   }else{
                   $html .= $tab."<li><span id='pilih[]'>";
                   }
			       $html .= $v->idmenu.". ".$v->judul."</span>";
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
      include "../../../inc/koneksi.php";
      $result = mysql_query("SELECT * FROM sys_menu ORDER BY menuorder");
      while ($row = mysql_fetch_object($result)) {
	       $data[$row->idparent][] = $row;
      }
      $menu = get_menu($data);
      echo $menu;
?>
<a href="#" class="easyui-linkbutton" onclick="getChecked()">GetChecked</a> 
			</div>
		</div>
	</div>
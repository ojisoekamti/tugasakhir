<div id="toolbar">  
    <table style="padding: 1px;width: 99%;">
        <tr>
        <td>
        Data Yang sudah Rekomendasi adalah 
        <?php  
        include '../../inc/koneksi.php';
        $rs = mysql_query("select * from tsudah");
    
        echo mysql_num_rows($rs);
        ?>
        </td>
            <script type="text/javascript" src="datagrid-detailview.js"></script>
            <td align="right">
            	<input class="easyui-searchbox" prompt="Silahkan Input Field" searcher="doSearch"  style="width:300px"/>
            </td>
        </tr>
    </table> 
</div>
	<style type="text/css">
		#fm_tb_anggota{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			color:#666;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
	</style>
    <script>
         jQuery(document).ready(function(){
            jQuery("#formID").validationEngine();
            });
    </script>


	<script type="text/javascript">
	var url;
        function pindah(){
            
                            
                            
            var row = $('#dg').datagrid('getSelected');
            
			if (row){
                alert('Data Sudah Direkomendasi')
			}
            
                		}
        function doSearch(value){
                $('#dg').datagrid('load',{    
                id:value  
                });   
              }              

                $('#dg').datagrid({
                    onRowContextMenu:function(e){
        				e.preventDefault();
        				$('#ingrid').menu('show', {
        					left: e.pageX,
        					top: e.pageY
        				});
        			}
                });
                $('#dg').datagrid({
                onDblClickRow:function(e){
                pindah();
                    }
                });

        function myformatter(date){
			var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
		}
		function myparser(s){
			if (!s) return new Date();
			var ss = (s.split('-'));
			var y = parseInt(ss[0],10);
			var m = parseInt(ss[1],10);
			var d = parseInt(ss[2],10);
			if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
				return new Date(y,m-1,d);
			} else {
				return new Date();
			}
		}
        

	</script>
	<table id="dg" title="Data Sudah Terekomendasi " class="easyui-datagrid" style="width:1049px;height:470px"
			url="module/rekomendasisudah/get_data.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true"            
            >
		<thead>
        
        <tr >
        	<th field="niat"  width="10">NIAT</th>
			<th field="nama" width="25">Nama </th>
			<th field="tmp_lahir" width="15">Tempat Lahir</th>
			<th field="unit_tagana" width="15">Unit TAGANA</th>
			<th field="jk" width="15">Jenis Kelamin</th>
		</tr>
            
		</thead>
	</table>
	
	<div id="dlg_tb_anggota" class="easyui-dialog" style="width:450px;height:500px;padding:10px 20px" closed="true" buttons="#dlg_tb_anggota-buttons" data-options="modal:true,closed:true">
		<div class="ftitle">Form </div>
		<form id="fm_tb_anggota" method="post" novalidate  enctype="multipart/form-data" >
        
			<div class="fitem">
				<label>NIAT:</label>
				<input name="niat" class="easyui-validatebox" required="true">
			</div>
            
			<div class="fitem">
				<label>Nama :</label>
				<input name="nama" class="easyui-validatebox" required="true">
			</div>
            
			<div class="fitem">
				<label>Tempat Lahir :</label>
				<input name="tmp_lahir">
			</div>
            
			<div class="fitem">
				<label>Tanggal Lahir :</label>
				<input id="tgl_lahir"  name="tgl_lahir" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser"></input>
			</div>
            
			<div class="fitem">
				<label>Jenis Kelamin :</label>
				<select class="easyui-combobox" name="jk" style="width:200px;">
            		<option value="L">Laki - laki</option>
            		<option value="P">Perempuan</option>
        	   </select>
			</div>
            
			<div class="fitem">
				<label>Status :</label>
				<select class="easyui-combobox" name="status" style="width:200px;">
            		<option value="Menikah">Menikah</option>
            		<option value="Belum Menikah">Belum Menikah</option>
        	   </select>
			</div>
            
            
			<div class="fitem">
				<label>Agama :</label>
				<select class="easyui-combobox" name="agama" style="width:200px;">
            		<option value="Islam">Islam</option>
            		<option value="Kristen">Kristen</option>
            		<option value="Budha">Budha</option>
            		<option value="Hindu">Hindu</option>
        	   </select>
			</div>
            
            <div class="fitem">
				<label>Pendidikan :</label>
				<input name="pendidikan">
			</div>
            
            <div class="fitem">
				<label>Pekerjaan :</label>
				<input name="pekerjaan">
			</div>
            
			<div class="fitem">
				<label>Unit Tagana:</label>
				<select name="unit_tagana" class="easyui-combogrid" style="width:250px" data-options="
                        panelWidth: 250,
				        editable:false,
                        idField: 'kd_unit_tagana',
                        textField: 'unit_tagana',
                        url: 'module/unit_tagana/get_data.php',
                        
                        method: 'get',
                        columns: [[
                        {field:'kd_unit_tagana',title:'Kode Unit Tagana',width:30},
                        {field:'unit_tagana',title:'Unit Tagana',width:70,align:'center'}
                        ]],
                        fitColumns: true
                        ">
                  </select>
			</div>
            
            <div class="fitem">
				<label>Kampung :</label>
				<input name="kampung">
			</div>
            
            <div class="fitem">
				<label>Desa :</label>
				<input name="desa">
			</div>
            
            <div class="fitem">
				<label>Kecamatan :</label>
				<input name="kecamatan">
			</div>
            
			<div class="fitem">
				<label>Kab. Kota:</label>
				<select name="kab_kota" class="easyui-combogrid" style="width:250px" data-options="
                        panelWidth: 250,
                        editable:false,
                        idField: 'kd_kab_kota',
                        textField: 'kab_kota',
                        url: 'module/kab_kota/get_data.php',
                        method: 'get',
                        columns: [[
                        {field:'kd_kab_kota',title:'Kode Kab. Kota',width:30},
                        {field:'kab_kota',title:'Kab. Kota',width:70,align:'center'}
                        ]],
                        fitColumns: true
                        "
                        >
                  </select>
			</div>
			<div class="fitem">
				<label>Kontak Person:</label>
				<input data-options="prompt:'Enter your phone number.',validType:'number'" class="easyui-numberbox" name="kontak_person">
			</div>
            
			<div class="fitem">
				<label>Tahun Masuk:</label>
				<input name="tahun_masuk">
			</div>
            
            
            <div class="fitem">
				<label>Rec. Prov:</label>
				<select name="rec_prov" class="easyui-combogrid" style="width:250px" data-options="
                        panelWidth: 250,
                        editable:false,
                        idField: 'kd_rec_prov',
                        textField: 'rec_prov',
                        url: 'module/rec_prov/get_data.php',
                        method: 'get',
                        columns: [[
                        {field:'kd_rec_prov',title:'Kode Rec. Prov',width:30},
                        {field:'rec_prov',title:'Rec. Prov',width:70,align:'center'}
                        ]],
                        fitColumns: true
                        " >
                  </select>
			</div>
            <div class="fitem">
				<label>Rec. Kab. Kota:</label>
                <input name="rec_kab_kota" type="text" id="rec_kab_kota" />
			</div>
			<div class="fitem">
				<label>Poto :</label>
				<input name="file_gambar" type="file" id="file_gambar" />
			</div>
		</form>
	</div>

	<div id="dlg_tb_anggota-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveData()">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_tb_anggota').dialog('close')">Cancel</a>
	</div>
    <script>
        $(function(){
            $(document).bind('contextmenu',function(e){
                e.preventDefault();
                $('#mm').menu('show', {
                    left: e.pageX,
                    top: e.pageY
                });
            });
        });
    </script>
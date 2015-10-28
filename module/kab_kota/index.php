<? include "../../inc/all.php"; ?>
	<style type="text/css">
		#fm_kab_kota{
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
	<script type="text/javascript">
		var url;
		function newData(){
			$('#dlg_kab_kota').dialog('open').dialog('setTitle','New Data');
			$('#fm_kab_kota').form('clear');
			url = 'module/kab_kota/save_data.php';
		}
		function editData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg_kab_kota').dialog('open').dialog('setTitle','Edit Data');
				$('#fm_kab_kota').form('load',row);
				url = 'module/kab_kota/update_data.php?id='+row.kd_kab_kota;
			}
		}
		function saveData(){
			$('#fm_kab_kota').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg_kab_kota').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the Data data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}
		function removeData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this Data?',function(r){
					if (r){
						$.post('module/kab_kota/remove_data.php',{id:row.kd_kab_kota},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the Data data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		}

	</script>
	<table id="dg" title="Data kab_kota " class="easyui-datagrid" style="width:1049px;height:470px"
			url="module/kab_kota/get_data.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true"
            >
		<thead>
			<tr>
				<th field="kd_kab_kota" width="10">Kode Kab. Kota</th>
				<th field="kab_kota" width="25">Nama </th>
                <th field="keterangan" width="25">Keterangan </th>                
			</tr>
		</thead>
	</table>
	
	<div id="dlg_kab_kota" class="easyui-dialog" style="width:450px;height:300px;padding:10px 20px"
			closed="true" buttons="#dlg_kab_kota-buttons"
            data-options="modal:true,closed:true"
            >
		<div class="ftitle">Form </div>
		<form id="fm_kab_kota" method="post" novalidate>
			<div class="fitem">
				<label>Kode Kab. Kota:</label>
				<input name="kd_kab_kota" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Nama :</label>
				<input name="kab_kota" class="easyui-validatebox" required="true">
			</div>
                        			<div class="fitem">
				<label>Keterangan :</label>
				<input name="keterangan" class="easyui-validatebox" required="true">
			</div>            
		</form>
	</div>
	<div id="dlg_kab_kota-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveData()">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_kab_kota').dialog('close')">Cancel</a>
	</div>
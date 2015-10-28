<? include "../../inc/all.php"; ?>
	<style type="text/css">
		#fm_unit_tagana{
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
			$('#dlg_unit_tagana').dialog('open').dialog('setTitle','New Data');
			$('#fm_unit_tagana').form('clear');
			url = 'module/unit_tagana/save_data.php';
		}
		function editData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg_unit_tagana').dialog('open').dialog('setTitle','Edit Data');
				$('#fm_unit_tagana').form('load',row);
				url = 'module/unit_tagana/update_data.php?id='+row.kd_unit_tagana;
			}
		}
		function saveData(){
			$('#fm_unit_tagana').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg_unit_tagana').dialog('close');		// close the dialog
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
						$.post('module/unit_tagana/remove_data.php',{id:row.kd_unit_tagana},function(result){
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
	<table id="dg" title="Data unit_tagana " class="easyui-datagrid" style="width:1049px;height:470px"
			url="module/unit_tagana/get_data.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true"
            >
		<thead>
			<tr>
				<th field="kd_unit_tagana" width="10">Kode Unit Tenaga</th>
				<th field="unit_tagana" width="25">Unit TAGANA </th>
                <th field="keterangan" width="25">Keterangan </th>
			</tr>
		</thead>
	</table>
	
	<div id="dlg_unit_tagana" class="easyui-dialog" style="width:450px;height:300px;padding:10px 20px"
			closed="true" buttons="#dlg_unit_tagana-buttons"
            data-options="modal:true,closed:true"
            >
		<div class="ftitle">Form </div>
		<form id="fm_unit_tagana" method="post" novalidate>
			<div class="fitem">
				<label>Kode Unit Tenaga:</label>
				<input name="kd_unit_tagana" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>UNIT TAGANA :</label>
				<input name="unit_tagana" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Keterangan :</label>
				<input name="keterangan" class="easyui-validatebox" >
			</div>
		</form>
	</div>
	<div id="dlg_unit_tagana-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveData()">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_unit_tagana').dialog('close')">Cancel</a>
	</div>
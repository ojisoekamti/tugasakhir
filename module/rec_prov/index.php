<? include "../../inc/all.php"; ?>
	<style type="text/css">
		#fm_rec_prov{
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
			$('#dlg_rec_prov').dialog('open').dialog('setTitle','New Data');
			$('#fm_rec_prov').form('clear');
			url = 'module/rec_prov/save_data.php';
		}
		function editData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg_rec_prov').dialog('open').dialog('setTitle','Edit Data');
				$('#fm_rec_prov').form('load',row);
				url = 'module/rec_prov/update_data.php?id='+row.kd_rec_prov;
			}
		}
		function saveData(){
			$('#fm_rec_prov').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg_rec_prov').dialog('close');		// close the dialog
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
						$.post('module/rec_prov/remove_data.php',{id:row.kd_rec_prov},function(result){
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
	<table id="dg" title="Data rec_prov " class="easyui-datagrid" style="width:1049px;height:470px"
			url="module/rec_prov/get_data.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true"
            >
		<thead>
			<tr>
				<th field="kd_rec_prov" width="10">Kode Rec. Prov</th>
				<th field="rec_prov" width="25">Nama </th>
			</tr>
		</thead>
	</table>
	
	<div id="dlg_rec_prov" class="easyui-dialog" style="width:450px;height:300px;padding:10px 20px"
			closed="true" buttons="#dlg_rec_prov-buttons"
            data-options="modal:true,closed:true"
            >
		<div class="ftitle">Form </div>
		<form id="fm_rec_prov" method="post" novalidate>
			<div class="fitem">
				<label>Kode Rec. Prov.:</label>
				<input name="kd_rec_prov" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Nama :</label>
				<input name="rec_prov" class="easyui-validatebox" required="true">
			</div>
            <div class="fitem">
				<label>alamat:</label>
                <textarea class="easyui-valiidatebox"></textarea>
            </div>
 			<div class="fitem">
				<label>Kab / Kota:</label>
				<input class="easyui-validatebox" >
			</div>
		</form>
	</div>
	<div id="dlg_rec_prov-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveData()">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_rec_prov').dialog('close')">Cancel</a>
	</div>
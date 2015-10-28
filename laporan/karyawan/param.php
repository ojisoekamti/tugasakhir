<div class="easyui-accordion" data-options="fit:true,border:false" style="width: 200px;height:467px">
				<div title="Parameter" data-options="iconCls:'icon-search',selected:false">
				
                	<div style="margin:10px 0;"></div>
                		<div style="padding:10px 0 10px 60px">
                	    <form id="ff" method="post">
                	    	<table>
                	    		<tr>
                	    			<td>Kode Kab/Kota:</td>
                	    			<td>
                	    				<select name="kd_kab_kota" id="kd_kab_kota" class="easyui-combogrid" style="width:250px" data-options="
                                        panelWidth: 250,
                				        editable:false,
                                        idField: 'kd_kab_kota',
                                        textField: 'kab_kota',
                                        url: 'module/kab_kota/get_data.php',
                                        method: 'get',
                                        columns: [[
                                        {field:'kd_kab_kota',title:'Kode Kabupaten/Kota',width:30},
                                        {field:'kab_kota',title:'kab_kota',width:70,align:'center'}
                                        ]],
                                        fitColumns: true
                                        ">
                                  </select>
                	    		</tr>
                                <tr>
                                    <td>
                                    </td>
                                     <td>
                                    
                	    <div style="text-align:center;padding:5px">
                	    	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">Submit</a>
                	    	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">Clear</a>
                	    </div>
                                    </td>
                                </tr>
                	    	</table>
                	    </form>
                	    </div>
                	<script>
                		function submitForm(){
                            var kd_kab_kota = $('#kd_kab_kota').combogrid('getValue');
                            url = 'laporan/karyawan/param.php?kd_kab_kota='+kd_kab_kota;
                            load(url);
                            
                		}
                		
                	</script>	
				</div>
				<div title="Laporan"  data-options="iconCls:'icon-help',selected:true">
                <a href="laporan/karyawan/ad.php?kd_kab_kota=<?php echo $_GET['kd_kab_kota']; ?>"><input type="button" value="EXPORT EXCEL" /></a>
					<embed src="laporan/karyawan/lap.php?kd_kab_kota=<?php echo $_GET['kd_kab_kota']; ?>" width="1048" height="383">
				</div>
</div>
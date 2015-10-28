
<!-- FUNGSI KLIK KANAN -->
<div id="ingrid" class="easyui-menu"  style="width:120px;">
		<div data-options="iconCls:'icon-edit'"><a onclick="editData()">Edit</a></div>
		<div data-options="iconCls:'icon-remove'"><a onclick="removeData()">Remove</a></div>
		
		<div class="menu-sep"></div>
		<div data-options="iconCls:'icon-no'">Cancel</div>
	</div>
    
<!-- FUNGSI TOOL BAR -->

<div id="toolbar">  
    <table style="padding: 1px;width: 99%;">
        <tr>
            <td>
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newData()">New</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editData()">Edit</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeData()">Remove</a>  
            </td>
            <td>&nbsp;</td>
            <td align="right">
            	<input class="easyui-searchbox" prompt="Silahkan Input Field" searcher="doSearch"  style="width:300px"/>
            </td>
        </tr>
    </table> 
</div>

<script>
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
                editData();
                    }
                });

</script>
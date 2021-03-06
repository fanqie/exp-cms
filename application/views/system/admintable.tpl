<{* 判断是否添加批量操作工具栏 *}>
<{if $_admintable_conf.muti_operation|default}>
<div class="operation-bar clearfix">
	<{foreach from=$_admintable_conf.muti_operation item=_admintable_item key=_admintable_key}>
	<span class="operation-btn js-mutiopt-<{$_admintable_key}>" action="<{$_admintable_item.action|default}>" title="<{$_admintable_item.title}>"><span class="icon-<{$_admintable_key}>"></span><{$_admintable_item.title}></span>
	<{/foreach}>
</div>
<{/if}>
<div class="list-table-wrap">
	<table class="list-table">
		<thead>
			<tr>
<{foreach from=$_admintable_conf.column item=_admintable_column key=_admintable_key}>
<th<{if $_admintable_column.width|default}> style="width:<{$_admintable_column.width}>px;"<{/if}><{if $_admintable_column.order_by|default}> order_by="<{$_admintable_column.order_by}>" class="js-sort"<{/if}>>
	<span class="title"><{$_admintable_column.label}></span>
</th>
<{/foreach}>
				<{* 判断是否添加操作列表头 *}>
				<{if $_admintable_conf.operation|default}>
				<th><span class="title">操作</span></th>
				<{/if}>
			</tr>
		</thead>
		<tbody>
			<{foreach from=$_admintable_data item=_admintable_item key=_admintable_key}>
			<tr row_id="<{$_admintable_item[$_admintable_conf.primary]}>">
				<{foreach from=$_admintable_conf.column item=_admintable_column}>
				<td>
					<span class="inner-td"<{if $_admintable_column.width|default}> style="width:<{$_admintable_column.width}>px;"<{/if}>>
					<{basetpl data=$_admintable_item conf=$_admintable_column.data tpl=$_admintable_column.template prefix=$_admintable_column.prefix|default}>
					</span>
				</td>
				<{/foreach}>
				<{* 判断是否添加操作列 *}>
				<{if $_admintable_conf.operation|default}>
				<td>
					<span class="inner-td">
					<{foreach from=$_admintable_conf.operation item=_admintable_item key=_admintable_key}>
						<span class="table-btn js-opt-<{$_admintable_key}>" action="<{$_admintable_item.action|default}>" title="<{$_admintable_item.title}>" size_x="<{$_admintable_item.size_x|default}>">
							<span class="icon-<{$_admintable_key}>"></span>
						</span>
					<{/foreach}>
					</span>
				</td>
				<{/if}>
			</tr>
			<{/foreach}>
		</tbody>
	</table>
</div>
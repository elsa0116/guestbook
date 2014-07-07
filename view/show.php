<table border="1">
	<thead>
		<tr>
			<td>姓名</td>
			<td>E-mail</td>
			<td>性別</td>
			<td>留言內容</td>
			<td>留言時間</td>
			<td>留言IP</td>
			<td>刪除留言</td>
		</tr>
	</thead>
	<?
		if($data['record']>0){
			foreach($data['data'] as $key => $value){
	?>
	<tbody>
		<tr>
			<td><? echo $value['name']; ?></td>
			<td><? echo $value['email']; ?></td>
			<td>
			<? 
				if($value['sex'] == 'boy'){
					echo "男生";
				}else{
					echo "女生";
				}
			?>
			</td>
			<td><? echo $value['content']; ?></td>
			<td><? echo date('Y-m-d H:i:s',$value['create_time']); ?></td>
			<td><? echo $value['ip']; ?></td>
			<td><a href="?action=delete&id=<? echo $value['id']; ?>">刪除</a></td>
		</tr>
	</tbody>
	<?
			}
		}
	?>
</table>


<a href="?action=add">新增</a>
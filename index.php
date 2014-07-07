<?
include('cfg/cfg.php');
include('model/WADB.cls.php');
$db = new WADB(db_server,db_name,db_username,db_password);

include('view/header.php');
if($_GET['action'] != ''){
	switch ($_GET['action']){
		case 'add':
			if(count($_POST)>0){
				$sql = "INSERT INTO msg(name,email,sex,content,create_time,ip) VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['sex']."','".$_POST['msg']."','".time()."','".$_SERVER['REMOTE_ADDR']."')";
				$db->insertRecords($sql);
			}
			include('view/add.php');
			break;
			
		case 'delete':
			$sql = "DELETE FROM msg WHERE id='".$_GET['id']."'";
			$db->deleteRecords($sql);
			echo "<a href='index.php'>回首頁</a>";
			break;
			
		default:
			$sql = "SELECT * FROM msg ORDER BY id desc";
			$data = $db->selectRecords($sql);
			include('view/show.php');
			echo "Hello";
	}
}else{
	$sql = "SELECT * FROM msg ORDER BY id desc";
	$data = $db->selectRecords($sql);
	include('view/show.php');
	echo "Hello";
}
include('view/footer.php');
?>
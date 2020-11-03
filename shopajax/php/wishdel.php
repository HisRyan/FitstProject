
<?php
$goodid=$_GET['goodid'];
//编码
header("Content-type: text/html; charset=utf-8");




//拼接查询语句
$sql = "delete from lh_wish where goodid=${goodid}"  ;
// .$classSQL.$readcountSQL." limit ".$startIndex.",".$pageSize
//调试SQL语句
// print_r($sql); exit();

//数据库实例
$dbc = new MySQLi("192.168.0.186","root","root","test");

//查询编码设置
mysqli_query($dbc, "set names utf8");

//执行查询语句 query函数
$result = $dbc->query($sql);

$re = array(
    "state"=>true,
    "code"=>1,
    "msg"=>'删除成功',
);

//转为JSON字符串
$reJSONStr = json_encode($re);

print_r( $reJSONStr );

?>
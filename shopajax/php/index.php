
<?php

//编码
header("Content-type: text/html; charset=utf-8");

//参数获取
$page = 1;
$pageSize = 3;
$readcount = 0;
$classSQL = '';
$readcountSQL = '';


if(isset($_GET['page'])){ $page = $_GET['page']; }
if(isset($_GET['pageSize'])){ $pageSize = $_GET['pageSize']; }
if(isset($_GET['classid'])){
    $classid = $_GET['classid'];
    $classSQL = " and classid=" . $classid;
}
if(isset($_GET['readcount'])){
    $readcount = $_GET['readcount'];
    $readcountSQL = " and readcount>=" . $readcount;
}

//起始下标
$startIndex = ($page-1) * $pageSize;

//拼接查询语句
$sql = "select *from lh_good where lh_good.`column`=$classid"  ;
$sql1="select *from lh_wish where goodid=$classid";
// .$classSQL.$readcountSQL." limit ".$startIndex.",".$pageSize
//调试SQL语句
// print_r($sql); exit();

//数据库实例
$dbc = new MySQLi("192.168.0.186","root","root","test");

//查询编码设置
mysqli_query($dbc, "set names utf8");

//执行查询语句 query函数
$result = $dbc->query($sql);
$retch = $dbc->query($sql1);
$arr = array();//定义数组
$rows=$retch->num_rows;

while($arr_tmp = $result->fetch_assoc()){

    $arr[] = $arr_tmp; //添加到数组$arr;

}

if($rows){
    $id=1;
}
else{
    $id=0;
}



$re = array(
    "state"=>true,
    "code"=>$id,
    "msg"=>'成功',
    "data" => $arr,
    // "total"=>$total
);

//转为JSON字符串
$reJSONStr = json_encode($re);

print_r( $reJSONStr );

?>
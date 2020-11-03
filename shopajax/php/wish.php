<?php
   header("Contenr-type:text/html;charset=utf-8");
   $id=$_GET['id'];

   $dbc=new MySQLi("192.168.0.186","root","root","test");
   mysqli_query($dbc,"set name utf8");
   $sql="select *from lh_wish where goodid=$id";
   $result=$dbc->query($sql);
   $rows=$result->num_rows;
   if($rows){
    $sql1="delete from lh_wish where goodid=$id";
    $retch=$dbc->query($sql1);
    $re = array(
        "state"=>"删除成功",
    );
   }
   else{
    $sql2="insert into lh_wish(goodid,name,price,img) select id,name,price,img from lh_good  WHERE lh_good.id=$id";
    $retag=$dbc->query($sql2);
    $re = array(
        "state"=>"添加成功",
    );
   }
   $reJSONStr = json_encode($re);
    print_r( $reJSONStr);
?>
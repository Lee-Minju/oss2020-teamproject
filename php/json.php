<?php
$db_host = "호스트";
$db_user = "아이디";
$db_passwd = "비밀번호";
$db_name = "디비 이름";

$table_name = "테이블 이름";

$conn =  new mysqli($db_host, $db_user, $db_passwd, $db_name);
if($conn->connect_errno)
{
    die("Database Connect Failed : " . $conn->connect_error);
}

if(!($result = $conn->query("SELECT * FROM `$table_name`")))
{
    echo "2";
}
else
{
    if(!($row = $result->fetch_assoc()))
    {
        echo "4";
    }
    else
    {
        $json = array();
        do
        {   
            
            
            array_push($json, array('startingpoint'=>$row["startingpoint"],'destination'=>$row["destination"],'route'=>$row["route"],'time'=>$row["time"]));
        }
        while($row = $result->fetch_assoc());
        $result->free();
    }
}

echo json_encode(array("평일운행"=>$json),JSON_UNESCAPED_UNICODE);
?>
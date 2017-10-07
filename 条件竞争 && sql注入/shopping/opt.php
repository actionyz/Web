<?php
include  "conn/common.php";



if(isset($_GET['action']) && isset($_GET['name']))
{
    $good_name = addslashes($_GET['name']);
    if($_GET['action']=='buy')
    {
        if($_SESSION['money'] >= $price[$_GET['name']])
        {

            //这是正确的购买方式，先扣钱再增加商品数量
            $money = fetch_money($_SESSION['username']);
            $num = article_num($good_name);

            sql_get("update have set ".$good_name."=".($num+1)." where name='$_SESSION[username]'");
            sql_get("update users set money=".($money-$price[$_GET['name']])." where name='$_SESSION[username]'");
//
//            $_SESSION['money']= $_SESSION['money']-$price[$_GET['name']];
//            //这是正确的购买方式，先扣钱再增加商品数量
//
//            sql_get("update have set ".$good_name."=".($have[$good_name]+1)." where name='$_SESSION[username]'");
//            sql_get("update users set money=$_SESSION[money] where name='$_SESSION[username]'");



            echo "<script>alert('Buy one!');</script>";
        }
        else
        {

            echo "<script>alert('Money not enough!');</script>";
        }


    }
    if($_GET['action']=='sale')
    {
        if($have[$good_name] <= 0)
        {
            echo "<script>alert('You don\'t have it');</script>";
        }
        else
        {
//            sleep(5);
            //这是正确的售出方式，先减少商品数量再增加钱
//            $_SESSION['money'] = $_SESSION['money']+$price[$_GET['name']];
//            sql_get("update users set money=$_SESSION[money] where name='$_SESSION[username]'");
//            sql_get("update have set ".$good_name."=".($have[$good_name]-1)." where name='$_SESSION[username]'");


            $money = fetch_money($_SESSION['username']);
            $num = article_num($good_name);
            save_money($_SESSION['username'],$money+$price[$good_name]);
            sql_get("update have set ".$good_name."=".($have[$good_name]-1)." where name='$_SESSION[username]'");

        }

    }

//fresh();
    echo "<script>window.location.href='products.php'</script>";
}


?>

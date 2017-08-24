这道题目出的很不错，看看这道题目的考点

首先是代码审计
所有的用户输入都被addslashes waf掉，所以注入的话不要找引号的注点
在riji.php中找到了一处
`$sql1 = "select * from msg where userid= $id order by id";`
下面去看下$id是否可控
```
if($_SESSION['user'])
{
	$username = $_SESSION['user'];
	@mysql_conn();
	$sql = "select * from user where name='$username'";
	$result = @mysql_fetch_array(mysql_query($sql));
	mysql_close();
	if($result['userid'])
	{
		$id = intval($result['userid']);
	}
}
```

如果$result['userid']为空$id就不会被赋值，就可以使用common.php中的变量覆盖，赋值id造成注入
那么怎样使$result['userid']为空就很关键
若果在SQL中没有用户的信息岂不是就可以使得userid为空，但前提是先登录上
所以就可以这么搞先注册id，然后登录，接着利用某种方法将其删除  下面就介绍怎样删除用户

发现在api在中有删除的操作
但首先要绕过下面的检测
```
if(!empty($result)){
			//利用 salt 验证是否为该用户
			echo $this->check,md5($result['salt'] . $this->data . $username);
			if($this->check === md5($result['salt'] . $this->data . $username)){
				echo '(=-=)!!';
				if($result['role'] == 1){//检查是否为admin用户
					return 1;
				}
				else{
```
我们要构造一对明密文匹配的MD5值因为要role==1所以这里只能是admin的salt
可以利用hash拓展攻击进行验证
注意这里的前提是要知道md5($result['salt'])才能进行攻击，去哪里找呢
很巧，在api.php中就有 
```
	if($result['salt'])
		{
			$check = base64_encode(md5($result['salt']));
			$name = $result['name'];
			header("Location:./repass.php?username=$name&check=$check&mibao=$mibao&pass=$pass");
		}
```
完事具备只欠代码，这里就不写了
登录上之后利用id的普通注入就可以


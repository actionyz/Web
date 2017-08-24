简单审计存在二次注入漏洞

下面是配合文件上传getshell

`rename($oldname, $newname);`

要想写入shell，oldname必须是已经存在的，newname必须是php形式
又因为
```
$oldname = UPLOAD_DIR . $result["filename"].$result["extension"];
$newname = UPLOAD_DIR . $req["newname"].$result["extension"];
```
二者的后缀都是从数据库extension字段提取出来所以可以利用二次是这个字段为空

同时输入newname，注意这里时的extension还是jpg所以会有后缀，因为要保持数据库中的值与实际文件名相同所以
`filename="',extension='',filename='x.jpg.jpg"`
再次执行重命名操作就可以getshell
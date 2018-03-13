##总平台对接接口文档

####1:同步用户基础信息
##### 接口地址 ####
```
http://****.cn/mobile/register.php
```
##### 请求方式 ####
```
GET
```
 
##### 传递参数 #####
```
act     必传(默认值 synUserInfo )
data    用户手机号 des加密后字符串  必传
```
##### 请求范例 ####
```
http://****.com/mobile/register.php?act=synUserInfo&data=hff3WysLyhsMdXoCf2l3tQ==
```
 
#### 返回值 ####
```
{
    "err": 2,                   //状态码 0:正常 1:参数错误 2:用户已存在 3:系统繁忙
    "err_msg": "用户已存在",     //错误信息
    "data": []
}
```
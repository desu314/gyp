##总平台对接接口文档

####1:用户登录
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
data    用户手机号和密码  ','拼接后 des加密后字符串  必传  例:18338355702,123446
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

####2:总平台打开工业品电商入口
##### 接口地址 ####
```
http://****.cn/mobile/user.php
```
##### 请求方式 ####
```
POST
```
 
##### 传递参数 #####
```
act     必传(默认值 openGyp )
data    模块,用户手机号,密码三个信息  ','拼接后 des加密成字符串  必传  例:main,18338355702,123446

模块命名
 1:main 工业品买卖
 ......待定
```
##### 请求范例 ####
```
var form = new FormData();
form.append("data", "F3o5yWGOp7M+0W5banFMCZg0ojJMPV10fsf9etwbZ+Q=");
form.append("act", "openGyp");

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://****.com/mobile/user.php",
  "method": "POST",
  "headers": {
    "cache-control": "no-cache",
    "postman-token": "008fd1fd-f2bb-6e9e-cd4b-349472adecfd"
  },
  "processData": false,
  "contentType": false,
  "mimeType": "multipart/form-data",
  "data": form
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
```
 
#### 返回值 ####
```
{
    "err": 0,                         //状态码 0:正常 1:参数错误 4:本网站有多个会员绑定了和您相同的手机号，请使用其他登录方式 3:系统繁忙
    "err_msg": "OK",                //错误信息
    "data": {                       //数据体
        "back_url": "gyp.yndth.cn"  //打开地址
    }
}
```
####3:同步用户修改密码
##### 接口地址 ####
```
http://****.cn/mobile/user.php
```
##### 请求方式 ####
```
POST
```
 
##### 传递参数 #####
```
act     必传(默认值 sysUserPwd )
data    用户手机号,密码   ','拼接后 des加密成字符串  必传  例:18338355702,123446
```
##### 请求范例 ####
```
var form = new FormData();
form.append("data", "hff3WysLyhvEs390GANTqO1VqPTqHEpR");
form.append("act", "sysUserPwd");

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://****.com/mobile/user.php",
  "method": "POST",
  "headers": {
    "cache-control": "no-cache",
    "postman-token": "9c66ab0e-dc0c-b09f-85be-c6c8d5c3a26e"
  },
  "processData": false,
  "contentType": false,
  "mimeType": "multipart/form-data",
  "data": form
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
```
 
#### 返回值 ####
```
{
    "err": 0,                         //状态码 0:正常 1:参数错误 4:本网站有多个会员绑定了和您相同的手机号，请使用其他登录方式 3:系统繁忙
    "err_msg": "OK",                //错误信息
    "data": {                       //数据体
        "back_url": "gyp.yndth.cn"  //打开地址
    }
}
```

####4:设置用户登录状态
##### 接口地址 ####
```
http://****.cn/mobile/user.php
```
##### 请求方式 ####
```
POST
```
 
##### 传递参数 #####
```
act     必传(默认值 setUser )
data    用户手机号,密码   ','拼接后 des加密成字符串  必传  例:18338355702,123446
```
##### 请求范例 ####
```
var form = new FormData();
form.append("data", "hff3WysLyhvEs390GANTqO1VqPTqHEpR");
form.append("act", "setUser");

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://182.92.165.86/mobile/user.php",
  "method": "POST",
  "headers": {
    "cache-control": "no-cache",
    "postman-token": "27dd83cd-bf7e-c850-2bed-395c9d2c1969"
  },
  "processData": false,
  "contentType": false,
  "mimeType": "multipart/form-data",
  "data": form
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
```
 
#### 返回值 ####
```
{
    "err": 0,                         //状态码 0:正常 1:参数错误 4:本网站有多个会员绑定了和您相同的手机号，请使用其他登录方式 3:系统繁忙
    "err_msg": "OK",                //错误信息
    "data": {                       //数据体
        "user_info": {              //需要设置成cookie的参数(注:返回字段名即设置cookie字段名)
                    "user_id": "67",            //用户id 
                    "username": "u183NVPL5701"  //用户名
                }
    }
}
```

####4:直接请求用户登陆地址（设置登陆状态）
##### 接口地址 ####
```
http://****.cn/mobile/user.php
```
##### 请求方式 ####
```
POST
```
 
##### 传递参数 #####
```
act     必传(默认值 act_login )
auto_login    用户名,密码   ','拼接后 des加密成字符串  必传  例:18338355702,123446
```
##### 请求范例 ####
```
var form = new FormData();
form.append("act", "act_login");
form.append("auto_login", "hff3WysLyhvEs390GANTqO1VqPTqHEpR");

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://182.92.165.86/mobile/user.php",
  "method": "POST",
  "headers": {
    "cache-control": "no-cache",
    "postman-token": "27dd83cd-bf7e-c850-2bed-395c9d2c1969"
  },
  "processData": false,
  "contentType": false,
  "mimeType": "multipart/form-data",
  "data": form
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
```
 
#### 返回值 ####
```
无返回
```
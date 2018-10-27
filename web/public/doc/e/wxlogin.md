# 微信小程序

###### 一 URL
> /api/login/wxlogin

###### Method
> GET

###### Params
参数名 		 | 类型 		| 必须 		   | 默认值       | 说明
------------ | ------------ | ------------ | ------------ | ------------
code	     | String 		| Yes 		   | - 			  | wx.login 返回的 res.code

###### Response
```javascript
{
    "status": 200,
    "message": "",
    "data": {
        "openid": "owc2G5BTQUPZ-VjCBcNyaCn4h3l4",
        "unionid": "",
        "session_key": ""
    }
}
```

###### Data Explain
名称 		 | 类型 			| 说明
------------ | ------------ | ------------
openid        | string       | 



###### 二 URL
> /api/login/wxsetuserinfo

###### Method
> POST

###### Params
参数名 		 | 类型 	    | 必须 		   | 默认值       | 说明
------------ | ------------ | ------------ | ------------ | ------------
openid	     | String 		| Yes 		   | - 			  | openid
nickname	 | String 		| Yes 		   | - 			  | wx.getSetting 返回的 res.userInfo.nickName
avatarurl    | String       | Yes          | -            | wx.getSetting 返回的 res.userInfo.avatarUrl
gender       | String       | Yes          | -            | wx.getSetting 返回的 res.userInfo.gender 
province     | String       | Yes          | -            | wx.getSetting 返回的 res.userInfo.province 
city         | String       | Yes          | -            | wx.getSetting 返回的 res.userInfo.city 


###### Response
```javascript
{
    "status": 200,
    "message": "",
    "data": {
        "user_id": 3,
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJTSEEyNTYifQ.eyJpc3MiOiJUUCBCWSBIYW5hIiwiaWF0IjoxNTQwNTQwNjU3LCJleHAiOjE1NDExNDU0NTcsInVzZXJfaWQiOjN9.1da7a715ccf7936b6966e35c4b83bb90654e82da5aee24b28f91103dc5b65834"
    }
}
```

###### Data Explain
名称 		 | 类型 	    | 说明
------------ | ------------ | ------------
token        | string       | 登录必须有
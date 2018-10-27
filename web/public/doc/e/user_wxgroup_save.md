# 群资料-编辑保存


###### URL
> /api/user/wxgroup_save

###### Method
> POST

###### Params
参数名        | 类型         | 必须         | 默认值       | 说明
------------  | ------------ | ------------ | ------------ | ------------
id            | Integer      | YES          |   1          | 群id
name          | string       | YES          |              | 群名称
con           | string       | YES          |              | 简介
lordid        | string       | YES          |              | 群主微信号
lorder        | string       | YES          |              | 二维码


###### Response
```javascript
{
    "status": 200,
    "message": "",
    "data": 1
}
```

###### Data Explain
名称 		 | 类型 			| 说明
------------ | ------------ | ------------
id           | Integer      | ID




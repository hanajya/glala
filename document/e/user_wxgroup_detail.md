# 群资料


###### URL
> /api/user/wxgroup_detail

###### Method
> GET

###### Params
参数名        | 类型         | 必须         | 默认值       | 说明
------------  | ------------ | ------------ | ------------ | ------------
id            | Integer      | YES          |   1          | 群id


###### Response
```javascript
{
    "status": 200,
    "message": "",
    "data": {
        "id": 1,
        "user_id": 3,
        "name": "测试1",
        "con": "23423423",
        "lordid": "11111",
        "lorder": "",
        "tag": null,
        "num_zan": 0,
        "num_ts": 0,
        "num_user": 0,
        "price": "0.00",
        "status": 1,
        "creaded_at": 0,
        "updated_at": 0
    }
}
```

###### Data Explain
名称 		 | 类型 			| 说明
------------ | ------------ | ------------
id           | Integer      | ID
lordid       | string       | 群主微信号
lorder 	     | string 		| 二维码



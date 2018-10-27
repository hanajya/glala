# 完善个人资料


###### URL
> /api/user/edit


###### Method
> GET

###### Response
```javascript
{
    "status": 200,
    "message": "",
    "data": {
        "id": 3,
        "openid": "owc2G5BTQUPZ-VjCBcNyaCn4h3l4",
        "mobile": "13829296734",
        "username": "a123",
        "avatar": "",
        "gender": 1,
        "xing": 4,
        "con": "很好！！！！！！",
        "status": 1,
        "create_time": "2018-07-04 16:04:17",
        "update_time": "2018-10-26 17:50:01",
        "userinfo": {
            "id": 2,
            "user_id": 3,
            "provice": "0",
            "city": "0",
            "district": "0",
            "industry_id": 0,
            "source": null,
            "need_source": "",
            "education": 3,
            "profession": 0,
            "created_at": null,
            "updated_at": null
        }
    }
}
```

###### Data Explain
名称 		 | 类型 		| 说明
------------ | ------------ | ------------
provice      | Integer      | 省
city         | Integer      | 市
district     | Integer      | 县

# 二、保存

###### Method
> POST

###### Params
参数名        | 类型         | 必须         | 默认值       | 说明
------------  | ------------ | ------------ | ------------ | ------------
provice       | Integer      | YES          |   1          | 省


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




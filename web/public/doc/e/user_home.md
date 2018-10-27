# 会员中心


###### URL
> /api/user/home

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
        "xing": 3,
        "status": 1,
        "create_time": "2018-07-04 16:04:17",
        "update_time": "2018-10-25 15:36:03",
        "money1": "-5.00",
        "money2": 25,
        "money3": 10
    }
}
```

###### Data Explain
名称 		 | 类型 			| 说明
------------ | ------------ | ------------
money1       | float        | 总
money2       | float        | 群对接收益
money3       | float        | 全民收益
xing		 | int 		    | 星级



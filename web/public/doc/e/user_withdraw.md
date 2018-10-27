# 提现列表


###### URL
> /api/withdraw/list

###### Method
> GET


###### Response
```javascript
{
    "status": 200,
    "message": "",
    "data": {
        "total": 2,
        "list": [
            {
                "id": 2,
                "user_id": 3,
                "money": "300.00",
                "status": 1,
                "create_time": "2018-10-27 14:34:42",
                "update_time": "2018-10-27 14:34:42"
            },
            {
                "id": 1,
                "user_id": 3,
                "money": "200.00",
                "status": 1,
                "create_time": "2018-10-27 14:27:07",
                "update_time": "2018-10-27 14:27:07"
            }
        ]
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



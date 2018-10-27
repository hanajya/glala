# 我发布的群


###### URL
> /api/user/wxgroup

###### Method
> GET

###### Params
参数名        | 类型         | 必须         | 默认值       | 说明
------------  | ------------ | ------------ | ------------ | ------------
status        | Integer      | No           |              | 0等待 1 通过 -1不通过 不填全部
page          | Integer      | No           | 1            | 第几页
limit         | Integer      | No           | 5            | 每页几条

###### Response
```javascript
{
    "status": 200,
    "message": "",
    "data": {
        "total": 4,
        "list": [
            {
                "id": 4,
                "user_id": 3,
                "name": "4444",
                "con": "23423",
                "lordid": "4234234",
                "lorder": "",
                "tag": [
                    "实用"
                ],
                "num_zan": 0,
                "num_ts": 0,
                "num_user": 0,
                "price": "5.00",
                "status": 0,
                "creaded_at": 0,
                "updated_at": 0
            },
            {
                "id": 3,
                "user_id": 3,
                "name": "124",
                "con": "124124",
                "lordid": "124124",
                "lorder": "",
                "tag": [
                    "靠谱",
                    "实用",
                    "真实"
                ],
                "num_zan": 0,
                "num_ts": 0,
                "num_user": 0,
                "price": "0.00",
                "status": 1,
                "creaded_at": 0,
                "updated_at": 0
            },
            {
                "id": 2,
                "user_id": 3,
                "name": "2222",
                "con": "2222",
                "lordid": "222222",
                "lorder": "",
                "tag": [
                    "靠谱",
                    "实用",
                    "真实"
                ],
                "num_zan": 0,
                "num_ts": 0,
                "num_user": 0,
                "price": "0.00",
                "status": 1,
                "creaded_at": 0,
                "updated_at": 0
            },
            {
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
        ]
    }
}
```

###### Data Explain
名称 		 | 类型 			| 说明
------------ | ------------ | ------------
status 	     | Integer 		|  0  1



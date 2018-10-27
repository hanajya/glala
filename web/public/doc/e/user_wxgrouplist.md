# 已加入的群


###### URL
> /api/user/wxgrouplist

###### Method
> POST

###### Params
参数名        | 类型         | 必须         | 默认值       | 说明
------------  | ------------ | ------------ | ------------ | ------------
page          | Integer      | No           | 1            | 第几页
limit         | Integer      | No           | 5            | 每页几条


###### Response
```javascript
{
    "status": 200,
    "message": "",
    "data": {
        "total": 3,
        "list": [
            {
                "id": 3,
                "no": "181026171425365",
                "user_id": 3,
                "wxgroup_id": 3,
                "price": 0,
                "pay": 1,
                "status": 1,
                "create_time": 0,
                "update_time": 0,
                "wxgroup": {
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
                    "creade_time": 0,
                    "update_time": null
                }
            },
            {
                "id": 2,
                "no": "181026171400916",
                "user_id": 3,
                "wxgroup_id": 2,
                "price": 0,
                "pay": 1,
                "status": 1,
                "create_time": 0,
                "update_time": 0,
                "wxgroup": {
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
                    "creade_time": 0,
                    "update_time": null
                }
            },
            {
                "id": 1,
                "no": "181026171400111",
                "user_id": 3,
                "wxgroup_id": 1,
                "price": 0,
                "pay": 1,
                "status": 1,
                "create_time": 0,
                "update_time": 0,
                "wxgroup": {
                    "id": 1,
                    "user_id": 3,
                    "name": "测试22",
                    "con": "hen hao kan ",
                    "lordid": "wixsfd",
                    "lorder": "http://23423423423432434234",
                    "tag": null,
                    "num_zan": 0,
                    "num_ts": 0,
                    "num_user": 0,
                    "price": "0.00",
                    "status": 1,
                    "creade_time": 0,
                    "update_time": "2018-10-26 16:51:59"
                }
            }
        ]
    }
}
```

###### Data Explain
名称 		 | 类型 			| 说明
------------ | ------------ | ------------
id           | Integer      | ID




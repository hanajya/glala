# 我的投诉


###### URL
> /api/user/ts

###### Method
> Get

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
        "total": 4,
        "list": [
            {
                "id": 4,
                "user_id": 3,
                "wxuser_id": 3,
                "wxgroup_id": 3,
                "con": "很不好123123",
                "reply": null,
                "status": 0,
                "create_time": "2018-10-26 17:28:43",
                "update_time": "2018-10-26 17:28:43",
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
                "id": 3,
                "user_id": 3,
                "wxuser_id": 3,
                "wxgroup_id": 3,
                "con": "很不好",
                "reply": null,
                "status": 0,
                "create_time": "2018-10-26 17:28:33",
                "update_time": "2018-10-26 17:28:33",
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
                "user_id": 3,
                "wxuser_id": 3,
                "wxgroup_id": 3,
                "con": "很不好",
                "reply": null,
                "status": 0,
                "create_time": "2018-10-26 17:28:21",
                "update_time": "2018-10-26 17:28:21",
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
                "id": 1,
                "user_id": 3,
                "wxuser_id": 3,
                "wxgroup_id": 1,
                "con": "123123",
                "reply": "问题问题问题",
                "status": 1,
                "create_time": "2018-07-04 16:04:17",
                "update_time": "2018-10-26 11:54:50",
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




# 群对接


###### URL
> /api/wxgroup/list

###### Method
> GET

###### Params
参数名        | 类型         | 必须         | 默认值       | 说明
------------  | ------------ | ------------ | ------------ | ------------
order         | Integer      | No           | 0            | 0综合 1 人气 2附近
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
                "id": 5,
                "user_id": 30,
                "name": "5235",
                "con": "235235235",
                "lordid": "2354235325",
                "lorder": "http://image.qlala.com/20181025\\e7e5eb340e7fecaaf9b0ff4c4211b9b8.jpg",
                "tag": [
                    "实用"
                ],
                "num_zan": 2,
                "num_ts": 2,
                "num_user": 5,
                "price": "10.00",
                "sort": 0,
                "status": 1,
                "creade_time": 0,
                "update_time": null
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
                "sort": 0,
                "status": 1,
                "creade_time": 0,
                "update_time": null
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
                "sort": 0,
                "status": 1,
                "creade_time": 0,
                "update_time": null
            },
            {
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
                "sort": 0,
                "status": 1,
                "creade_time": 0,
                "update_time": "2018-10-26 16:51:59"
            }
        ]
    }
}
```

###### Data Explain
名称 		 | 类型 			| 说明
------------ | ------------ | ------------
id           | Integer      | ID




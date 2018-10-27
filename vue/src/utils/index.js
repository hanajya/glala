/**
 * 验证手机号
 *
 * @param  string   mobile   手机号
 * @return boolean
 */
export function validateMobile(mobile)
{
	return /^(1[3-9][0-9])\d{8}$/ig.test(mobile);
}

/**
 * 日期时间转时间差格式
 * 
 * @param  string  datetime  日期时间
 * @return string
 */
export function datetimeFormat(datetime)
{
    if (!datetime)
        return '-';
    var diff = new Date().getTime() - Date.parse(new Date(datetime)),
        minute = 1000 * 60,
        hour   = minute * 60,
        day    = hour * 24,
        month  = day * 30,
        monthC = diff / month,
        weekC  = diff / (7 * day),
        dayC   = diff / day,
        hourC  = diff / hour,
        minC   = diff / minute;

    switch (true)
    {
        case monthC > 12:
            return parseInt(monthC / 12) + '年前';

        case monthC >= 1:
            return parseInt(monthC) + '月前';

        case weekC >= 1:
            return parseInt(weekC) + '周前';

        case dayC >= 1:
            return parseInt(dayC) + '天前';

        case hourC >= 1:
            return parseInt(hourC) + '小时前';

        case minC > 1:
            return parseInt(minC) + '分钟前';

        case minC <= 1:
            return '刚刚';

        default: 
            return datetime;
    }
}

/**
 * 加载外部JS文件
 *
 * @param  string    src        请求地址
 * @param  function  callback   回调函数
 */
export function loadScript(src, callback)
{
    var script = document.createElement('script');
    var loaded = false;

    script.setAttribute('src', src);
    if (callback)
	{
        script.onload = function()
		{
            if (!loaded)
			{
                callback();
            }

            loaded = true;
        };
    }
    document.getElementsByTagName('head')[0].appendChild(script);
}
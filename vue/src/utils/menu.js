export default [
	{
        label: '控制台',
        icon : 'stats-bars',
        route  : '/'
    },
    {
        label: '系统配置',
        icon : 'ios-gear',
        children: [
            {label: '管理员', route: '/admin'},
            {label: '系统设置', route: '/setting'},
            /*{label: '微信帐号配置',route:'/wxconfig'}*/
        ]
    },
    {
        label:'用户管理',
        icon:'person',
        children: [
            {label:'用户列表',route:'/user'},
            {label:'提现管理',route:'/withdraw'},
            /*{label:'部门',route:'/department'},
            {label:'导入账号',route:'/qyphone'},*/
        ]
    },
    {
        label:'群管理',
        icon:'home',
        children: [
            {label:'群列表',route:'/wxgroup'},
            {label:'标签',route:'/tags'},
            {label:'投诉管理',route:'/complaints'},
        ]
    },
    {
        label:'广告位管理',
        icon:'ionic',
        children: [
            {label:'广告列表',route:'/adv'}
        ]
    }
]

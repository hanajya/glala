/**
 * 配置
 */
export default [
    {
        path: '/setting',
        component: resolve => require(['@/pages/setting/Index.vue'], resolve),
	    meta: {
	    title: '系统设置'
	}
},
{
    path: '/setting/create',
        component: resolve => require(['@/pages/setting/Form.vue'], resolve),
	    meta: {
	    title: '添加配置项'
	}
}
];
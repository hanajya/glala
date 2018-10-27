/**
 * 广告位
 */
export default [
    {
        path: '/adv',
        component: resolve => require(['@/pages/adv/Index.vue'], resolve),
        meta: {
            title: '广告管理'
        }
    },
    {
        path: '/adv/create',
        component: resolve => require(['@/pages/adv/Form.vue'], resolve),
        meta: {
            title: '添加广告'
        }
    },
    {
        path: '/adv/update/:id',
        component: resolve => require(['@/pages/adv/Form.vue'], resolve),
        meta: {
            title: '修改广告'
        }
    },
];
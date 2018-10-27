/**
 * 微信群
 */
export default [
    {
        path: '/wxgroup',
        component: resolve => require(['@/pages/wxgroup/Index.vue'], resolve),
        meta: {
            title: '群列表'
        }
    },
    {
        path: '/wxgroup/create',
        component: resolve => require(['@/pages/wxgroup/Form.vue'], resolve),
        meta: {
            title: '添加群'
        }
    },
    {
        path: '/wxgroup/update/:id',
        component: resolve => require(['@/pages/wxgroup/Form.vue'], resolve),
        meta: {
            title: '修改群'
        }
    }
];
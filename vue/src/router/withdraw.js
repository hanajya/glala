/**
 * 提现
 */
export default [
    {
        path: '/withdraw',
        component: resolve => require(['@/pages/withdraw/Index.vue'], resolve),
        meta: {
            title: '提现列表'
        }
    },
    {
        path: '/tags/update/:id',
        component: resolve => require(['@/pages/withdraw/Form.vue'], resolve),
        meta: {
            title: '查看提现'
        }
    }
];
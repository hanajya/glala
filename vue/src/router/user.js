/**
 * 用户
 */
export default [
    {
        path: '/user',
        component: resolve => require(['@/pages/user/Index.vue'], resolve),
        meta: {
            title: '用户列表'
        }
    },
    {
        path: '/user/update/:id',
        component: resolve => require(['@/pages/user/Form.vue'], resolve),
        meta: {
            title: '修改会员'
        }
    }
];
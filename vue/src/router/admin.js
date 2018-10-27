/**
 * 管理员
 */
export default [
    {
        path: '/admin',
        component: resolve => require(['@/pages/admin/Index.vue'], resolve),
        meta: {
            title: '管理员管理'
        }
    },
    {
        path: '/admin/create',
        component: resolve => require(['@/pages/admin/Form.vue'], resolve),
        meta: {
            title: '添加管理员'
        }
    },
    {
        path: '/admin/update/:id',
        component: resolve => require(['@/pages/admin/Form.vue'], resolve),
        meta: {
            title: '修改管理员'
        }
    },
   /* {
        path: '/admin/auth/:id',
        component: resolve => require(['@/pages/admin/Auth.vue'], resolve),
        meta: {
            title: '设置权限'
        }
    }*/
];
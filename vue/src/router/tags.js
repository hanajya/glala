/**
 * tags
 */
export default [
    {
        path: '/tags',
        component: resolve => require(['@/pages/tags/Index.vue'], resolve),
        meta: {
            title: '标签列表'
        }
    },
    {
        path: '/tags/create',
        component: resolve => require(['@/pages/tags/Form.vue'], resolve),
        meta: {
            title: '添加标签'
        }
    },
    {
        path: '/tags/update/:id',
        component: resolve => require(['@/pages/tags/Form.vue'], resolve),
        meta: {
            title: '修改标签'
        }
    }
];
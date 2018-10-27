/**
 * 投诉
 */
export default [
    {
        path: '/complaints',
        component: resolve => require(['@/pages/complaints/Index.vue'], resolve),
        meta: {
            title: '投诉列表'
        }
    },
    {
        path: '/complaints/update/:id',
        component: resolve => require(['@/pages/complaints/Form.vue'], resolve),
        meta: {
            title: '查看投诉'
        }
    }
];
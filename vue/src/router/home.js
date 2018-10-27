/**
 * 首页
 */
export default [
    {
        path: '/',
        component: resolve => require(['@/pages/home/Index.vue'], resolve),
        meta: {
            title: '控制台'
        }
    },
    {
        path: '/profile',
        component: resolve => require(['@/pages/home/Profile.vue'], resolve),
        meta: {
            title: '个人信息'
        }
    }
];
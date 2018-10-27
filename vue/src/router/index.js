import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import iView from 'iview'



Vue.use(Router)


import Home  from './home';
import Admin from './admin';
import Setting from './setting';
import User  from './user';
import Adv   from './adv';
import Wxgroup   from './wxgroup';
import Complaints   from './complaints';
import Tags   from './tags';
import Withdraw   from './withdraw';

const index_routes = [].concat(
	Home,
    Admin,
    Setting,
    User,
    Adv,
    Wxgroup,
    Complaints,
    Tags,
    Withdraw
)

const $router = new Router({
    routes: [
        {
            path: '/',
            component: (resolve) => require(['@/pages/Index.vue'], resolve),
            children: index_routes,
            meta: {
                title: '后台管理系统'
            },
        },
        {
            path: '/login',
            component: resolve => require(['@/pages/Login.vue'], resolve),
            meta: {
                title: '登录'
            }
        }
    ]
})

// Before router
$router.beforeEach((to, form, next) => {
    iView.LoadingBar.start();
    //add
    // console.log(to)
    // var url = to.path;
    // http.get('/admin/ruleok?url='+url)
    //     .then(res => {
    //         if( res.data==0 ){
    //             iView.Message.success({ content: '没有权限', duration: 3 });
    //             return false;
    //         }
    //         console.log(res.data)
    //     })

    next();
})

// After router
$router.afterEach(route => {
    document.title = route.meta.title;
    iView.LoadingBar.finish();
})

export default $router;
/*export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    }
  ]
})
*/
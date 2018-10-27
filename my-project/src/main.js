import Vue from 'vue'
import App from '@/App'
import store from '@/store'
import http from '@/http'

import '../css/common.css';

Vue.config.productionTip = false
App.store = store
App.mpType = 'app'

const app = new Vue(App)
Vue.prototype.$http = http;
app.$mount()

/*export default {
    // 这个字段走 app.json
    config: {
        // "usingComponents": {
        //     "ec-canvas": "../static/ec-canvas/ec-canvas"
        // },
        pages: [
            '^pages/index',
        ],
        window: {
            backgroundTextStyle: 'light',
            navigationBarBackgroundColor: '#fff',
            navigationBarTitleText: 'WeChat',
            navigationBarTextStyle: 'black'
        },
        tabBar:{
            color:"#6A7D8F",
            selectedColor:"#fff",
            borderStyle:"black",
            "list":[
                {
                    pagePath:'pages/index',
                    text:'头条',
                    iconPath:'/static/new.png',
                    selectedIconPath:'/static/new-activity.png',
                },
                {
                    pagePath:'pages/possess/index',
                    text:'发现',
                    iconPath:'/static/find.png',
                    selectedIconPath:'/static/find-activity.png',
                },
                {
                    pagePath:'pages/member/index',
                    text:'我的',
                    iconPath:'/static/my.png',
                    selectedIconPath:'/static/my-activity.png',
                },
            ]
        },
        enablePullDownRefresh:true,
        onReachBottomDistance:true,
    }
}*/
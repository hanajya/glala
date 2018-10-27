// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import iView from 'iview'
import router from './router'
import store from './store'
import http   from './http';


import 'iview/dist/styles/iview.css';
import './styles/theme.less';
import './styles/common.css';

Vue.use(iView);

Vue.prototype.$http = http;

//Vue.config.productionTip = false

new Vue({
	el     : 'app',
	router : router,
	store  : store,
	render : h => h(App)
});

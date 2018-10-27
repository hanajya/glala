import Axios   from 'axios';
import iView   from 'iview';
import $store  from '@/store';
import $router from '@/router';


const $http = Axios.create({
	baseURL: process.env.API_URL
});

// Before request
$http.interceptors.request.use(
    config => {
        $store.commit('loading', true);
        var token = window.localStorage.getItem('token');
        if (token)
        {
            config.headers.Authorization = token;
        }
        
        return config;
    },
    error => {
        $store.commit('loading', false);
        return Promise.reject(error);
    }
);

// After request
$http.interceptors.response.use(
    response => {
        $store.commit('loading', false);

        let data = response.data;

        switch (data.status)
        {
			// Success
			case 200:
				data.message != '' && iView.Message.success({ content: data.message, duration: 3 });
				return data;

			// Error
			case 400:
                data.message !== '' && iView.Modal.error({content : data.message});
				return new Promise(() => {});

            // No access
            case 403:
			// 404
			case 404:
			// Fail
			case 500:
                iView.Modal.error({
                    title   : 'Error',
                    content : data.message,
                    onOk: () => {
                        $router.back();
                    }
                });
                return new Promise(() => {});

			// not logged
            case 100:
                data.message !== '' && iView.Message.error({ content: data.message, duration: 3 });
                $store.dispatch('logout');
                $router.replace('/login?redirect=' + $router.currentRoute.fullPath);
				return new Promise(() => {});

            default:
                iView.Modal.error({ content: data });
				return new Promise(() => {});
        }
    },
    error => {
        $store.commit('loading', false);
		iView.Modal.error({ title: 'Error', content: error.message });
        return Promise.reject(error);
    }
);

export default $http;
var Fly   = require('flyio/dist/npm/wx'),
	$http = new Fly;

$http.config.baseURL = 'http://backend.qlala.com/';
// $http.config.baseURL = 'https://api.product.com';

// before request
$http.interceptors.request.use(request => {
	const token = wx.getStorageSync('token');
    token && (request.headers['Authorization'] = token);
    return request;
})

// after request
$http.interceptors.response.use(
    res => {
        const data = res.data;
        switch (data.status)
        {
            // 操作成功
            case 200:
                data.message != '' && wx.showToast({title:data.message,icon:'success' ,uration:3000,});
                return data;
            // 操作失败
            case 400:
                data.message != '' && wx.showToast({title:data.message,icon:'none' ,uration:3000,});
                return new Promise(() => {});
            //没有权限
            case 403:
                wx.showModal({
                    title: '提示',
                    content: data.message,
                    success:res=> {}
                })
                return false;
            // 404
            case 404:
            // 系统发生错误
            case 500:
                data.message != '' && wx.showToast({title:data.message,icon:'none' ,uration:3000,});
                return new Promise(() => {});
            // 未登录
            case 100:
                //data.message != '' && wx.showToast({title:data.message,icon:'info' ,uration:3000,});
                //console.log(1)
                wx.navigateTo({'url': '/pages/login'});
                return new Promise(() => {});
            default:
                return new Promise(() => {});
        }
    },
    err => {
        // $modal.alert(err.message);
        return new Promise(() => {});
    }
)
export default $http;
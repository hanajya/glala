export default {
	/**
	 * 登录
	 */
	login({ commit, state }, data)
	{
		window.localStorage.setItem('token', data.token);
		commit('logged', true);
		commit('admin', data.admin);
	},

	/**
	 * 退出登录
	 */
	logout({ commit, state })
	{
		window.localStorage.removeItem('token');
		commit('logged', false);
		commit('admin', null);
	}
}
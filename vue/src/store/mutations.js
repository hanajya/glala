export default {
	loading(state, status)
	{
		state.loading = status;
	},

	logged(state, status)
	{
		state.logged = status;
	},

	admin(state, data)
	{
		state.admin = data;
	},

	breadcrumb(state, data)
	{
		state.breadcrumb = data;
	}
}
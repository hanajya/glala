<template>
	<section v-if="data">
		<Button type="ghost" icon="chevron-left" @click="$router.back()" class="mb15"></Button>

		<Card :bordered="false" class="w50pct block-center">
			<Form label-position="top">
				<FormItem label="用户名">
		            {{ data.username }} <Button @click="flag = true" v-if="!flag" class="ml25" size="small">修改密码</Button>
		        </FormItem>
		        <template v-if="flag">
		        	<FormItem label="新密码">
			            <Input type="password" v-model="form.password" autofocus @on-enter="submit"></Input>
			        </FormItem>
			        <FormItem label="确认密码">
			            <Input type="password" v-model="password" @on-enter="submit"></Input>
			        </FormItem>
			        <FormItem>
			            <Button type="success" @click="submit">保存修改</Button>
			            <Button @click="flag = false" class="ml15">取消</Button>
			        </FormItem>
		        </template>

		        <FormItem label="最后登录时间">
		            {{ data.login_at }}
		        </FormItem>
		        <FormItem label="创建时间">
		            {{ data.created_at }}
		        </FormItem>
		        <FormItem label="修改时间">
		            {{ data.updated_at }}
		        </FormItem>
			</Form>
		</Card>
	</section>
</template>

<script>
	export default {
		data()
		{
			return {
				data     : null,
				flag     : false,
				password : '',
				form: {
					password: ''
				}
			}
		},
		created()
		{
			this.loadData();
		},
		methods: {
			loadData()
			{
				this.$http.get('admin/system/profile')
					.then(res => {
						this.data = res.data;
					})
			},
			submit()
			{
				if (!this.form.password || this.form.password.length < 5)
					return this.$Message.error('密码不能小于5位');

				if (this.form.password != this.password)
					return this.$Message.error('两次密码不一致');

				this.$Modal.confirm({
					content: '确定要修改密码吗？',
					onOk: () => {
						this.$http.post('admin/system/profile', this.form)
							.then(res => {
								this.$store.dispatch('logout');
								this.$router.replace('/login');
							})
					}
				})
			}
		}
	}
</script>
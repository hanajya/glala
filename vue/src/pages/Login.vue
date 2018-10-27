<template>
	<section class="row mb0">
		<div class="col s8">
			<div class="login-bg pos-rel">
				<div class="login-logo pos-abs circle bg-white pt10 pr10 pb10 pl10 ">
					<img src="../assets/logo.png" alt="Logo" class="responsive-img circle">
				</div>
			</div>
		</div>
		<div class="col s4 bg-white pt45">
			<Form :model="form" label-position="top" class="container">
				<legend class="mt45 mb45 fs24">后台管理</legend>
		        <FormItem label="账号">
		            <Input v-model="form.username" @on-enter="submit" autofocus placeholder="账号"></Input>
		        </FormItem>
		        <FormItem label="密码">
		            <Input type="password" v-model="form.password" @on-enter="submit" placeholder="密码"></Input>
		        </FormItem>
		        <FormItem>
		            <div class="row">
		            	<div class="col s4">
		            		<Button type="primary" icon="log-in" @click="submit">登 录</Button>
		            	</div>
		            	<div class="col s8">
		            		<Alert type="error" show-icon v-if="error">{{ error }}</Alert>
		            	</div>
		            </div>
		        </FormItem>
		    </Form>
		</div>
	</section>
</template>

<script>
	export default {
		data()
		{
			return {
				form: {
					username: '',
					password: ''
				},
				error: ''
			}
		},
		methods: {
			submit()
			{
				if (!this.form.username)
					return this.error = '请输入用户名';

				if (!this.form.password)
					return this.error = '请输入密码';

				this.error = '';
				this.$http.post('admin/login/signin', this.form)
					.then(res => {
						this.$store.dispatch('login', res.data);
						this.$router.replace(this.$route.query.redirect ? this.$route.query.redirect : '/');
					})
			}
		}
	}
</script>

<style>
	.login-bg {
		width: 100%;
		height: 100vh;
		background: url('../assets/login-bg.jpg') no-repeat center center / cover;
	}

	.login-logo {
		width: 120px;
		height: 120px;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
	}
</style>
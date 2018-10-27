<template>
	<div>
		<Button type="ghost" icon="chevron-left" @click="$router.back()" class="mb15"></Button>

		<Form ref="form" :model="form" :rules="validate" :label-width="80" class="w50pct block-center">
	        <FormItem label="用户名" prop="username">
	            <Input type="text" v-model="form.username"></Input>
	        </FormItem>
	        <FormItem label="密码" prop="password">
	            <Input type="password" v-model="form.password"></Input>
	        </FormItem>
	        <FormItem label="状态">
		        <i-switch v-model="form.status" :true-value="1" :false-value="0" size="large">
	                <span slot="open">正常</span>
	                <span slot="close">锁定</span>
	            </i-switch>
        	</FormItem>

	        <FormItem class="pt15">
	            <Button type="primary" icon="archive" long @click="submit" v-if="!id">确认添加</Button>
	            <Button type="success" icon="archive" long @click="submit" v-else>保存修改</Button>
	        </FormItem>
		</Form>

	</div>
</template>

<script>
	export default {
		data()
		{
			return {
				id: this.$route.params.id,
				form: {
					username : '',
					password : '',
					status   : 1
				},
				validate: {
                    username: [
                        { required: true, message: '请输入用户名', trigger: 'blur' }
                    ],
                    password: [
                        { required: true, message: '请输入密码', trigger: 'blur' }
                    ]
                }
			}
		},
		created()
		{
			this.id && this.loadDetail();
		},
		methods: {
			loadDetail()
			{
				this.$http.get('admin/admin/update/id/' + this.id)
					.then(res => {
						this.form = res.data;
					})
			},
			submit()
			{
				this.$refs['form'].validate((valid) => {
                    if (valid)
                    {
                    	const url = 'admin/admin/' + (this.id ? 'update/id/' + this.id : 'create');
                        this.$http.post(url, this.form)
                        	.then(res => {
                        		this.$router.back();
                        	})
                    }
                })
			}
		}
	}
</script>

<template>
	<div>
		<Button type="ghost" icon="chevron-left" @click="$router.back()" class="mb15"></Button>

		<Form ref="form" :model="form" :rules="validate" :label-width="80" class="w50pct block-center">
	        <FormItem label="投诉会员" prop="user_id">
	            <Input type="text" v-model="form.user_id"></Input>
	        </FormItem>
	        <FormItem label="投诉群">
	            <Input type="text" v-model="form.wxgroup_id"></Input>
	        </FormItem>
	        <FormItem label="投诉内容">
	            <Input type="textarea" v-model="form.con"></Input>
	        </FormItem>
	        <FormItem label="回复">
	            <Input type="textarea" v-model="form.reply"></Input>
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
				auth:[],
				form: {
					user_id : '',
					wxgroup_id : '',
					con : '',
					reply : '',
					status   : 1,
					userinfo:[]
				},
				validate: {
                    user_id: [
                        { required: true, message: '请输入用户名', trigger: 'blur' }
                    ]
                }
			}
		},
		created()
		{
		},
		mounted () {
			this.id && this.loadDetail() 
		},
		methods: {
			loadDetail()
			{
				this.$http.get('/admin/complaints/update/id/' + this.id)
					.then(res => {
						this.form = res.data;
					})
			},
			submit()
			{
				this.$refs['form'].validate((valid) => {
                    if (valid)
                    {
                    	const url = '/admin/complaints/' + (this.id ? 'update/id/' + this.id : 'create');
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
<style>
.tx { width: 80px; height: 80px; }	
</style>
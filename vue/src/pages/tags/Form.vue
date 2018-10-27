<template>
	<div>
		<Button type="ghost" icon="chevron-left" @click="$router.back()" class="mb15"></Button>

		<Form ref="form" :model="form" :rules="validate" :label-width="100" class="w50pct block-center">
	        <FormItem label="群名称" prop="name">
	            <Input type="text" v-model="form.name"></Input>
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
import Upload from '@/components/Upload';
	export default {
		components:{
            Upload
        },
		data()
		{
			return {
				id: this.$route.params.id,
				size:[400,400],
				thumd:[400,400],
				tags:[],
				form: {
					name : '',
					status   : 1,
				},
				validate: {
                    name: [
                        { required: true, message: '请输入标签', trigger: 'blur' }
                    ]
                }
			}
		},
		created()
		{
			this.id && this.loadDetail() 
		},
		mounted () {
		},
		methods: {
			loadDetail()
			{
				this.$http.get('/admin/tags/update/id/' + this.id)
					.then(res => {
						this.form = res.data;
					})
			},
			submit()
			{
				this.$refs['form'].validate((valid) => {
                    if (valid)
                    {
                    	const url = '/admin/tags/' + (this.id ? 'update/id/' + this.id : 'create');
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
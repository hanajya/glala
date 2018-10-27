<template>
	<div>
		<Button type="ghost" icon="chevron-left" @click="$router.back()" class="mb15"></Button>

		<Form ref="form" :model="form" :rules="validate" :label-width="100" class="w50pct block-center">
			<FormItem label="发布会员ID" prop="user_id">
	            <Input type="text" v-model="form.user_id"></Input>
	        </FormItem>
	        <FormItem label="群名称" prop="name">
	            <Input type="text" v-model="form.name"></Input>
	        </FormItem>
	        <FormItem label="简介">
	            <Input type="textarea" v-model="form.con" :autosize="{minRows: 2,maxRows: 5}" placeholder="Enter something..."></Input>
	        </FormItem>
	        <FormItem label="群主微信号" prop="lordid">
	            <Input type="text" v-model="form.lordid"></Input>
	        </FormItem>
	        <FormItem label="图片">
	            <upload :size="size" :thumd="thumd" v-model="form.lorder"></upload>
	            大小：400*400px
	        </FormItem>
	        <FormItem label="标签">
	            <Select v-model="form.tag" multiple style="width:260px">
			        <Option v-for="item in tags" :value="item.value" :key="item.value">{{ item.label }}</Option>
			    </Select>
	        </FormItem>
	        <FormItem label="进群价格">
	            <Input type="text" v-model="form.price"></Input>
	        </FormItem>
	        <FormItem label="点赞数">
	            <InputNumber :min="0" v-model="form.num_zan"></InputNumber>
	        </FormItem>
	        <FormItem label="投诉量">
	            <InputNumber :min="0" v-model="form.num_ts"></InputNumber>
	        </FormItem>
	        <FormItem label="加群人数">
	            <InputNumber :min="0" v-model="form.num_user"></InputNumber>
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
					user_id:3,
					name : '',
					con : '',
					lordid : '',
					lorder : '',
					tag : [],
					price : '',
					num_zan : 0,
					num_ts : 0,
					num_user : 0,
					status   : 1,
				},
				validate: {
                    name: [
                        { required: true, message: '请输入群名称', trigger: 'blur' }
                    ]
                }
			}
		},
		created()
		{
			this.id && this.loadDetail() 
		},
		mounted () {
			this.tags = [
				{
                    value: '靠谱',
                    label: '靠谱'
                },
                {
                    value: '实用',
                    label: '实用'
                },
                {
                    value: '真实',
                    label: '真实'
                },
			];
		},
		methods: {
			loadDetail()
			{
				this.$http.get('/admin/wxgroup/update/id/' + this.id)
					.then(res => {
						this.form = res.data;
					})
			},
			submit()
			{
				this.$refs['form'].validate((valid) => {
                    if (valid)
                    {
                    	const url = '/admin/wxgroup/' + (this.id ? 'update/id/' + this.id : 'create');
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
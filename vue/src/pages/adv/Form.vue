<template>
	<div>
		<Button type="ghost" icon="chevron-left" @click="$router.back()" class="mb15"></Button>

		<Form ref="form" :model="form" :rules="validate" :label-width="80" class="w50pct block-center">

			<FormItem label="广告位置" prop="adv_position_id">
	            <Select v-model="form.adv_position_id" placeholder="请选择广告位置">
	                <Option v-for="(item ,index) in advType" :key="index" :value="index">{{item}}</Option>
	            </Select>
	        </FormItem>
	         <FormItem label="图片" prop="pic">
	            <upload :size="size" :thumd="thumd" v-model="form.pic"></upload>
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
				advType: [],
				size:[414,231],
				thumd:[414,231],
				adv_position_id:'1',
				form: {
					pic:'',
					status   : 1,
					adv_position_id : '',
				},
				validate: {
                    adv_position_id: [
                        { required: true, message: '请选择广告位置', trigger: 'blur' }
                    ],
                    pic: [
                        { required: true, message: '请上传图片', trigger: 'blur' }
                    ]
                }
			}
		},
		created()
		{
			this.id && this.loadDetail();
			this.getAdvType();
		},
		methods: {
			getAdvType() {
				this.$http.get('admin/adv/getAdvType').then( res => {
					this.advType = res.data;
				})
			},
			loadDetail()
			{
				this.$http.get('admin/adv/update/id/' + this.id)
					.then(res => {
						this.form = res.data;
						this.form.adv_position_id = res.data.adv_position_id.toString();
					})
			},
			submit()
			{	
				this.$refs['form'].validate((valid) => {
                    if (valid)
                    {
                    	const url = 'admin/adv/' + (this.id ? 'update/id/' + this.id : 'create');
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

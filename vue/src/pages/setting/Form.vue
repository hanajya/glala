<template>
	<div>
		<Button type="ghost" icon="chevron-left" @click="$router.back()" class="mb15"></Button>

		<Form ref="form" :model="form" :rules="validate" :label-width="80" class="w50pct block-center">
			<FormItem label="分组" prop="group">
	            <Select v-model="form.group">
	                <Option :value="key" v-for="(item, key) in selector.groups" :key="key">{{ item }}</Option>
	            </Select>
	        </FormItem>
			<FormItem label="名称" prop="name">
	            <Input type="text" v-model="form.name"></Input>
	        </FormItem>
	        <FormItem label="调用名" prop="key">
	            <Input type="text" v-model="form.key"></Input>
	        </FormItem>
	        <FormItem label="类型" prop="type">
	            <Select v-model="form.type">
	                <Option :value="item" v-for="item in selector.types" :key="item">{{ item.substr(0, 1).toUpperCase() + item.substr(1) }}</Option>
	            </Select>
	        </FormItem>
	        <FormItem label="可选项" v-show="showOptions">
	            <Input type="textarea" v-model="form.options" :rows="4"></Input>
	        </FormItem>
	        <FormItem label="提示">
	            <Input type="textarea" v-model="form.tips"></Input>
	        </FormItem>
	        <FormItem label="排序">
	            <Input-number v-model="form.sort"></Input-number>
	        </FormItem>
			<FormItem class="pt15">
	            <Button type="primary" icon="archive" long @click="submit">确认添加</Button>
	        </FormItem>
		</Form>
	</div>
</template>

<script>
	export default {
		data()
		{
			return {
				form: {
					group   : '',
					type    : '',
					key     : '',
					value   : '',
					options : '',
					tips    : '',
					sort    : 1
				},
				validate: {
					group: [
                        { required: true, message: '请选择配置分组', trigger: 'change' }
                    ],
                    name: [
                        { required: true, message: '请输入配置名称', trigger: 'blur' }
                    ],
                    key: [
                        { required: true, message: '请输入调用名称', trigger: 'blur' }
                    ],
                    type: [
                        { required: true, message: '请先择类型', trigger: 'change' }
                    ]
                },
                selector: {groups: [], types: []},
                showOptions: false,
                optionsTips: "key1|value1\nkey2|value2"
			}
		},
		created()
		{
			this.loadSelector();
		},
		methods: {
			loadSelector()
			{
				this.$http.get('admin/setting/create')
					.then(res => {
						this.selector = res.data;
					})
			},
			submit()
			{

				this.$refs['form'].validate((valid) => {
                    if (valid)
                    {
                        this.$http.post('admin/setting/create', this.form)
                        	.then(res => {
                        		this.$router.back();
                        	})
                    }
                })
			}
		},
		watch: {
			'form.type'(value)
			{
				switch(value)
				{
					case 'select':
					case 'radio':
					case 'checkbox':
					case 'switch':
						if (this.form.options == '')
							this.form.options = this.optionsTips;

						this.showOptions = true;
						break;

					default:
						this.showOptions  = false;
						this.form.options = '';
						break;
				}
			}
		}
	}
</script>
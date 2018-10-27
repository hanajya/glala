<template>
	<div>
		<Button type="ghost" icon="chevron-left" @click="$router.back()" class="mb15"></Button>

		<Form ref="form" :model="form" :label-width="80" class="w50pct block-center">
	        <FormItem label="用户名">
	            <Input type="text" v-model="form.username" readonly></Input>
	        </FormItem>
	        <FormItem label="权限">
	        	<Tree :data="data4" show-checkbox multiple ref="tree"></Tree>
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
				},
				data4 : []
			}
		},
		created()
		{
			this.id && this.loadDetail();
			this.loadRule();
		},
		methods: {
			loadDetail()
			{
				this.$http.get('admin/admin/update/id/' + this.id)
					.then(res => {
						this.form = res.data;
					})
			},
			loadRule()
			{
				this.$http.get('admin/admin/menulist/id/' + this.id)
					.then(res => {
						this.data4 = res.data;
					})
			},
			submit()
			{
                var nodes=this.$refs.tree.getCheckedNodes();
                var ids = '';
                for (var k = 0, length = nodes.length; k < length; k++) {
                	ids += ids ? ','+nodes[k]['id'] : nodes[k]['id'];
				}
                console.log(ids);
                const url = 'admin/admin/setrule/id/' + this.id;
                this.$http.post(url, {ids:ids})
                	.then(res => {
                		this.$router.back();
                	})
			}
		}
	}
</script>

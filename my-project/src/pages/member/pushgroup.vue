<template>
	<div class="member-joingroup">
		<i-cell-group>
			<i-cell is-link url="/pages/member/groupinfo">
				<span class="ml10">
					<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
				</span>
				<span class="inline-block ml5">
					群名称
				</span>
				<span class="inline-block fr gray mt5">未审核</span>
			</i-cell>
			<i-cell is-link url="/pages/member/groupinfo">
				<span class="ml10">
					<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
				</span>
				<span class="inline-block ml5">
					群名称
				</span>
				<span class="inline-block fr gray mt5">未审核</span>
			</i-cell>
			<i-cell is-link url="/pages/member/groupinfo">
				<span class="ml10">
					<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
				</span>
				<span class="inline-block ml5">
					群名称
				</span>
				<span class="inline-block fr gray mt5">审核成功</span>
			</i-cell>
			<i-cell is-link url="/pages/member/groupinfo">
				<span class="ml10">
					<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
				</span>
				<span class="inline-block ml5">
					群名称
				</span>
				<span class="inline-block fr gray mt5">审核成功</span>
			</i-cell>
			<i-cell></i-cell>
		</i-cell-group>
		<i-button @click="handleClick" type="primary">发布群链接</i-button>
	</div>
</template>

<script>
	export default {
		components: {

		},
		data () {
			return {

			}
		},
		methods:{
			handleClick() {
				wx.navigateTo({
					url:'/pages/member/uploadgroup'
				})
			}
		}
	}
</script>

<style lang="less">
	.gray {
		color:#999;
	}
</style>
<template>
	<div class="member-modify">
		<i-cell-group>
			<i-cell is-link url="/pages/upload/avatar">
				<span>头像</span>
				<span class="inline-block fr">
					<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
				</span>
			</i-cell>
			<i-input placeholder="昵称" value="Skuya" />
			<i-cell title="个性签名:">
				<span class="gray">
					<i-input placeholder="个人简介/产品简介" value="每次杀不死你，杀不死你，也医好你" />
				</span>
			</i-cell>

		</i-cell-group>
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

		}
	}
</script>
<style lang="less">
	.member-modify {
		color:#000;
		.gray {
			color:#999;
		}
	}
</style>
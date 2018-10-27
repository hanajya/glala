<template>
	<div class="group-detail">
		<i-cell-group>
			<i-cell>
				<span>群名称</span>
				<span class="block fr">发财之道</span>
			</i-cell>
			<i-cell title="简介">
				<span class="gray">
					发财之道发财之道
					发财之道发财之道
					发财之道发财之道
				</span>
			</i-cell>
			<i-cell>
				<span>群主微信号</span>
				<span class="inline-block fr">Felivehero</span>
			</i-cell>
			<i-cell>
				<span>群主二维码</span>
				<span class="inline-block fr">这是二维码ICON</span>
			</i-cell>
			<i-cell></i-cell>
		</i-cell-group>
		<i-button @click="handleClick" type="primary" >保存</i-button>
		<i-button @click="handleClick" type="default" >取消</i-button>
		</div>
	</div>
</template>
<script>
	export default {
		components: {

		},
		data () {
			return {
			
			}
		}
	}
</script>
<style lang="less">
	.group-detail {
		.font-color {
			color:#FF6633;
		}
		.gray {
			color: #999;
		}
		.footer {

		}
	}
</style>
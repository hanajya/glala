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
			
			<template v-if="pay">
				<i-cell>
					<span>打赏金额</span>
					<span class="inline-block fr font-color">已支付</span>
				</i-cell>
				<i-cell>
					<span>群主微信号</span>
					<span class="inline-block fr">Felivehero</span>
				</i-cell>
				<i-cell>
					<span>群主二维码</span> 
					<span class="inline-block fr">这是二维码ICON</span>
				</i-cell>
			</template>
			<template v-else>
				<i-cell title="管理员已经入群监督"></i-cell>
				<i-cell>
					<span>打赏金额</span>
					<span class="inline-block fr font-color">10.00元</span>
				</i-cell>
			</template>
			<i-cell></i-cell>
		</i-cell-group>
		<div class="footer">
			<template v-if="pay">
				<i-button @click="handleClick" type="primary" >确认进群</i-button>
				<i-button @click="handleClick" type="default" >投诉群主</i-button>
			</template>
			<template v-else>
				<i-button @click="handleClick" type="primary" >确认支付</i-button>
			</template>
			
		</div>
	</div>
</template>
<script>
	export default {
		components: {

		},
		data () {
			return {
				pay : true
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
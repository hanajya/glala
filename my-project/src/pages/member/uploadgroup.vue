<template>
	<div class="member-uploadgroup">
		<i-cell-group>
			<!-- <i-cell is-link url="/pages/upload/avatar">
				<span>头像</span>
				<span class="inline-block fr">
					<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
				</span>
			</i-cell> -->
			<i-cell>
				<span>群名称</span>
				<span class="inline-block fr">
					<view class="section">
					   	<input type="text" class="align-right gray" value="Skuya" auto-focus/>
					</view>
				</span>		
			</i-cell>
			<i-cell title="简介">
				<span class="gray">
					每次杀不死你，杀不死你，也医好你
				</span>
			</i-cell>
			<i-cell>
				<span>群主微信号</span>
				<span class="inline-block fr">
					<view class="section">
					   	<input type="text" class="align-right gray" value="Felivehero" auto-focus/>
					</view>
				</span>
				
			</i-cell>
			<i-cell is-link>
				<span>群主二维码</span>
				<span class="inline-block fr gray">应该是生成二维码</span>
			</i-cell>
			<i-cell></i-cell>
			<i-button @lick="handleClick" type="primary">上传</i-button>
		</i-cell-group>
	</div>
</template>

<style lang="less">
	.member-uploadgroup {
		.gray {
			color: #999;
		}
	}
</style>
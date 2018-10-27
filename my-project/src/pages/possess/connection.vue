<template>
	<div class="possess-connection">
		<div class="possess-top">
			<a href="pages/upload">
				<view class="container fs20">
					<span><i-icon type="add" size="20"/></span>
					<span class="inline-block fr fs18">添加背景图</span>
				</view>
			</a>
		</div>
		<div class="empty-ceng"></div>
		<div class="possess-info">
			<i-cell-group>
				<i-cell>
					<span>头像</span>
					<span class="inline-block fr">
						<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" i-class="avatar"></i-avatar>
					</span>
				</i-cell>
				<i-cell></i-cell>
			</i-cell-group>
			<i-input title="昵称" placeholder="请输入昵称" i-class="gray" right/>
			<i-input title="公司名称" placeholder="请输入公司名称" i-class="gray" :maxlength="20" right/>
			<i-input title="目前职位" placeholder="请输入目前职位" i-class="gray" :maxlength="20" right/>
			<div class="empty-ceng"></div>
			<i-input type="number" title="单个代言金额" i-class="gray" placeholder="单个代言金额" right/>
			<i-input type="number" title="代言红包数据" i-class="gray" placeholder="代言红包数据" right/>
			<div class="empty-ceng"></div>
			<i-cell-group> 
				<i-cell>
					<span>转发后是否显示</span>
					<span class="inline-block fr">
						<i-switch :value="switch1" @change="onChange" slot="footer"></i-switch>
					</span>
				</i-cell>
				<i-cell>
					<span>公司LOGO</span>
					<span class="inline-block fr">
						<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" i-class="avatar"></i-avatar>
					</span>
				</i-cell>
				<i-cell></i-cell>
			</i-cell-group>
			<i-input title="联系电话" placeholder="请输入联系电话" :maxlength="11" right/>
			<i-input title="公司地址" placeholder="请输入公司地址" :maxlength="30" right/>
			<div class="empty-ceng"></div>
			<i-input title="已有资源" placeholder="请输入已有资源" right/>
			<i-input title="所需资源" placeholder="请输入所需资源" right/>
			<div class="empty-ceng"></div>
			<i-cell title="个人简介/公司产品简介">
				<i-input type="textarea" placeholder="请输入简介"/>
			</i-cell>
			<div class="empty-ceng"></div>
			<i-cell title="图片上传(产品/公司)">
				多图上传
			</i-cell>
			<i-button @lick="handleClick" type="primary">上传</i-button>
		</div>
	</div>
</template>
<script>
	export default {
		components:{

		},
		data () {
			return {
				switch1:false
			}
		},
		methods:{
			onChange(event){
				//const detail = event.detail;
				//console.log(event);
				this.switch1 = event.target.value;
			}
		}
	}
</script>
<style lang="less">
	.possess-connection {
		.empty-ceng {
			background-color: #F2F2F2;
      		height: 15rpx;
		}
	}
</style>
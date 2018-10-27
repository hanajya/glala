<template>
	<div class="possess-detail">
		<div class="possess-index">
			<div class="index-banner">
	          <swiper indicator-dots="true">
	              <swiper-item v-for="(item,index) in banner" :key="index">
	                  <image mode="scaleToFill" :src="item" @click="imgUrl(item)"/>
	              </swiper-item>
	          </swiper>
	      	</div>
			<div class='popContainer'>
				<i-cell-group>
						<i-cell>
							<div class="fl ml10">
								<i-avatar i-class="avatar" src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
							</div>
							<div class="block fl ml20">
								<span class="block fs18">龙大人的群</span>
								<span class="block gray fs12 pt5">公司名称/门店名称</span>
								<span class="inline-block gray fs12">职位：副总</span>
								<!-- <span class="inline-block gray fs12"><i-icon type="coordinates" size="20"/>广东东莞</span> -->
							</div>
						</i-cell>
						<i-cell>
							<i-row>
							    <i-col span="20" i-class="col-class">
									<div class="block fl ml20">
										<span class="block gray fs12">联系电话：18665736315</span>
										<span class="block gray fs12 pt5">微信号：Felivehero</span>
										<span class="inline-block gray fs12"><i-icon type="coordinates" size="20"/>广东东莞</span>
									</div>
							    </i-col>
							    <i-col span="4" i-class="col-class">
									<i-avatar i-class="logo" shape="square" src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
							    </i-col>
							</i-row>
						</i-cell>
					</i-cell-group>
			</div>
		</div>
		<div class="possess-middle">
			<i-cell-group>
				<span class="fs16 ml5">简介</span>
				<span class="fs12 block">
					<i-input placeholder="个人简介/产品简介" />
				</span>
			</i-cell-group>
			<div class="empty-ceng"></div>
			<i-input title="我拥有资源" placeholder="请输入已有资源" right/>
			<i-input title="我需要的资源" placeholder="请输入所需资源" right/>
			<div class="empty-ceng"></div>
			<div class="show-pic w100"></div>
		</div>
		<div class="footer">
			<i-button @click="handleClick" long type="primary">我要代言</i-button>
		</div>
	</div>
</template>
<script>
	export default {
		components: {

		},
		data () {
			return {
				banner    : [
	                '../../static/EBON01.jpg',
              	],
			}
		}
	}
</script>

<style lang="less">
	.possess-detail {
		.possess-index {
			height: 320px;
			background-color: #F2F2F2;
		}
		swiper{
		  	height: 400rpx;
		}
		image{
		    width: 750rpx;
		    height: 400rpx;
		 }
		 .popContainer {
			position: absolute;
		    top: 250rpx;
		    left: 40rpx;
		    right: 40rpx;
		    bottom: 600rpx;
		   /*  background: rgba(0,0,0,0.3); */
		   background-color: #fff;
		   border-radius: 5rpx;
		} 
		.avatar {
			height: 60px;
			width: 60px;
			border-radius: 35px;
		}
		.gray {
			color:#999;
		}
		.logo {
			height: 60px;
			width: 60px;
		} 
		.empty-ceng {
	      	height: 20rpx; 
	      	background-color: #F2F2F2;
	    }
	    .show-pic {
	    	height: 400rpx;
	    	display: block;
	    	background-image: url('../../static/EBON01.jpg');

	    }
	    .footer {
	    	position: fixed;
	    	bottom: 0;
	    	left: 0;
	    	right: 0;
	    }

	}
</style>
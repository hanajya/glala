<template>
	<div class="member-register">
		<div class="contain">
			<i-panel title="完善资料">
			    <i-input value="Syuka" title="微信昵称" />
			</i-panel>
			<i-cell-group>
			    <i-cell>
				<span>性别</span>
				<span class="fr gray" @click="showPicker">
					<template v-if="sexSelected.length == 0 ">请选择您的性别</template>
					<template v-else>{{sexSelected}}</template>
				</span>
				 <div class="mpvue-picer">
			    	<mpvue-picker ref="mpvuePicker" mode="selector" :pickerValueDefault="pickerValueDefault1" @onChange="onChange" @onConfirm="onConfirm" @onCancel="onCancel" :pickerValueArray="pickerValueArray1"></mpvue-picker>
	  			</div>
			    </i-cell>
				<i-cell>
				<span>所在市区</span>
				<span class="fr gray" @click="cityPicker">
					<template v-if=" citySelected.length == 0 ">请选择所在市区</template>
					<template v-else>{{citySelected}}</template>
				</span>
				<div>
					<mpvue-picker ref="mpvuePicker1" mode="multiLinkageSelector" :pickerValueDefault="pickerValueDefault"  @onChange="onChangeCity" @onConfirm="onConfirmCity" @onCancel="onCancelCity" :pickerValueArray="pickerCity"></mpvue-picker>
				</div>
				</i-cell>
			
				<i-cell>
				<span>目前从事行业</span>
				<span class="fr gray" @click="IndustryPicker">
					<template v-if="IndustrySelected.length == 0 ">请选择所在行业</template>
					<template v-else>{{IndustrySelected}}</template>
				</span>
				<div>
					<mpvue-picker ref="mpvuePicker2" :deepLength='3' mode="multiLinkageSelector" :pickerValueDefault="pickerValueDefault"  @onChange="onChangeIndustry" @onConfirm="onConfirmIndustry" @onCancel="onCancelIndustry" :pickerValueArray="pickerIndustry"></mpvue-picker>
				</div>
				</i-cell>		
			</i-cell-group>
			<div style="border: 1px soild #999"></div> 
			<i-input :value="provice_Source" class="gray" title="我能提供的资源" autofocus placeholder="请输入资源名称" right/>
			<i-input :value="need_Source" class="gray" title="我需要的资源" autofocus placeholder="请输入需要资源名称" right/>
			<i-cell>
				<span>学历</span>
				<span class="fr gray" @click="eduPicker">
					<template v-if="eduSelected.length == 0">当前学历</template>
					<template v-else>{{eduSelected}}</template>
				</span>
				<div>
					<mpvue-picker ref="mpvuePicker3"  mode="selector" :pickerValueDefault="pickerValueDefault"  @onChange="onChangeEdu" @onConfirm="onConfirmEdu" @onCancel="onCancelEdu" :pickerValueArray="pickerEdu"></mpvue-picker>
				</div>
			</i-cell>
			<i-cell>
				<span>目前职位</span>
				<span class="fr gray" @click="positionPicker">
					<template v-if="positionSelected.length == 0">当前职位</template>
					<template v-else>{{positionSelected}}</template>
				</span>
				<div>
					<mpvue-picker ref="mpvuePicker4"  mode="selector" :pickerValueDefault="pickerValueDefault"  @onChange="onChangePosition" @onConfirm="onConfirmPosition" @onCancel="onCancelPosition" :pickerValueArray="pickerPostion"></mpvue-picker>
				</div>
			</i-cell>
	  	</div>
		<div class="empty-ceng"></div>
		<i-button @click="handleClick" type="primary">完善资料</i-button>
	
	</div>
</template>

<script>
	import mpvuePicker from 'mpvue-picker';
	export default {
		components: {
			mpvuePicker
		},
		data () {
			return {
			    pickerValueArray1: [
			        {
			          label: '男',
			          value: 1
			        },
			        {
			          label: '女',
			          value: 2
			        },
			        {
			          label: '保密',
			          value: 3
			        },
			    ],
			    pickerValueDefault1: [1],
			    sexSelected: '',
			    pickerCity: [
			    	{
					    label: '飞机票',
					    value: 0,
					    children: [{
					      label: '经济舱',
					      value: 1
					    },
					    {
					      label: '商务舱',
					      value: 2
					    }
					    ]
					 },
					 {
					    label: '火车票',
					    value: 1,
					    children: [{
					      label: '卧铺',
					      value: 1
					    },
					    {
					      label: '坐票',
					      value: 2
					    },
					    {
					      label: '站票',
					      value: 3
					    }]
					},
			    ],
			    citySelected:'',
			    pickerIndustry: [
				  {
				    label: 'phone',
				    value: 0,
				    children: 
				    [
				      {
				        label: 'iphone',
				        value: 1,
				        children: 
				        [
					        {
					          label: 'iphoneX',
					          value: 1
					        },
					        {
					          label: 'iphone8',
					          value: 2
					        }, {
					          label: 'iphone8 Plus',
					          value: 3
					        }
				        ]
				      },
				      {
				        label: 'android',
				        value: 1,
				        children: [
				          {
				            label: 'vivo',
				            value: 1
				          },
				          {
				            label: '魅族',
				            value: 2
				          }, {
				            label: '小米',
				            value: 3
				          }
				        ]
				      }
				    ]
				  },
				  {
				    label: 'PC',
				    value: 0,
				    children: [
				      {
				        label: 'mac',
				        value: 1,
				        children: [
				          {
				            label: 'macbook Pro',
				            value: 1
				          },
				          {
				            label: 'iMac',
				            value: 2
				          }, {
				            label: 'mackbook',
				            value: 3
				          }, {
				            label: 'mackbook air',
				            value: 3
				          }
				        ]
				      },
				      {
				        label: 'windows',
				        value: 1,
				        children: [
				          {
				            label: 'dell',
				            value: 1
				          },
				          {
				            label: 'surface',
				            value: 2
				          }, {
				            label: 'thinkpad',
				            value: 3
				          }
				        ]
				      }
				    ]
				  }
				],
				IndustrySelected:'',
				provice_Source:'',
				need_Source:'',
				eduSelected:'',
				pickerEdu:[
					{
			          label: '大专',
			          value: 1
			        },
			        {
			          label: '本科',
			          value: 2
			        },
			        {
			          label: '硕士',
			          value: 3
			        },
				],
				positionSelected:'',
				pickerPostion:[
					{
			          label: '总经理',
			          value: 1
			        },
			        {
			          label: '打工仔',
			          value: 2
			        },
			        {
			          label: '清洁工',
			          value: 3
			        },
				],
			}
		},
		methods: {
			//性别显示模拟层
		    showPicker() {
		      this.$refs.mpvuePicker.show();
		    },
		    //性别确认值
		    onConfirm(e) {
		      this.sexSelected = e.label;
		    },
		    //市区
		    cityPicker() {
		    	this.$refs.mpvuePicker1.show();
		    },
		    onConfirmCity(e) {
		    	this.citySelected = e.label;
		    },
		    //行业
		    IndustryPicker() {
		    	this.$refs.mpvuePicker2.show();
		    },
		    onConfirmIndustry(e) {
		    	this.IndustrySelected = e.label;
		    },
		    //学历
		    eduPicker() {
		    	this.$refs.mpvuePicker3.show();
		    },
		    onConfirmEdu(e) {
		    	this.eduSelected = e.label;
		    },
		    //职位
		    positionPicker() {
		    	this.$refs.mpvuePicker4.show();
		    },
		    onConfirmPosition(e) {
		    	this.positionSelected = e.label;
		    }

		}
	}
</script>
<style lang="less">
	.member-register {
		.gray {
			color: #999;
		}
		.empty-ceng {
	      	height: 60rpx;
	    }
	}
</style>
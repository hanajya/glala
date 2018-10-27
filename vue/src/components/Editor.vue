<template>
	<div :ref="name"></div>
</template>

<script>
	import E from 'wangeditor';
	export default {
		props: {
			name: {
				type: String,
				default: 'Editor'
			},
			value: {
				type: String,
				default: ''
			},
			menus: {
				type: Array,
				default()
				{
					return [
						'head',  // 标题
					    'bold',  // 粗体
					    'fontSize',  // 字号
					    'fontName',  // 字体
					    'italic',  // 斜体
					    'underline',  // 下划线
					    'strikeThrough',  // 删除线
					    'foreColor',  // 文字颜色
					    'backColor',  // 背景颜色
					    'link',  // 插入链接
					    'list',  // 列表
					    'justify',  // 对齐方式
					    'quote',  // 引用
					    'image',  // 插入图片
					    'table',  // 表格
					    'video',  // 插入视频
					    'undo',  // 撤销
					    'redo'  // 重复
					];
				}
			}
		},
		data()
		{
			return {
				editor  : null
			}
		},
		mounted()
		{
			var editor = new E(this.$refs[this.name]);
			editor.customConfig.zIndex = 9;
			// 菜单
			editor.customConfig.menus = this.menus;
			// 上传图片
			editor.customConfig.uploadImgServer = (process.env.NODE_ENV == 'production' ? 'http://' + window.location.host : process.env.API_URL) + '/upload/image';
			// 图片大小限制 2M
			editor.customConfig.uploadImgMaxSize = 2 * 1024 * 1024;
			// 限制一次只能上传 1 张图片
			editor.customConfig.uploadImgMaxLength = 1;
			// 监听图片上传
			editor.customConfig.uploadImgHooks = {
			    customInsert: (insertImg, result, editor) => {
			        insertImg(result.data.image);
			    }
			}
			// Add Token to header
			editor.customConfig.uploadImgHeaders = {
				Authorization: window.localStorage.getItem('token')
			}

			editor.customConfig.customAlert = (info) => {
			    this.$Modal.confirm({content: info});
			}

	        editor.customConfig.onchange = (html) => {
				this.$emit('input', html);
	        }

	        editor.create();
	        editor.txt.html(this.value);
	        this.editor = editor;
		}
	}

</script>
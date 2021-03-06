<template lang="html">
    <section>
        <Upload
            :show-upload-list="false"
            :format="['jpg', 'jpeg', 'png', 'gif','pdf']"
            :max-size="2048"
            :action="action"
            :headers="headers"
            :data="params"
            :on-progress="uploading"
            :on-success="success"
            :on-error="error"
            :on-format-error="formatError"
            :on-exceeded-size="maxSize"
        >
            <Button type="ghost" icon="ios-cloud-upload-outline" :loading="loading">上传图片</Button>
        </Upload>
        <div class="drag-wrap mt10">
            <div class="image-wrap" v-if="preview">
                <Icon type="ios-close" class="trash-image" size="16" @click.native="trash"></Icon>
                <img :src="preview" class="responsive-img">
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            value: {
                type: [String, Object],
                required: true
            },
            // 传递参数给后台的图片宽高，格式：[400, 400]
            size: {
                type: Array
            },
            // 传递参数给后台的生成缩略图宽高，格式：[200, 200]
            thumb: {
                type: Array
            }
        },
        created()
        {
            if (this.size)
            {
                this.params.size = JSON.stringify({width: this.size[0], height: this.size[1]});
            }

            if (this.thumb)
            {
                this.params.thumb = JSON.stringify({width: this.thumb[0], height: this.thumb[1]});
            }
        },
        mounted()
        {
            this.showPreview();
        },
        data()
        {
            return {
                currentValue : this.value,
                preview      : false,
                action       : (process.env.NODE_ENV == 'production' ? 'http://' + window.location.host : process.env.API_URL) + '/admin/upload/image',
                headers      : {Authorization: window.localStorage.getItem('token')},
                params       : {},
                loading      : false
            }
        },
        methods: {
            uploading(event, file)
            {
                console.log(file);return;
                this.loading = true;
            },
            success(response, file)
            {
               
                if (response.status == 200)
                {
                    switch (typeof this.currentValue)
                    {
                        case 'string':
                            this.currentValue = response.data.image;
                            break;

                        case 'object':
                            this.currentValue = response.data;
                            break;

                        default:

                            break;
                    }

                    this.$emit('input', this.currentValue);
                }
                else
                {
                    this.$Modal.error({title: '上传失败', content: response.message});
                }

                this.loading = false;
            },
            error(error, file)
            {
                this.loading = false;
            },
            formatError(file)
            {
                this.$Notice.warning({
                    title: '文件格式不正确',
                    desc: '文件 ' + file.name + ' 格式不正确，只支持 jpg、png、gif 格式的图片。'
                });
            },
            maxSize(file)
            {
                this.$Notice.warning({
                    title: '超出文件大小限制',
                    desc: '图片不能大于 2M'
                });
            },
            showPreview()
            {
                switch (typeof this.currentValue)
                {
                    case 'string':
                        this.preview = this.currentValue;
                        break;

                    case 'object':
                        this.preview = this.currentValue.image;
                        break;

                    default:

                        break;
                }
            },
            trash()
            {
                var _this = this;
                _this.$Modal.confirm({
                    content: '确认要删除该图片吗？',
                    onOk ()
                    {
                        _this.preview = false;
                    }
                })
            }
        },
        watch: {
            value(value)
            {
                this.currentValue = this.value;
                this.showPreview();
            },
            'currentValue'(value)
            {
                this.showPreview();
            }
        }
    }
</script>

<style lang="css">
    .upload-image-component .drag-wrap {
        padding: 10px;
        font-size: 12px;
    }
    .responsive-img { width: 150px; height: 150px; }
    .image-wrap {
        width: 162px;
        border: 1px solid #e0e0e0;
        padding: 5px;
        border-radius: 2px;
        position: relative;
    }
    .trash-image {
        position: absolute;
        top: -8px;
        right: -8px;
        cursor: pointer;
    }
</style>

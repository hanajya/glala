<template lang="html">
    <section class="upload-multiple-image-component">
        <Upload
            :multiple="true"
            :show-upload-list="false"
            :format="['jpg', 'jpeg', 'png', 'gif']"
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

        <Row :gutter="16" class="mt20" v-if="thumb">
            <Col span="6" class="mb16" v-for="(item, index) in value.thumbs" :key="index">
                <div class="image-wrap">
                    <Icon type="ios-close" class="trash-image" size="16" @click.native="trash(index)"></Icon>
                    <img :src="item" class="responsive-img">
                </div>
            </Col>
        </Row>
        <Row :gutter="16" class="mt20" v-else-if="value.length > 0">
            <Col span="6" class="mb16" v-for="(item, index) in value" :key="index">
                <div class="image-wrap">
                    <Icon type="ios-close" class="trash-image" size="16" @click.native="trash(index)"></Icon>
                    <img :src="item" class="responsive-img">
                </div>
            </Col>
        </Row>
    </section>
</template>

<script>
    export default {
        props: {
            // 不生成缩略图时为数组，生成缩略图时格式为：{images: [], thumbs: []}
            value: {
                type: [String, Array, Object],
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
        data()
        {
            return {
                currentValue : this.value,
                action       : (process.env.NODE_ENV == 'production' ? 'http://' + window.location.host : process.env.API_URL) + '/upload/image',
                headers      : {Authorization: window.localStorage.getItem('token')},
                params       : {},
                loading      : false
            }
        },
        methods: {
            uploading(event, file)
            {
                this.loading = true;
            },
            success(response, file)
            {
                if (response.status == 200)
                {
                    if (typeof this.currentValue == 'string')
                        this.currentValue = [];
                    
                    if (this.thumb)
                    {
                        this.currentValue.images.push(response.data.image);
                        this.currentValue.thumbs.push(response.data.thumb);
                    }
                    else
                    {
                        this.currentValue.push(response.data.image);
                    }

                    this.updateValue();
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
            updateValue()
            {
                this.$emit('input', this.currentValue);
            },
            trash (index)
            {
                var _this = this;
                _this.$Modal.confirm({
                    content: '确认要删除该图片吗？',
                    onOk ()
                    {
                        if (_this.thumb)
                        {
                            _this.currentValue.images.splice(index, 1);
                            _this.currentValue.thumbs.splice(index, 1);
                        }
                        else
                        {
                            _this.currentValue.splice(index, 1);
                        }
                    }
                })
            },
        },
        watch: {
            value(value)
            {
                this.currentValue = this.value;
            }
        }
    }
</script>

<style>
    .upload-multiple-image-component .image-wrap {
        border: 1px solid #e0e0e0;
        padding: 5px;
        border-radius: 2px;
        position: relative;
    }
    .upload-multiple-image-component .image-wrap .trash-image {
        position: absolute;
        top: -8px;
        right: -8px;
        cursor: pointer;
    }
</style>

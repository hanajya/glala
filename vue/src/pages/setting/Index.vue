<template>
	<div>
         <Form :label-width="120">
            <ButtonGroup>
                <Button type="ghost" icon="refresh" @click="loadData"></Button>
                <Button type="ghost" icon="plus-round" @click="$router.push('/setting/create')">添加</Button>
            </ButtonGroup>
            <Tabs type="card" class="mt15">
                <TabPane :label="item.name" v-for="(item, key) in form" :key="key">
                    <div class="ivu-table-wrapper">
                        <div class="ivu-table">
                            <div class="ivu-table-header">
                                <table cellspacing="0" style="width:100%">
                                    <colgroup>
                                        <col width="15%">
                                        <col width="65%">
                                        <col width="20%">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="ivu-table-cell">名称</th>
                                            <th class="ivu-table-cell">值</th>
                                            <th class="ivu-table-cell">调用名</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="ivu-table-body" v-if="item.settings.length > 0">
                                <table cellspacing="0" style="width: 100%">
                                    <colgroup>
                                        <col width="15%">
                                        <col width="65%">
                                        <col width="20%">
                                    </colgroup>
                                    <tbody class="ivu-table-tbody">
                                        <tr class="ivu-table-row" v-for="(config, index) in item.settings">
                                            <td class="ivu-table-cell">{{ config.name }}</td>
                                            <td :class="{'ivu-table-cell': true, 'pt10': config.tip != '', 'pb10': config.tip != ''}">
                                                <!-- Input -->
                                                <Input type="text" v-model="config.value" v-if="config.type == 'input'"></Input>

                                                <!-- Number -->
                                                <Input-number v-model="config.value" v-if="config.type == 'number'"></Input-number>

                                                <!-- Textarea -->
                                                <Input type="textarea" v-model="config.value" v-if="config.type == 'textarea'" :rows="5" class="mt10 mb10"></Input>

                                                <!-- Select -->
                                                <Select v-model="config.value" v-if="config.type == 'select'">
                                                    <Option :value="option.value" v-for="option in config.options" :key="option.value">{{ option.label }}</Option>
                                                </Select>

                                                <!-- Radio -->
                                                <RadioGroup v-model="config.value" v-if="config.type == 'radio'">
                                                    <Radio :label="option.value" v-for="option in config.options" :key="option.value">{{ option.label }}</Radio>
                                                </RadioGroup>

                                                <!-- Checkbox -->
                                                <CheckboxGroup v-model="config.value" v-if="config.type == 'checkbox'">
                                                    <Checkbox :label="option.value" v-for="option in config.options" :key="option.value">{{ option.label }}</Checkbox>
                                                </CheckboxGroup>

                                                <!-- Switch -->
                                                <i-switch v-model="config.value" :true-value="config.options[0].value" :false-value="config.options[1].value" size="large" v-if="config.type == 'switch'">
                                                    <span slot="open">{{ config.options[0].label }}</span>
                                                    <span slot="close">{{ config.options[1].label }}</span>
                                                </i-switch>

                                                <!-- Datetime -->
                                                <DatePicker type="datetime" v-model="config.value" v-if="config.type == 'datetime'" style="width: 200px"></DatePicker>

                                                <!-- Date -->
                                                <DatePicker type="date" v-model="config.value" v-if="config.type == 'date'" style="width: 200px"></DatePicker>

                                                <!-- Time -->
                                                <TimePicker type="time" v-model="config.value" v-if="config.type == 'time'" style="width: 168px"></TimePicker>

                                                <!-- Image -->
                                                <upload-image v-model="config.value" v-if="config.type == 'image'" class="mt10 mb10"></upload-image>

                                                <!-- Multi-image -->
                                                <upload-multiple-image v-model="config.value" v-if="config.type == 'multi-image'" class="mt10 mb10"></upload-multiple-image>

                                                <!-- Editor -->
                                                <editor :name="config.name" v-model="config.value" v-if="config.type == 'editor'" class="mt10 mb10"></editor>

                                                <!-- Array -->
                                                <div class="pt10 pb10" v-if="config.type == 'array'">
                                                    <Row :gutter="8">
                                                        <Col :span="6">键名</Col>
                                                        <Col :span="18">键值</Col>
                                                    </Row>
                                                    <Row :gutter="8" v-for="(v, k) in config.value" :key="key + index + k" class="mt5">
                                                        <Col :span="6">
                                                            <Input type="text" v-model="v.key"></Input>
                                                        </Col>
                                                        <Col :span="16">
                                                            <Input type="text" v-model="v.value"></Input>
                                                        </Col>
                                                        <Col :span="2">
                                                            <Button type="text" @click="delDictionary(key, index, k)" class="red"><Icon type="trash-a"></Icon></Button>
                                                        </Col>
                                                    </Row>
                                                    <Button type="info" @click="addDictionary(key, index)" class="mt15"><Icon type="plus"></Icon></Button>
                                                </div>

                                                <div class="grey mt5" v-if="config.tips != ''">{{ config.tips }}</div>
                                            </td>
                                            <td class="ivu-table-cell">{{ config.key }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="ivu-table-tip" v-else>
                                <table cellspacing="0">
                                    <tbody>
                                        <tr><td>暂无配置</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt25" v-if="item.settings.length > 0">
                        <Button type="success" icon="archive" size="large" @click="submit">保存修改</Button>
                    </div>
                </TabPane>
            </Tabs>
        </Form>
    </div>
</template>

<script>
    import UploadImage from '@/components/Upload-image';
    import UploadMultipleImage from '@/components/Upload-multiple-image';
    import Editor from '@/components/Editor';

    export default {
        components: {
            UploadImage,
            UploadMultipleImage,
            Editor
        },
        data()
        {
            return {
                form : null
            }
        },
        created()
        {
            this.loadData();
        },
        methods: {
            loadData()
            {
                this.$http.get('admin/setting/getList')
                    .then(res => {
                        for (var i in res.data)
                        {
                            for (var j in res.data[i].settings)
                            {
                                if (res.data[i].settings[j].type == 'array')
                                {
                                    var arr = [];
                                    for (var v in res.data[i].settings[j].value)
                                        arr.push({ key: v, value: res.data[i].settings[j].value[v] });

                                    res.data[i].settings[j].value = arr;
                                }
                            }
                        }
                        this.form = res.data;
                    })
            },
            submit()
            {
                const data = JSON.parse(JSON.stringify(this.form));

                for (var i in data)
                {
                    for (var j in data[i].settings)
                    {
                        if (data[i].settings[j].type == 'array')
                        {
                            var obj = {};
                            for (var v in data[i].settings[j].value)
                                obj[data[i].settings[j].value[v].key] = data[i].settings[j].value[v].value;

                            data[i].settings[j].value = obj;
                        }
                    }
                }

                this.$Modal.confirm({
                    content: '确定要保存修改配置吗？',
                    onOk: () => {
                        this.$http.post('admin/setting/save', data);
                    }
                })
            },
            addDictionary(group, index)
            {
                this.form[group].settings[index].value.push({
                    key: 'key',
                    value: 'value'
                });
            },
            delDictionary(group, index, k)
            {
                this.form[group].settings[index].value.splice(k, 1);
            }
        }
    }
</script>
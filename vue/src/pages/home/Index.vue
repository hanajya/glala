<template>
    <section>
        <Row :gutter="20" class="mb20">
            <Col :span="8">
                <iconcard iconType="android-person" bg-color="#009688">
                    <div slot="content">
                        <countup :endVal="4096" class="teal fs24 bold"></countup>
                        <p class="fs12 grey mt5 align-center">会员</p>
                    </div>
                </iconcard>
            </Col>
            <Col :span="8">
                <iconcard iconType="cube" bg-color="#00bcd4">
                    <div slot="content">
                        <countup :endVal="1024" class="cyan fs24 bold"></countup>
                        <p class="fs12 grey mt5 align-center">商品</p>
                    </div>
                </iconcard>
            </Col>
            <Col :span="8">
                <iconcard iconType="android-list" bg-color="#03a9f4">
                    <div slot="content">
                        <countup :endVal="2048" class="light-blue fs24 bold"></countup>
                        <p class="fs12 grey mt5 align-center">订单</p>
                    </div>
                </iconcard>
            </Col>
        </Row>

        <Row :gutter="25" class="mt25">
            <Col :span="24">
                <Card :bordered="false">
                    <p slot="title">用户增长</p>
                    <charts :options="charts.userRise" :init-options="charts.options" auto-resize theme="theme" style="width:100%"/>
                </Card>
            </Col>
        </Row>

        <Row :gutter="25" class="mt25">
            <Col :span="12">
                <Card :bordered="false" class="fs12" v-if="$store.state.admin">
                    <p slot="title">当前管理员</p>
                    <Row>
                        <Col :span="6">用户名</Col>
                        <Col :span="18">{{ $store.state.admin.username }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">最后登录时间</Col>
                        <Col :span="18">{{ $store.state.admin.login_at | datetimeFormat }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">创建时间</Col>
                        <Col :span="18">{{ $store.state.admin.created_at | datetimeFormat }}</Col>
                    </Row>
                </Card>
            </Col>
            <Col :span="12">
                <Card :bordered="false" class="fs12" v-if="system">
                    <p slot="title">服务器信息</p>
                    <Row>
                        <Col :span="6">网站根目录</Col>
                        <Col :span="18">{{ system.wwwroot }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">操作系统</Col>
                        <Col :span="18">{{ system.os }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">运行环境</Col>
                        <Col :span="18">{{ system.service }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">数据库</Col>
                        <Col :span="18">{{ system.mysql_version }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">PHP 版本</Col>
                        <Col :span="18">{{ system.php_version }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">Zend 版本</Col>
                        <Col :span="18">{{ system.zend_version }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">运行方式</Col>
                        <Col :span="18">{{ system.execute_mode }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">系统时区</Col>
                        <Col :span="18">{{ system.timezone }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">文件上传大小限制</Col>
                        <Col :span="18">{{ system.upload_max_filesize }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">最大运行时间限制</Col>
                        <Col :span="18">{{ system.max_execution_time }}</Col>
                    </Row>
                    <Row class="mt10">
                        <Col :span="6">最大内存使用限制</Col>
                        <Col :span="18">{{ system.memory_limit }}</Col>
                    </Row>
                </Card>
            </Col>
        </Row>
    </section>
</template>

<script>
    import Iconcard from '@/components/Iconcard';
    import Countup from '@/components/Countup';
    import ECharts from 'vue-echarts';
    import Theme from '../../styles/echarts-theme.json';
    ECharts.registerTheme('theme', Theme);

    import { datetimeFormat } from '@/utils';

    export default {
        components: {
            Iconcard,
            Countup,
            Charts: ECharts
        },
        data()
        {
            return {
                system: null,
                charts: {
                    options: {
                        renderer: 'canvas',
                    },
                    userRise: {
                        tooltip : {
                            trigger: 'axis',
                            axisPointer: {
                                type: 'cross',
                                label: {
                                    backgroundColor: '#6a7985'
                                }
                            }
                        },
                        legend: {
                            x : 'center',
                            y : 'bottom',
                            data:['本周', '上周']
                        },
                        toolbox: {
                            feature: {
                                saveAsImage: {}
                            }
                        },
                        xAxis : [
                            {
                                type : 'category',
                                boundaryGap : false,
                                data : ['周一','周二','周三','周四','周五','周六','周日']
                            }
                        ],
                        yAxis : [
                            {
                                type : 'value'
                            }
                        ],
                        series : [
                            {
                                name:'本周',
                                type:'line',
                                areaStyle: {normal: {}},
                                data:[220, 182, 191, 234, 290]
                            },
                            {
                                name:'上周',
                                type:'line',
                                areaStyle: {normal: {}},
                                data:[100, 200, 100, 5, 90, 120, 210]
                            },
                        ]
                    }
                }
            }
        },
        created()
        {
            this.loadSystemInfo();
        },
        methods: {
            loadSystemInfo()
            {
                this.$http.get('admin/system/info')
                    .then(res => {
                        this.system = res.data;
                    })
            }
        },
        filters: {
            datetimeFormat(datetime)
            {
                return datetimeFormat(datetime);
            }
        }
    }
</script>
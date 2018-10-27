<template>
	<div>
		<Row class="mb15">
			<Col :span="16">
				<ButtonGroup>
			        <Button type="ghost" icon="refresh" @click="loadData"></Button>
			    </ButtonGroup>
			</Col>
			<Col :span="8">
                <searcher ref="searcher" :options="search_case" @callback="loadData"></searcher>
			</Col>
		</Row>
		<Table :columns="columns" :data="data" @on-row-dblclick="toEdit"></Table>
		<paginator ref="paginator" :total="total" @callback="loadData"></paginator>
	</div>
</template>

<script>
    import Searcher from '@/components/Searcher';
    import Paginator from '@/components/Paginator';

    import { datetimeFormat } from '@/utils';

    export default {
        components: {
            Searcher,
            Paginator
        },
        data () {
            return {
                search_case : {
					'user_id'       : 'UID',
					'username' : '用户名'
                },
                total    : 0,
                data     : [],
                columns: [
                    {
                        title: 'ID',
                        key: 'id'
                    },
                    {
                        title: '会员',
                        key: 'user_id'
                    },
                    {
                        title: '被投诉群',
                        key: 'wxgroup_id'
                    },
                    {
                        title: '投诉内容',
                        key: 'con'
                    },
                    {
                        title: '时间',
                        render: (h, params) => {
                            return h('span', params.row.create_time);
                        }
                    },
                    {
                        title: '操作',
                        width: 100,
                        align: 'center',
                        render: (h, params) => {
                            return h('div', [
                                h('Button', {
                                    props: {
                                        type: 'success',
                                        size: 'small',
                                        icon: 'android-create'
                                    },
                                    style: {
                                        marginRight: '5px'
                                    },
                                    on: {
                                        click: () => {
                                            this.$router.push('/complaints/update/' + params.row.id);
                                        }
                                    }
                                }),
                                h('Button', {
                                    props: {
                                        type: 'error',
                                        size: 'small',
                                        icon: 'trash-a'
                                    },
                                    on: {
                                        click: () => {
                                            this.$Modal.confirm({
                                                content: '确定要删除该数据吗？',
                                                onOk: () => {
                                                    this.$http.post('/admin/complaints/delete', {id: params.row.id})
                                                        .then(res => {
                                                            this.loadData();
                                                        })
                                                }
                                            });
                                        }
                                    }
                                })
                            ]);
                        }
                    }
                ]
            }
        },
        mounted()
        {
            this.loadData();
        },
        methods: {
            loadData()
            {
                let params = {
                    search_case : this.$refs.searcher.search_case,
                    keywords    : this.$refs.searcher.keywords,
                    page        : this.$refs.paginator.page,
                    limit       : this.$refs.paginator.limit
                }
                this.$http.get('/admin/complaints/list', {params: params})
                    .then(res => {
                        this.total = res.data.total;
                        this.data  = res.data.list;
                    })
            },
            toEdit(row)
            {
                this.$router.push('/complaints/update/' + row.id);
            }
        }
    }
</script>
<style>
.image-thumb { width: 80px; height: 80px; }  
</style>

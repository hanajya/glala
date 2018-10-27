<template>
	<div>
		<Row class="mb15">
			<Col :span="16">
				<ButtonGroup>
			        <Button type="ghost" icon="refresh" @click="loadData"></Button>
			        <Button type="ghost" icon="plus-round" @click="$router.push('/admin/create')">添加</Button>
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
					'id'       : 'ID',
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
                        title: '用户名',
                        render: (h, params) => {
                            return h('span', params.row.username);
                        }
                    },
                    {
                        title: '状态',
                        render: (h, params) => {
                            if (params.row.status == 1)
                            {
                                return h('Icon', {
                                    props: { type: 'checkmark-circled' },
                                    class: 'green'
                                })
                            }
                            else
                            {
                                return h('Icon', {
                                    props: { type: 'minus-circled' },
                                    class: 'grey'
                                })
                            }
                        }
                    },
                    {
                        title: '最后登录时间',
                        render: (h, params) => {
                            return h('span', datetimeFormat(params.row.login_at));
                        }
                    },
                    {
                        title: '操作',
                        width: 150,
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
                                            this.$router.push('/admin/update/' + params.row.id);
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
                                                    this.$http.post('/admin/delete', {id: params.row.id})
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
                this.$http.get('admin/admin/lists', {params: params})
                    .then(res => {
                        this.total = res.data.total;
                        this.data  = res.data.list;
                        console.log(this.data);
                    })
            },
            toEdit(row)
            {
                this.$router.push('admin/admin/update/' + row.id);
            }
        }
    }
</script>
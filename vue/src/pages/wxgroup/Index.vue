<template>
	<div>
		<Row class="mb15">
			<Col :span="16">
				<ButtonGroup>
			        <Button type="ghost" icon="refresh" @click="loadData"></Button>
                    <Button type="ghost" icon="plus-round" @click="$router.push('/wxgroup/create')">添加</Button>
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
					'name' : '名称'
                },
                total    : 0,
                data     : [],
                columns: [
                    {
                        title: 'ID',
                        key: 'id'
                    },
                    {
                        title: '二维码',
                        render: (h, params) => {
                            return h('img', {
                                attrs: {
                                    src: params.row.lorder ? params.row.lorder:require('../../assets/empty.jpg'),
                                },
                                class: 'image-thumb mt5 mb5'
                            });
                        }
                    },
                    {
                        title:'群名称',
                        key: 'name'
                    },
                    {
                        title:'群主',
                        key: 'lordid'
                    },
                    {
                        title:'价格',
                        key: 'price'
                    },
                    {
                        title: '状态',
                        render : (h,params) => {
                            return h('icon',{
                                props : { 'type' : params.row.status ? 'checkmark-circled':'minus-circled',size:'20'},
                                class : params.row.status ?'green':'red',
                                on: {
                                        click: () => {
                                            this.$http.post('/admin/wxgroup/status',{id:params.row.id})
                                                .then(res => {
                                                    this.loadData();
                                                })
                                        }
                                    }
                            })
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
                                            this.$router.push('/wxgroup/update/' + params.row.id);
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
                                                    this.$http.post('/admin/wxgroup/delete', {id: params.row.id})
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
                this.$http.get('/admin/wxgroup/list', {params: params})
                    .then(res => {
                        this.total = res.data.total;
                        this.data  = res.data.list;
                    })
            },
            toEdit(row)
            {
                this.$router.push('/wxgroup/update/' + row.id);
            }
        }
    }
</script>
<style>
.image-thumb { width: 80px; height: 80px; }  
</style>

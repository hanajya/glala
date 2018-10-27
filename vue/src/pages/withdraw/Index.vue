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
		<Table :columns="columns" :data="data"></Table>
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
					'user_id' : '会员ID'
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
                        key: 'money'
                    },
                    {
                        title: '提现(元)',
                        key: 'user_id'
                    },
                    {
                        title: '状态',
                        render : (h,params) => {
                            if(params.row.status==0){
                                return h('span','待审');
                            }else if(params.row.status==1){
                                return h('span','通过');
                            }else if(params.row.status==-1){
                                return h('span','驳回');
                            }
                        }
                    },
                    {
                        title: '通过/驳回',
                        render : (h,params) => {
                            if(params.row.status==0){
                                return h('div',[
                                    h('Button',{
                                        props: {
                                            type: 'primary',
                                            class:'ml10'
                                        },
                                        on: {
                                            click: () => {
                                                this.$Modal.confirm({
                                                    content: '确定通过？',
                                                    onOk: () => {
                                                        this.$http.post('/admin/withdraw/ok', {id: params.row.id})
                                                            .then(res => {
                                                                this.loadData();
                                                            })
                                                    }
                                                });
                                            }
                                        },
                                    },'通过'),
                                    h('span',' '),
                                    h('Button',{
                                        props: {
                                            type: 'error',
                                        },
                                        on: {
                                            click: () => {
                                                this.$Modal.confirm({
                                                    content: '确定驳回？',
                                                    onOk: () => {
                                                        this.$http.post('/admin/withdraw/no', {id: params.row.id})
                                                            .then(res => {
                                                                this.loadData();
                                                            })
                                                    }
                                                });
                                            }
                                        },
                                    },'驳回')
                                ]);
                            }
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
                                        type: 'error',
                                        size: 'small',
                                        icon: 'trash-a'
                                    },
                                    on: {
                                        click: () => {
                                            this.$Modal.confirm({
                                                content: '确定要删除该数据吗？',
                                                onOk: () => {
                                                    this.$http.post('/admin/withdraw/delete', {id: params.row.id})
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
                this.$http.get('/admin/withdraw/list', {params: params})
                    .then(res => {
                        this.total = res.data.total;
                        this.data  = res.data.list;
                    })
            },
            toEdit(row)
            {
                this.$router.push('/withdraw/update/' + row.id);
            }
        }
    }
</script>
<style>
.image-thumb { width: 80px; height: 80px; }  
</style>

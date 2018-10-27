<template>
    <Page
        :total="total"
        :page-size="limit"
        :current="page"
        @on-change="changePage"
        show-total
        show-elevator
        size="small"
        class="mt25"
        v-show="total > limit"
    >
    </Page>
</template>

<script>
    export default {
        props: {
            total: {
                type    : Number,
                default : 0
            },
            limit: {
                type    : Number,
                default : 10
            }
        },
        data ()
        {
            return {
                page : this.$route.query['page'] ? parseInt(this.$route.query['page']) : 1
            }
        },
        methods: {
            changePage (page)
            {
                this.page = page;
                this.redirect();
            },
            redirect()
            {
                var url = this.$route.path,
                    params = '',
                    query = this.$route.query;

                for (var i in query)
                {
                    if (i == 'page' || i=='')
                        continue;

                    params += i + '=' + query[i]+'&';
                }

                url += '?' + params + (params != '' ? '&' : '') + 'page=' + this.page;

                this.$router.push(url);
            }
        },
        watch: {
            '$route.query.page'(value)
            {
                this.page = value ? parseInt(value) : 1;
            },
            '$route'(value)
            {
                this.$emit('callback', {
                    page  : this.page,
                    limit : this.limit,
                    total : this.total
                });
            }
        }
    }
</script>
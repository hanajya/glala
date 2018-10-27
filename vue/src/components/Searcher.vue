<template>
    <Input v-model="keywords" @on-enter="search">
        <Select slot="prepend" style="width: 80px" v-model="search_case">
            <Option :value="key" v-for="(label, key) in options" :key="key">{{ label }}</Option>
        </Select>
        <Button slot="append" icon="ios-search" @click="search"></Button>
    </Input>
</template>

<script>
    export default {
        props: {
            options: {
                type    : Object,
                required: true
            }
        },
        data ()
        {
            return {
                search_case : this.$route.query['search_case'] ? this.$route.query['search_case'] : Object.keys(this.options)[0],
                keywords : this.$route.query['keywords'] ? this.$route.query['keywords'] : ''
            }
        },
        methods: {
            redirect()
            {
                var url = this.$route.path,
                    params = '',
                    query = this.$route.query;

                for (var i in query)
                {
                    if (i == 'keywords' || i == 'search_case')
                        continue;

                    params += i + '=' + query[i];
                }

                url += '?' + params + (params != '' ? '&' : '') + 'keywords=' + this.keywords;

                this.$router.push(url + '&search_case=' + this.search_case);
            },
            search()
            {
                this.redirect();
            }
        },
        watch: {
            '$route'(value)
            {
                this.keywords = this.$route.query['keywords'] ? this.$route.query['keywords'] : ''
                this.$emit('callback', {
                    keywords    : this.keywords,
                    search_case : this.search_case
                });
            }
        }
    }
</script>
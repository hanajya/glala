<template>
    <div v-if="$store.state.logged && $store.state.admin">
        <Layout style="min-height: 100vh">
            <headbar></headbar>
            <Layout>
                <Sider hide-trigger class="bg-white">
                    <sidebar/>
                </Sider>
                <Layout class="pt0 pr15 pb15 pl15">
                    <breadcrumbs class="mt10 mb10"></breadcrumbs>
                    <Content class="pt15 pr15 pb15 pl15 radius bg-white">
                        <router-view></router-view>
                    </Content>
                    <copyright></copyright>
                </Layout>
            </Layout>
        </Layout>
        <BackTop></BackTop>
    </div>
</template>

<script>
    import Headbar     from '@/components/layout/Headbar';
    import Sidebar     from '@/components/layout/Sidebar';
    import Breadcrumbs from '@/components/layout/Breadcrumbs';
    import Copyright   from '@/components/layout/Copyright';

    export default {
        components: {
            Headbar,
            Sidebar,
            Breadcrumbs,
            Copyright
        },
        created()
        {
            this.$parent.refreshToken();
        }
    }
</script>
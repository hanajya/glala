<template>
    <Menu
        :active-name="active"
        :open-names="[open]"
        :class="{ 'sidemenu-fixed': scroll > 60 }"
        theme="light"
        width="200px"
        accordion
        @on-select="clickSiderMenu"
    >
        <template v-for="(item, index) in menu">
            <MenuItem :name="item.route" v-if="!item.children || !item.children.length">
                <Icon :type="item.icon" class="w20 h20"></Icon>
                <span>{{ item.label }}</span>
            </MenuItem>
            <Submenu :name="index" v-else>
                <template slot="title">
                    <Icon :type="item.icon" class="w20"></Icon> {{ item.label }}
                </template>
                <MenuItem :name="link.route" v-for="link in item.children" :key="link.route" style="padding-left:56px;">
                    {{ link.label }}
                </MenuItem>
            </Submenu>
        </template>
    </Menu>
</template>

<script>
    import Menu from '@/utils/menu';

    export default {
        data()
        {
            return {
                menu   : Menu,
                active : Menu[0].url,
                open   : 0,
                scroll : 0
            }
        },
        created()
        {
            this.setBreadcrumbs(this.$route.path);
            window.addEventListener('scroll', this.onScroll);
        },
        methods: {
            onScroll()
            {
                if (document.documentElement && document.documentElement.scrollTop)
                {
                    this.scroll = document.documentElement.scrollTop;
                }
                else if (document.body)
                {
                    this.scroll = document.body.scrollTop;
                }
            },
            clickSiderMenu(url)
            {
                this.$router.push(url);
            },
            setBreadcrumbs(route)
            {
                var breadcrumbs = [];

                if (route != '/')
                {
                    route = '/' + route.split('/')[1];

                    group: 
                    for (var i in this.menu)
                    {
                        var group = this.menu[i];

                        if (group.route && group.route == route)
                        {
                            breadcrumbs.push({label: group.label, route: group.route});
                            this.active = group.route;
                            this.open   = 0;
                            break;
                        }

                        if (group.children)
                        {
                            for (var j in group.children)
                            {
                                var item = group.children[j];

                                if (item.route && item.route == route)
                                {
                                    breadcrumbs.push({label: group.label});
                                    breadcrumbs.push({label: item.label, route: item.route});
                                    this.active = item.route;
                                    this.open = parseInt(i);
                                    break group;
                                }
                            }
                        }
                    }
                }

                if (route == '/')
                {
                    this.active = '/';
                    this.open   = 0;
                }
                else if (breadcrumbs.length < 1)
                {
                    this.active = '';
                    this.open   = 0;
                }

                this.$store.commit('breadcrumb', breadcrumbs);
            }
        },
        watch: {
            '$route'(value)
            {
                this.setBreadcrumbs(value.path);
                window.scrollTo(0, 0);
            }
        }
    }
</script>

<style>
    .sidemenu-fixed {
        overflow: scroll;
        position: fixed;
        top: 0;
    }
</style>
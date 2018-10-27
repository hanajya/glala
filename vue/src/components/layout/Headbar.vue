<template>
	<Header style="padding: 0; height: 60px; line-height: 60px;">
        <Menu mode="horizontal" theme="primary" @on-select="selectMenu">
            <router-link to="/" class="block fl pt10 pb10 pr10 pl10">
                <img src="../../assets/logo.png" height="40" class="block circle">
            </router-link>
            <div class="fr">
                <MenuItem name="flush-cache">
                    <Icon type="loop"></Icon> 更新缓存
                </MenuItem>
                <Submenu name="admin">
                    <template slot="title">
                        <Icon type="person"></Icon> {{ $store.state.admin.username }}
                    </template>
                    <MenuItem name="profile">个人信息</MenuItem>
                    <MenuItem name="logout">退出登录</MenuItem>
                </Submenu>
            </div>
        </Menu>
    </Header>
</template>

<script>
	export default {
		methods: {
			selectMenu(name)
            {
                switch(name)
                {
                    case 'flush-cache':
                        this.flushCache();
                        break;

                    case 'profile':
                        this.$router.push('/profile');
                        break;

                    case 'logout':
                        this.$Modal.confirm({
                            'content': '确定要退出登录吗？',
                            onOk: () => {
                                this.$store.dispatch('logout');
                                this.$router.replace('/login');
                            }
                        })
                        break;

                    default:
                        
                        break;
                }
            },
            flushCache()
            {
                this.$Modal.confirm({
                    'content': '确定要清除缓存吗？',
                    onOk: () => {
                        this.$http.get('admin/system/flushCache');
                    }
                })
            }
		}
	}
</script>
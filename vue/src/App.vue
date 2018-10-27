<template>
    <main>
        <globalspin/>
        <router-view />
    </main>
</template>

<script>
    import Globalspin from '@/components/layout/Globalspin';
    
    export default {
        components: {
            Globalspin
        },
        methods: {
            refreshToken(callback)
            {
                this.$http.get('admin/login/refreshToken')
                    .then(res => {
                        this.$store.dispatch('login', res.data);

                        callback && callback();
                    })
            }
        }
    }
</script>
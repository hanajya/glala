<template>
	<div class="global-spin" v-show="$store.state.loading">
        <Icon type="load-c" :size="42" class="global-spin-icon spin-icon-animate"></Icon>
    </div>
</template>

<style>
    .global-spin {
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.6);
        position: fixed;
        z-index: 1230;
        text-align: center;
    }
    
    .global-spin-icon {
        color: #009688;
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%,-50%);
        z-index: 10;
    }

    .spin-icon-animate {
        animation: spin-animate 1s linear infinite;
    }
    
    @keyframes spin-animate {
        from {
            transform: rotate(0deg)
        }

        50% {
            transform: rotate(180deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
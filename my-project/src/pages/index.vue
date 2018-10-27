<template>
    <div class="index">
      <div class="index-banner">
          <swiper autoplay="true" indicator-dots="true" style="height:height px">
              <swiper-item v-for="(item,index) in banner" :key="index">
                  <image mode="scaleToFill" :src="item" @click="imgUrl(item)"/>
              </swiper-item>
          </swiper>
      </div>
<!--       <i-button type="primary" bind:click="handleClick">这是一个按钮</i-button> -->
      <div class="index-search">
          <icon class="searchcion" color="#fff" size='20' type='search'></icon>
          <input class="" placeholder-style="color:#fff" placeholder="搜索"/>
      </div>
      <div class="tab-top">
        <i-tabs :current="current" @change="handleChange">
          <div class="flex"><i-tab class="mr5" key="tab1" title="综合"></i-tab><i-icon type="packup" /></div>
          <div class="flex"><i-tab class="mr5" key="tab2" title="人气排行"></i-tab><i-icon type="packup" /></div>
          <div class="flex"><i-tab class="mr5" key="tab3" title="附近的群"></i-tab><i-icon type="packup" /></div>
      </i-tabs>
      </div>
      <scroll-view scroll-y>
      <div class="group-list">
          <i-cell-group>
            <i-cell is-link url="/pages/groupdata" >
              <i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
              <span class="ml10">龙大人的群</span>
            </i-cell>
             <i-cell is-link url="/pages/member/register" >
              <i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
              <span class="ml10">龙大人的群</span>
            </i-cell>
             <i-cell is-link url="/pages/member/register" >
              <i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
              <span class="ml10">龙大人的群</span>
            </i-cell>
            <i-cell is-link url="/pages/member/register" >
              <i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
              <span class="ml10">龙大人的群</span>
            </i-cell>
            <i-cell is-link url="/pages/member/register" >
              <i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
              <span class="ml10">龙大人的群</span>
            </i-cell>
            <i-cell is-link url="/pages/member/register" >
              <i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
              <span class="ml10">龙大人的群</span>
            </i-cell>
            <i-cell is-link url="/pages/member/register" >
              <i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
              <span class="ml10">龙大人的群</span>
            </i-cell>
        </i-cell-group>
      </div>
      </scroll-view>
    </div>
</template>

<script>
    export default {
      components: {
      },
      data()
      {
          return {
              banner    : [
                '../static/EBON01.jpg',
                '../static/EBON02.jpg',
              ],
              height:0,
              searchValue:'',
              current: 'tab1',
          }
      },
      created(){
        this.loadAdv();
      },
      methods: {
        loadAdv() {
          this.$http.get('api/adv/list').then( res => {
          })
        },
        handleChange (detail) {
          this.current = detail.target.key
        },
      }

    }
</script>

<style>
swiper{
  height: 400rpx;
}
image{
  width: 750rpx;
  height: 400rpx;
}
body {
  background-color: #F2F2F2;
}
.index-search {
  background-color:#6A7D8F;
  display: flex;
  position: relative;
}
input::-webkit-input-placeholder
{
  color: #fff;
}
.index-search input{
  margin-top: 10px;
  margin-bottom: 10px;
  padding-left: 60rpx;
  height: 60rpx;
  border-radius: 5px;
  font-size: 16px;
  color:#fff;
  flex:1;
  margin-right: 30px;
  margin-left: 30px;
  background-color:#8897A5;
}
.group-list
{
  height: 540rpx;
}
.searchcion {
  margin: 10rpx 10rpx 10rpx 10rpx;
  position: absolute;
  top:23rpx;
  left:55rpx; 
  z-index: 2;
  width: 20px;
  height: 20px;
  text-align: center;
  color: #fff;
}

</style>
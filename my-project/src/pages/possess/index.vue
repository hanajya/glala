  <template>
<div class="possess">
      <div class="index-banner">
          <swiper autoplay="true" indicator-dots="true" style="height:height px">
              <swiper-item v-for="(item,index) in banner" :key="index">
                  <image mode="scaleToFill" :src="item" @click="imgUrl(item)"/>
              </swiper-item>
          </swiper>
      </div>
      <div class="index-contain pb100rpx">
        <ul class="possess-list">
          <li class="pl15 pr15 pt15 pb15 border-b">
            <a class="layout" href="/pages/possess/detail">
              <i-avatar i-class="avatar" src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="large"></i-avatar>
              <div class="flex_1 align-left ml10">
                <span class="bold fs12">龙大人的群(祈福包)</span>
                <span class="block fs12">红包金额1000</span>
                <i-progress percent="65" status="wrong"></i-progress>
              </div>
              <i-icon size="20" type="enter" />
              </a>
          </li>
          <li class="pl15 pr15 pt15 pb15 border-b">
            <a class="layout" href="/pages/dashboard/index">
              <i-avatar i-class="avatar" src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="large"></i-avatar>
              <div class="flex_1 align-left ml10">
                <span class="bold fs12">龙大人的群(祈福包)</span>
                <span class="block fs12">红包金额1000</span>
                <i-progress percent="65" status="wrong"></i-progress>
              </div>
              <i-icon size="20" type="enter" />
              </a>
          </li>
          <li class="pl15 pr15 pt15 pb15 border-b">
            <a class="layout" href="/pages/dashboard/index">
              <i-avatar i-class="avatar" src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="large"></i-avatar>
              <div class="flex_1 align-left ml10">
                <span class="bold fs12">龙大人的群(祈福包)</span>
                <span class="block fs12">红包金额1000</span>
                <i-progress percent="65" status="wrong"></i-progress>
              </div>
              <i-icon size="20" type="enter" />
              </a>
          </li>
        </ul>
      </div>
      <div class="index-footer flex mb0" style="border: 1px solid #D9D9D9">
          <button class="footer-btn">祈福包</button>
          <button class="footer-btn" @click="addconnection">人脉扩展</button>
      </div>
</div>
</template>

<script>

export default {
  data () {
     return {
              banner    : [
                '../../static/EBON01.jpg',
                '../../static/EBON02.jpg',
              ],
              height:0,
              searchValue:'',
              current: 'tab1', 
              current1:'homepage'
          }
  },

  components: {
  },

  methods: {
    addconnection() {
      wx.navigateTo({
          url:'/pages/possess/connection'
      })
    }
  },
  created () {
  }
}
</script>

<style lang="less">
.possess
{
  swiper{
  height: 400rpx;
  }
  image{
    width: 750rpx;
    height: 400rpx;
  }
  .i-btn-primary {
    width: 120px;
  }
  .index-footer
  {
    padding-top:15rpx;
    padding-bottom:15rpx;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #fff;
  }
  .index-footer .footer-btn
  {
    width:180rpx !important;
    background:#2d8cf0 !important;
    border:0 !important;
    border-radius:5px !important;
    color:#fff;
    height:60rpx;
    line-height:60rpx;
    font-size:28rpx;
  }
  .avatar{
    width:50px;
    height:50px;
    border-radius:30px;
  }
}

</style>

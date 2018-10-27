<template>
  <div class="member">
    <div class="first-ceng">
      <!-- <i-col span="24" i-class="col-class align-center fs16 pt10">个人中心</i-col> -->
      <i-cell-group>
        <i-cell  url="/pages/dashboard/index">
            <i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" i-class="avatar"></i-avatar>
              <span class="ml5 fs16 inline-block">Syuka</span>
              <span class="fr inline-block mt15"><a href="/pages/member/modify">修改资料</a></span>
        </i-cell>
      </i-cell-group>
    </div>
    <div class="empty-ceng"></div>
    <div class="third-ceng">
      <i-cell-group>
          <i-cell>
            <span class="fs12 gray">
              总收益(元)
            </span>
            <span class="fs12 fr">
              <a href="javascript:;" class="txcolor">提现</a>
            </span>
          </i-cell>
      </i-cell-group>
      <i-cell-group>
        <i-cell>
          <span class="fs30 txcolor ml15">200元</span>
        </i-cell>
      </i-cell-group>
       <i-cell-group>
        <i-cell>
           <span class="fs12 ml15 gray">
              群对接收益 <span class="oo">30</span> 元
            </span> 
            <span class="ml60 gray">
              |
            </span> 
            <span class="fs12 fr mr15 gray">
              全民代言收益 <span class="oo">170</span> 元
            </span>
        </i-cell>
      </i-cell-group>
    </div>
    <div class="empty-ceng"></div>
    <i-cell-group>
        <i-cell i-class="gray" title="我发布的群资源" is-link url="/pages/member/pushgroup"></i-cell>
        <i-cell i-class="gray" title="已加入的群" is-link url="/pages/member/joingroup"></i-cell>
        <i-cell i-class="gray" title="我的申诉" is-link url="/pages/member/appeal"></i-cell>
        <i-cell i-class="gray">
          我的星级别<span class="fr"><i-rate value="3"></i-rate></span>
        </i-cell>
    </i-cell-group>
  </div>
</template>

<script>
export default {
  data () {
    return {
    }
  },
  components: {
  },

  methods: {

    },
  created () {
  }
}
</script>

<style lang="less">
.member {
  /* .col-class {
      background-color: #6A7D8F;
      height: 40px;
      color: #fff;
    } */
    .empty-ceng {
      background-color: #F2F2F2;
      height: 15rpx;
    }
  .avatar {
    width:50px;
    height:50px;
    border-radius:30px;
  }
  .txcolor {
    color: #FF6633;
  }
  .gray {
    color: #999;
  }
  .oo {
    color: #000;
  }
}


</style>

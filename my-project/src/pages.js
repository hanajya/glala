module.exports = [
  {
    path: 'pages/index', // 页面路径，同时是 vue 文件相对于 src 的路径
    config:{
      navigationBarTitleText: '群对接',
      usingComponents: {
          //"i-button": "../../iview/button/index"
          "i-tabs": "../../iview/tabs/index",
          "i-tab": "../../iview/tab/index",
          "i-cell-group": "../../iview/cell-group/index",
          "i-cell": "../../iview/cell/index",
          "i-avatar": "../../iview/avatar/index",
          "i-input": "../../iview/input/index",
          "i-icon": "../../iview/icon/index"
        }
    }
  },
  {
    path: 'pages/member/index',
    config: { // 页面配置，即 page.json 的内容
        navigationBarTitleText: '个人中心',
        usingComponents: {
          "i-cell-group": "../../iview/cell-group/index",
          "i-cell": "../../iview/cell/index",
          "i-avatar": "../../iview/avatar/index",
          "i-row": "../../iview/row/index",
          "i-col": "../../iview/col/index",
          "i-card": "../../iview/card/index",
          "i-rate": "../../iview/rate/index"
        }

    }
  },
  {
    path: 'pages/possess/index',
    config: { // 页面配置，即 page.json 的内容
        navigationBarTitleText: '全民代言',
        usingComponents: {
          "i-cell-group": "../../iview/cell-group/index",
          "i-cell": "../../iview/cell/index",
          "i-avatar": "../../iview/avatar/index",
          "i-progress": "../../iview/progress/index",
          "i-button": "../../iview/button/index",
          "i-icon": "../../iview/icon/index"
        }
    }
  },
  {
    path: 'pages/member/register',
    config: { // 页面配置，即 page.json 的内容
        navigationBarTitleText: '会员注册',
        usingComponents: {
          "i-cell-group": "../../iview/cell-group/index",
          "i-cell": "../../iview/cell/index",
          "i-input": "../../iview/input/index",
          "i-action-sheet": "../../iview/action-sheet/index",
          "i-button": "../../iview/button/index"
        }
    }
  },
  {
    path: 'pages/member/modify',
    config: {
      navigationBarTitleText:'修改资料',
      usingComponents:{
        "i-cell-group": "../../iview/cell-group/index",
        "i-cell": "../../iview/cell/index",
        "i-avatar": "../../iview/avatar/index",
        "i-input": "../../iview/input/index"
      }
    }
  },
  {
    path: 'pages/groupdata',
    config: {
      navigationBarTitleText:'群主资料',
      usingComponents:{
        "i-cell-group": "../../iview/cell-group/index",
        "i-cell": "../../iview/cell/index",
        "i-card": "../../iview/card/index",
        "i-avatar": "../../iview/avatar/index",
        "i-tag": "../../iview/tag/index",
        "i-icon": "../../iview/icon/index"
      }
    }
  },
  {
    path:'pages/groupdetail',
    config: {
      navigationBarTitleText:'群信息',
      usingComponents: {
        "i-cell-group": "../../iview/cell-group/index",
        "i-cell": "../../iview/cell/index",
        "i-button": "../../iview/button/index"

      }
    }
  },
  {
    path:'pages/member/joingroup',
    config: {
      navigationBarTitleText:'已加入的群',
      usingComponents: {
        "i-cell-group": "../../iview/cell-group/index",
        "i-cell": "../../iview/cell/index",
        "i-avatar": "../../iview/avatar/index",
      }
    }
  },
  {
    path:'pages/member/pushgroup',
    config: {
      navigationBarTitleText:'发布的群资源',
      usingComponents: {
        "i-cell-group": "../../iview/cell-group/index",
        "i-cell": "../../iview/cell/index",
        "i-avatar": "../../iview/avatar/index",
        "i-button": "../../iview/button/index"
      }
    }
  },
  {
    path:'pages/member/groupinfo',
    config: {
      navigationBarTitleText:'群信息',
      usingComponents: {
        "i-cell-group": "../../iview/cell-group/index",
        "i-cell": "../../iview/cell/index",
        "i-button": "../../iview/button/index"
      }
    }
  },
  {
    path:'pages/member/appeal',
    config: {
      navigationBarTitleText:'我的申诉',
      usingComponents: {
        "i-cell-group": "../../iview/cell-group/index",
        "i-cell": "../../iview/cell/index",
        "i-avatar": "../../iview/avatar/index",
        "i-tabs": "../../iview/tabs/index",
        "i-tab": "../../iview/tab/index"

      }
    }
  },
  {
    path:'pages/member/uploadgroup',
    config: {
      navigationBarTitleText:'上传群资料',
      usingComponents: {
        "i-avatar": "../../iview/avatar/index",
        "i-cell-group": "../../iview/cell-group/index",
        "i-cell": "../../iview/cell/index",
        "i-button": "../../iview/button/index"
      }
    }
  },
  {
    path:'pages/possess/connection',
    config: {
      navigationBarTitleText:'人脉拓展',
      usingComponents: {
        "i-avatar": "../../iview/avatar/index",
        "i-cell-group": "../../iview/cell-group/index",
        "i-cell": "../../iview/cell/index",
        "i-button": "../../iview/button/index",
        "i-switch": "../../iview/switch/index",
        "i-input": "../../iview/input/index",
        "i-icon": "../../iview/icon/index"
      }
    }
  },
  {
    path:'pages/possess/detail',
    config: {
      navigationBarTitleText:'我要代言',
      usingComponents: {
        "i-avatar": "../../iview/avatar/index",
        "i-cell-group": "../../iview/cell-group/index",
        "i-cell": "../../iview/cell/index",
        "i-icon": "../../iview/icon/index",
        "i-row": "../../iview/row/index",
        "i-col": "../../iview/col/index",
        "i-input": "../../iview/input/index",
        "i-button": "../../iview/button/index"
      }
    }
  }
]

webpackJsonp([15],{"9TVB":function(t,a){},OWk0:function(t,a,e){"use strict";Object.defineProperty(a,"__esModule",{value:!0});var n=e("CNPE"),o=e("iDAo"),r=(e("0xDb"),{components:{Searcher:n.a,Paginator:o.a},data:function(){var t=this;return{search_case:{user_id:"UID",username:"用户名"},total:0,data:[],columns:[{title:"ID",key:"id"},{title:"会员",key:"user_id"},{title:"被投诉群",key:"wxgroup_id"},{title:"投诉内容",key:"con"},{title:"时间",render:function(t,a){return t("span",a.row.create_time)}},{title:"操作",width:100,align:"center",render:function(a,e){return a("div",[a("Button",{props:{type:"success",size:"small",icon:"android-create"},style:{marginRight:"5px"},on:{click:function(){t.$router.push("/complaints/update/"+e.row.id)}}}),a("Button",{props:{type:"error",size:"small",icon:"trash-a"},on:{click:function(){t.$Modal.confirm({content:"确定要删除该数据吗？",onOk:function(){t.$http.post("/admin/complaints/delete",{id:e.row.id}).then(function(a){t.loadData()})}})}}})])}}]}},mounted:function(){this.loadData()},methods:{loadData:function(){var t=this,a={search_case:this.$refs.searcher.search_case,keywords:this.$refs.searcher.keywords,page:this.$refs.paginator.page,limit:this.$refs.paginator.limit};this.$http.get("/admin/complaints/list",{params:a}).then(function(a){t.total=a.data.total,t.data=a.data.list})},toEdit:function(t){this.$router.push("/complaints/update/"+t.id)}}}),i={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("Row",{staticClass:"mb15"},[e("Col",{attrs:{span:16}},[e("ButtonGroup",[e("Button",{attrs:{type:"ghost",icon:"refresh"},on:{click:t.loadData}})],1)],1),t._v(" "),e("Col",{attrs:{span:8}},[e("searcher",{ref:"searcher",attrs:{options:t.search_case},on:{callback:t.loadData}})],1)],1),t._v(" "),e("Table",{attrs:{columns:t.columns,data:t.data},on:{"on-row-dblclick":t.toEdit}}),t._v(" "),e("paginator",{ref:"paginator",attrs:{total:t.total},on:{callback:t.loadData}})],1)},staticRenderFns:[]};var s=e("VU/8")(r,i,!1,function(t){e("9TVB")},null,null);a.default=s.exports}});
//# sourceMappingURL=15.61e50b8cfceffb8e86f9.js.map
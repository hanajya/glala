webpackJsonp([11],{dcoq:function(t,a,e){"use strict";Object.defineProperty(a,"__esModule",{value:!0});var r=e("CNPE"),o=e("iDAo"),n=(e("0xDb"),{components:{Searcher:r.a,Paginator:o.a},data:function(){var t=this;return{search_case:{user_id:"UID",name:"名称"},total:0,data:[],columns:[{title:"ID",key:"id"},{title:"二维码",render:function(t,a){return t("img",{attrs:{src:a.row.lorder?a.row.lorder:e("1XTT")},class:"image-thumb mt5 mb5"})}},{title:"群名称",key:"name"},{title:"群主",key:"lordid"},{title:"价格",key:"price"},{title:"状态",render:function(a,e){return a("icon",{props:{type:e.row.status?"checkmark-circled":"minus-circled",size:"20"},class:e.row.status?"green":"red",on:{click:function(){t.$http.post("/admin/wxgroup/status",{id:e.row.id}).then(function(a){t.loadData()})}}})}},{title:"操作",width:100,align:"center",render:function(a,e){return a("div",[a("Button",{props:{type:"success",size:"small",icon:"android-create"},style:{marginRight:"5px"},on:{click:function(){t.$router.push("/wxgroup/update/"+e.row.id)}}}),a("Button",{props:{type:"error",size:"small",icon:"trash-a"},on:{click:function(){t.$Modal.confirm({content:"确定要删除该数据吗？",onOk:function(){t.$http.post("/admin/wxgroup/delete",{id:e.row.id}).then(function(a){t.loadData()})}})}}})])}}]}},mounted:function(){this.loadData()},methods:{loadData:function(){var t=this,a={search_case:this.$refs.searcher.search_case,keywords:this.$refs.searcher.keywords,page:this.$refs.paginator.page,limit:this.$refs.paginator.limit};this.$http.get("/admin/wxgroup/list",{params:a}).then(function(a){t.total=a.data.total,t.data=a.data.list})},toEdit:function(t){this.$router.push("/wxgroup/update/"+t.id)}}}),i={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("Row",{staticClass:"mb15"},[e("Col",{attrs:{span:16}},[e("ButtonGroup",[e("Button",{attrs:{type:"ghost",icon:"refresh"},on:{click:t.loadData}}),t._v(" "),e("Button",{attrs:{type:"ghost",icon:"plus-round"},on:{click:function(a){t.$router.push("/wxgroup/create")}}},[t._v("添加")])],1)],1),t._v(" "),e("Col",{attrs:{span:8}},[e("searcher",{ref:"searcher",attrs:{options:t.search_case},on:{callback:t.loadData}})],1)],1),t._v(" "),e("Table",{attrs:{columns:t.columns,data:t.data},on:{"on-row-dblclick":t.toEdit}}),t._v(" "),e("paginator",{ref:"paginator",attrs:{total:t.total},on:{callback:t.loadData}})],1)},staticRenderFns:[]};var s=e("VU/8")(n,i,!1,function(t){e("iAaq")},null,null);a.default=s.exports},iAaq:function(t,a){}});
//# sourceMappingURL=11.03a1064ee165201efc59.js.map
webpackJsonp([13],{OIoA:function(t,a){},j4q9:function(t,a,e){"use strict";Object.defineProperty(a,"__esModule",{value:!0});var n=e("CNPE"),o=e("iDAo"),r=(e("0xDb"),{components:{Searcher:n.a,Paginator:o.a},data:function(){var t=this;return{search_case:{name:"名称"},total:0,data:[],columns:[{title:"ID",key:"id"},{title:"标签",key:"name"},{title:"状态",render:function(a,e){return a("icon",{props:{type:e.row.status?"checkmark-circled":"minus-circled",size:"20"},class:e.row.status?"green":"red",on:{click:function(){t.$http.post("/admin/tags/status",{id:e.row.id}).then(function(a){t.loadData()})}}})}},{title:"操作",width:100,align:"center",render:function(a,e){return a("div",[a("Button",{props:{type:"success",size:"small",icon:"android-create"},style:{marginRight:"5px"},on:{click:function(){t.$router.push("/tags/update/"+e.row.id)}}}),a("Button",{props:{type:"error",size:"small",icon:"trash-a"},on:{click:function(){t.$Modal.confirm({content:"确定要删除该数据吗？",onOk:function(){t.$http.post("/admin/tags/delete",{id:e.row.id}).then(function(a){t.loadData()})}})}}})])}}]}},mounted:function(){this.loadData()},methods:{loadData:function(){var t=this,a={search_case:this.$refs.searcher.search_case,keywords:this.$refs.searcher.keywords,page:this.$refs.paginator.page,limit:this.$refs.paginator.limit};this.$http.get("/admin/tags/list",{params:a}).then(function(a){t.total=a.data.total,t.data=a.data.list})},toEdit:function(t){this.$router.push("/tags/update/"+t.id)}}}),s={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("Row",{staticClass:"mb15"},[e("Col",{attrs:{span:16}},[e("ButtonGroup",[e("Button",{attrs:{type:"ghost",icon:"refresh"},on:{click:t.loadData}}),t._v(" "),e("Button",{attrs:{type:"ghost",icon:"plus-round"},on:{click:function(a){t.$router.push("/tags/create")}}},[t._v("添加")])],1)],1),t._v(" "),e("Col",{attrs:{span:8}},[e("searcher",{ref:"searcher",attrs:{options:t.search_case},on:{callback:t.loadData}})],1)],1),t._v(" "),e("Table",{attrs:{columns:t.columns,data:t.data},on:{"on-row-dblclick":t.toEdit}}),t._v(" "),e("paginator",{ref:"paginator",attrs:{total:t.total},on:{callback:t.loadData}})],1)},staticRenderFns:[]};var i=e("VU/8")(r,s,!1,function(t){e("OIoA")},null,null);a.default=i.exports}});
//# sourceMappingURL=13.288c443fee3dca2db1fb.js.map
webpackJsonp([16],{GMn6:function(t,e,o){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var r={render:function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",[o("Button",{staticClass:"mb15",attrs:{type:"ghost",icon:"chevron-left"},on:{click:function(e){t.$router.back()}}}),t._v(" "),o("Form",{ref:"form",staticClass:"w50pct block-center",attrs:{model:t.form,rules:t.validate,"label-width":80}},[o("FormItem",{attrs:{label:"用户名",prop:"username"}},[o("Input",{attrs:{type:"text"},model:{value:t.form.username,callback:function(e){t.$set(t.form,"username",e)},expression:"form.username"}})],1),t._v(" "),o("FormItem",{attrs:{label:"手机",prop:"mobile"}},[o("Input",{attrs:{type:"text"},model:{value:t.form.mobile,callback:function(e){t.$set(t.form,"mobile",e)},expression:"form.mobile"}})],1),t._v(" "),o("FormItem",{attrs:{label:"星级"}},[o("InputNumber",{attrs:{type:"text",max:5},model:{value:t.form.xing,callback:function(e){t.$set(t.form,"xing",e)},expression:"form.xing"}})],1),t._v(" "),o("FormItem",{attrs:{label:"简介"}},[o("Input",{attrs:{type:"textarea"},model:{value:t.form.con,callback:function(e){t.$set(t.form,"con",e)},expression:"form.con"}})],1),t._v(" "),o("FormItem",{attrs:{label:"余额"}},[o("Input",{attrs:{type:"text",disabled:""},model:{value:t.form.money,callback:function(e){t.$set(t.form,"money",e)},expression:"form.money"}})],1),t._v(" "),o("FormItem",{attrs:{label:"状态"}},[o("i-switch",{attrs:{"true-value":1,"false-value":0,size:"large"},model:{value:t.form.status,callback:function(e){t.$set(t.form,"status",e)},expression:"form.status"}},[o("span",{attrs:{slot:"open"},slot:"open"},[t._v("正常")]),t._v(" "),o("span",{attrs:{slot:"close"},slot:"close"},[t._v("锁定")])])],1),t._v(" "),o("FormItem",{staticClass:"pt15"},[t.id?o("Button",{attrs:{type:"success",icon:"archive",long:""},on:{click:t.submit}},[t._v("保存修改")]):o("Button",{attrs:{type:"primary",icon:"archive",long:""},on:{click:t.submit}},[t._v("确认添加")])],1)],1)],1)},staticRenderFns:[]};var a=o("VU/8")({data:function(){return{id:this.$route.params.id,auth:[],form:{username:"",mobile:"",money:0,xing:0,con:"",status:1,userinfo:[]},validate:{username:[{required:!0,message:"请输入用户名",trigger:"blur"}]}}},created:function(){this.id&&this.loadDetail()},mounted:function(){},methods:{loadDetail:function(){var t=this;this.$http.get("/admin/user/update/id/"+this.id).then(function(e){t.form=e.data})},submit:function(){var t=this;this.$refs.form.validate(function(e){if(e){var o="/admin/user/"+(t.id?"update/id/"+t.id:"create");t.$http.post(o,t.form).then(function(e){t.$router.back()})}})}}},r,!1,function(t){o("YQAC")},null,null);e.default=a.exports},YQAC:function(t,e){}});
//# sourceMappingURL=16.d242f2cf55a4da5e8930.js.map
webpackJsonp([2],{R2Qj:function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a={components:{Upload:r("jd+X").a},data:function(){return{id:this.$route.params.id,size:[400,400],thumd:[400,400],tags:[],form:{user_id:3,name:"",con:"",lordid:"",lorder:"",tag:[],price:"",num_zan:0,num_ts:0,num_user:0,status:1},validate:{name:[{required:!0,message:"请输入群名称",trigger:"blur"}]}}},created:function(){this.id&&this.loadDetail()},mounted:function(){this.tags=[{value:"靠谱",label:"靠谱"},{value:"实用",label:"实用"},{value:"真实",label:"真实"}]},methods:{loadDetail:function(){var t=this;this.$http.get("/admin/wxgroup/update/id/"+this.id).then(function(e){t.form=e.data})},submit:function(){var t=this;this.$refs.form.validate(function(e){if(e){var r="/admin/wxgroup/"+(t.id?"update/id/"+t.id:"create");t.$http.post(r,t.form).then(function(e){t.$router.back()})}})}}},o={render:function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("Button",{staticClass:"mb15",attrs:{type:"ghost",icon:"chevron-left"},on:{click:function(e){t.$router.back()}}}),t._v(" "),r("Form",{ref:"form",staticClass:"w50pct block-center",attrs:{model:t.form,rules:t.validate,"label-width":100}},[r("FormItem",{attrs:{label:"发布会员ID",prop:"user_id"}},[r("Input",{attrs:{type:"text"},model:{value:t.form.user_id,callback:function(e){t.$set(t.form,"user_id",e)},expression:"form.user_id"}})],1),t._v(" "),r("FormItem",{attrs:{label:"群名称",prop:"name"}},[r("Input",{attrs:{type:"text"},model:{value:t.form.name,callback:function(e){t.$set(t.form,"name",e)},expression:"form.name"}})],1),t._v(" "),r("FormItem",{attrs:{label:"简介"}},[r("Input",{attrs:{type:"textarea",autosize:{minRows:2,maxRows:5},placeholder:"Enter something..."},model:{value:t.form.con,callback:function(e){t.$set(t.form,"con",e)},expression:"form.con"}})],1),t._v(" "),r("FormItem",{attrs:{label:"群主微信号",prop:"lordid"}},[r("Input",{attrs:{type:"text"},model:{value:t.form.lordid,callback:function(e){t.$set(t.form,"lordid",e)},expression:"form.lordid"}})],1),t._v(" "),r("FormItem",{attrs:{label:"图片"}},[r("upload",{attrs:{size:t.size,thumd:t.thumd},model:{value:t.form.lorder,callback:function(e){t.$set(t.form,"lorder",e)},expression:"form.lorder"}}),t._v("\n\t            大小：400*400px\n\t        ")],1),t._v(" "),r("FormItem",{attrs:{label:"标签"}},[r("Select",{staticStyle:{width:"260px"},attrs:{multiple:""},model:{value:t.form.tag,callback:function(e){t.$set(t.form,"tag",e)},expression:"form.tag"}},t._l(t.tags,function(e){return r("Option",{key:e.value,attrs:{value:e.value}},[t._v(t._s(e.label))])}))],1),t._v(" "),r("FormItem",{attrs:{label:"进群价格"}},[r("Input",{attrs:{type:"text"},model:{value:t.form.price,callback:function(e){t.$set(t.form,"price",e)},expression:"form.price"}})],1),t._v(" "),r("FormItem",{attrs:{label:"点赞数"}},[r("InputNumber",{attrs:{min:0},model:{value:t.form.num_zan,callback:function(e){t.$set(t.form,"num_zan",e)},expression:"form.num_zan"}})],1),t._v(" "),r("FormItem",{attrs:{label:"投诉量"}},[r("InputNumber",{attrs:{min:0},model:{value:t.form.num_ts,callback:function(e){t.$set(t.form,"num_ts",e)},expression:"form.num_ts"}})],1),t._v(" "),r("FormItem",{attrs:{label:"加群人数"}},[r("InputNumber",{attrs:{min:0},model:{value:t.form.num_user,callback:function(e){t.$set(t.form,"num_user",e)},expression:"form.num_user"}})],1),t._v(" "),r("FormItem",{attrs:{label:"状态"}},[r("i-switch",{attrs:{"true-value":1,"false-value":0,size:"large"},model:{value:t.form.status,callback:function(e){t.$set(t.form,"status",e)},expression:"form.status"}},[r("span",{attrs:{slot:"open"},slot:"open"},[t._v("正常")]),t._v(" "),r("span",{attrs:{slot:"close"},slot:"close"},[t._v("锁定")])])],1),t._v(" "),r("FormItem",{staticClass:"pt15"},[t.id?r("Button",{attrs:{type:"success",icon:"archive",long:""},on:{click:t.submit}},[t._v("保存修改")]):r("Button",{attrs:{type:"primary",icon:"archive",long:""},on:{click:t.submit}},[t._v("确认添加")])],1)],1)],1)},staticRenderFns:[]};var s=r("VU/8")(a,o,!1,function(t){r("x9B8")},null,null);e.default=s.exports},x9B8:function(t,e){}});
//# sourceMappingURL=2.ecc23f53f9335c8184a1.js.map
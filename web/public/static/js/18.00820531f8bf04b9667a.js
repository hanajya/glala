webpackJsonp([18],{ZIFX:function(t,e,o){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var r={render:function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",[o("Button",{staticClass:"mb15",attrs:{type:"ghost",icon:"chevron-left"},on:{click:function(e){t.$router.back()}}}),t._v(" "),o("Form",{ref:"form",staticClass:"w50pct block-center",attrs:{model:t.form,rules:t.validate,"label-width":80}},[o("FormItem",{attrs:{label:"分组",prop:"group"}},[o("Select",{model:{value:t.form.group,callback:function(e){t.$set(t.form,"group",e)},expression:"form.group"}},t._l(t.selector.groups,function(e,r){return o("Option",{key:r,attrs:{value:r}},[t._v(t._s(e))])}))],1),t._v(" "),o("FormItem",{attrs:{label:"名称",prop:"name"}},[o("Input",{attrs:{type:"text"},model:{value:t.form.name,callback:function(e){t.$set(t.form,"name",e)},expression:"form.name"}})],1),t._v(" "),o("FormItem",{attrs:{label:"调用名",prop:"key"}},[o("Input",{attrs:{type:"text"},model:{value:t.form.key,callback:function(e){t.$set(t.form,"key",e)},expression:"form.key"}})],1),t._v(" "),o("FormItem",{attrs:{label:"类型",prop:"type"}},[o("Select",{model:{value:t.form.type,callback:function(e){t.$set(t.form,"type",e)},expression:"form.type"}},t._l(t.selector.types,function(e){return o("Option",{key:e,attrs:{value:e}},[t._v(t._s(e.substr(0,1).toUpperCase()+e.substr(1)))])}))],1),t._v(" "),o("FormItem",{directives:[{name:"show",rawName:"v-show",value:t.showOptions,expression:"showOptions"}],attrs:{label:"可选项"}},[o("Input",{attrs:{type:"textarea",rows:4},model:{value:t.form.options,callback:function(e){t.$set(t.form,"options",e)},expression:"form.options"}})],1),t._v(" "),o("FormItem",{attrs:{label:"提示"}},[o("Input",{attrs:{type:"textarea"},model:{value:t.form.tips,callback:function(e){t.$set(t.form,"tips",e)},expression:"form.tips"}})],1),t._v(" "),o("FormItem",{attrs:{label:"排序"}},[o("Input-number",{model:{value:t.form.sort,callback:function(e){t.$set(t.form,"sort",e)},expression:"form.sort"}})],1),t._v(" "),o("FormItem",{staticClass:"pt15"},[o("Button",{attrs:{type:"primary",icon:"archive",long:""},on:{click:t.submit}},[t._v("确认添加")])],1)],1)],1)},staticRenderFns:[]},s=o("VU/8")({data:function(){return{form:{group:"",type:"",key:"",value:"",options:"",tips:"",sort:1},validate:{group:[{required:!0,message:"请选择配置分组",trigger:"change"}],name:[{required:!0,message:"请输入配置名称",trigger:"blur"}],key:[{required:!0,message:"请输入调用名称",trigger:"blur"}],type:[{required:!0,message:"请先择类型",trigger:"change"}]},selector:{groups:[],types:[]},showOptions:!1,optionsTips:"key1|value1\nkey2|value2"}},created:function(){this.loadSelector()},methods:{loadSelector:function(){var t=this;this.$http.get("admin/setting/create").then(function(e){t.selector=e.data})},submit:function(){var t=this;this.$refs.form.validate(function(e){e&&t.$http.post("admin/setting/create",t.form).then(function(e){t.$router.back()})})}},watch:{"form.type":function(t){switch(t){case"select":case"radio":case"checkbox":case"switch":""==this.form.options&&(this.form.options=this.optionsTips),this.showOptions=!0;break;default:this.showOptions=!1,this.form.options=""}}}},r,!1,null,null,null);e.default=s.exports}});
//# sourceMappingURL=18.00820531f8bf04b9667a.js.map
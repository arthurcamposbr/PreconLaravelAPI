(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-1af763dc"],{"0a4a":function(t,a,s){"use strict";s("9a17")},"20df":function(t,a,s){"use strict";s("6c99")},"21cf":function(t,a,s){"use strict";s("7d08")},2801:function(t,a,s){"use strict";s("6e0f")},"3c3a":function(t,a,s){"use strict";s.r(a);var e=function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("base-template",[s("section",{staticClass:"minha-conta"},[s("Breadcrumb",{attrs:{nome:"Minha Conta"}}),t.loader?s("loader"):t._e(),s("div",{staticClass:"container mb-5"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-3 mb-md-0 mb-4"},[s("div",{staticClass:"list-group text-center"},[s("button",{staticClass:"list-group-item list-group-item-action active"},[t._v(" Meus dados cadastrais ")]),s("button",{staticClass:"list-group-item list-group-item-action"},[t._v("Meus dados bancários")]),s("button",{staticClass:"list-group-item list-group-item-action"},[t._v("Sair")])])]),s("div",{staticClass:"col-md-9"},[s("div",{staticClass:"input_foto row mx-0 align-items-center mb-4"},[s("input",{staticClass:"order-2",attrs:{type:"file",name:"foto",id:"foto"},on:{change:t.uploadImage}}),s("label",{staticClass:"order-1 mr-md-2",style:[this.$store.getters.getUsuario.perfil?{backgroundImage:"url("+this.$store.getters.getUsuario.perfil+")"}:""],attrs:{for:"foto"}},[s("span",{staticClass:"icon-foto"})])]),s("div",{staticClass:"card"},[s("div",{staticClass:"card-body"},[s("h6",{staticClass:"fw-600 mb-3"},[t._v("Editar dados")]),s("form",{attrs:{action:""}},[s("div",{staticClass:"form_padrao"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-6"},[s("div",{staticClass:"form-group"},[s("input",{directives:[{name:"model",rawName:"v-model",value:t.dados.name,expression:"dados.name"}],attrs:{type:"text",placeholder:"Nome completo",required:""},domProps:{value:t.dados.name},on:{input:function(a){a.target.composing||t.$set(t.dados,"name",a.target.value)}}})])]),s("div",{staticClass:"col-md-6"},[s("div",{staticClass:"form-group"},[s("input",{directives:[{name:"model",rawName:"v-model",value:t.dados.email,expression:"dados.email"}],staticClass:"disabled",attrs:{type:"email",placeholder:"E-mail",disabled:"",required:""},domProps:{value:t.dados.email},on:{input:function(a){a.target.composing||t.$set(t.dados,"email",a.target.value)}}})])]),s("div",{staticClass:"col-md-6"},[s("div",{staticClass:"form-group"},[s("input",{directives:[{name:"model",rawName:"v-model",value:t.dados.celular,expression:"dados.celular"}],attrs:{type:"tel",placeholder:"Celular",required:""},domProps:{value:t.dados.celular},on:{input:function(a){a.target.composing||t.$set(t.dados,"celular",a.target.value)}}})])]),s("div",{staticClass:"col-md-6"},[s("div",{staticClass:"form-group"},[s("input",{directives:[{name:"model",rawName:"v-model",value:t.dados.cpf,expression:"dados.cpf"}],staticClass:"disabled",attrs:{type:"tel",placeholder:"CPF",disabled:"",required:""},domProps:{value:t.dados.cpf},on:{input:function(a){a.target.composing||t.$set(t.dados,"cpf",a.target.value)}}})])])]),s("h6",{staticClass:"fw-600 mb-3"},[t._v("Atualizar Senha")]),s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-6"},[s("div",{staticClass:"form-group"},[s("input",{attrs:{type:"password",name:"",id:"",placeholder:"Senha"}})])]),s("div",{staticClass:"col-md-6"},[s("div",{staticClass:"form-group"},[s("input",{attrs:{type:"password",name:"",id:"",placeholder:"Repetir senha"}})])]),s("div",{staticClass:"col-md-4 offset-md-8"},[s("button",{staticClass:"btn btn-success text-uppercase font-14 fw-600 py-3 w-100",attrs:{type:"submit"}},[t._v("Atualizar dados")])])])])])])])])])])],1)])},i=[],o=(s("b0c0"),s("7277")),r=s("bab1"),n={name:"MinhaConta",components:{BaseTemplate:o["a"],Breadcrumb:r["a"]},data:function(){return{loader:!1,dados:"",urlFoto:"",alerta:""}},methods:{uploadImage:function(t){var a=this,s=t.target.files||t.dataTransfer.files;if(s.length){var e=new FileReader;e.onload=function(t){a.dados.perfil=t.target.result},e.readAsDataURL(s[0])}},atualizaDados:function(){var t=this;this.loader=!0,this.alerta="",this.$http.put(this.$urlAPI+"/atualiza-dados",this.dados).then((function(a){t.loader=!1,t.dados=a.data,t.$store.getters.getUsuario.name=a.data.name,t.$store.getters.getUsuario.perfil=a.data.perfil,t.dados.perfil=null})).catch((function(a){t.loader=!1,t.alerta=a.response.data.msg}))}},created:function(){var t=this;this.$http.get(this.$urlAPI+"/me").then((function(a){t.dados=a.data.usuario,t.dados.perfil=null})).catch((function(t){console.log(t)}))}},l=n,c=(s("20df"),s("2877")),d=Object(c["a"])(l,e,i,!1,null,"3ea911ea",null);a["default"]=d.exports},"4ffd":function(t,a,s){t.exports=s.p+"img/logo.21f416a7.png"},"5fe0":function(t,a,s){},"65f09":function(t,a,s){"use strict";s("5fe0")},"6c99":function(t,a,s){},"6e0f":function(t,a,s){},7277:function(t,a,s){"use strict";var e=function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("main",[s("header-dash"),s("div",{staticClass:"main"},[s("transition",{attrs:{appear:"",name:"slide",mode:"out-in"}},[t._t("default")],2)],1),s("footer-dash")],1)},i=[],o=s("c32e"),r=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("header",{attrs:{id:"header"}},[e("div",{staticClass:"container"},[e("div",{staticClass:"row align-items-center justify-content-between"},[e("div",{staticClass:"col-md-auto col-6"},[e("router-link",{staticClass:"logo",attrs:{to:"/"}},[e("img",{attrs:{src:s("4ffd"),alt:"Precon"}})])],1),e("div",{staticClass:"col-md-auto d-lg-block d-none"},[e("b-nav",{staticClass:"justify-content-center"},[e("b-nav-item",{attrs:{to:"/"}},[t._v("Home")]),e("b-nav-item",{attrs:{to:"/empreendimentos"}},[t._v("Empreendimentos")]),e("b-nav-item",{attrs:{to:"/minhas-indicacoes"}},[t._v("Minhas Indicações")]),e("b-nav-item",{attrs:{to:"/minha-carteira"}},[t._v("Minha Carteira")]),e("b-nav-item",{attrs:{to:"/minha-conta"}},[t._v("Minha Conta")])],1)],1),e("div",{staticClass:"col-md-auto d-md-block d-none"},[this.$store.getters.getUsuario?e("div",{staticClass:"user"},[e("div",{staticClass:"foto",style:[this.$store.getters.getUsuario.perfil?{backgroundImage:"url("+this.$store.getters.getUsuario.perfil+")"}:""]}),e("div",{staticClass:"infos"},[e("b-dropdown",{staticClass:"nome",attrs:{id:"dropdown-1",text:"Olá, "+this.$func.primeiroNome(this.$store.getters.getUsuario.name)}},[e("b-dropdown-item",{on:{click:t.sair}},[t._v("Sair")])],1),t._m(0)],1)]):t._e()]),t._m(1)])])])},n=[function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"saldo"},[s("small",[t._v("Saldo:")]),t._v(" "),s("span",{staticClass:"fw-600 text-primary opensans"},[t._v("R$ 0,00")])])},function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"col-md-auto col-6 d-lg-none text-right"},[s("button",{staticClass:"menu"},[s("span"),s("span"),s("span")])])}],l={name:"Header",methods:{sair:function(){sessionStorage.clear(),this.$store.commit("setToken",""),this.$store.commit("setUsuario",""),this.$router.push("/login")}}},c=l,d=(s("65f09"),s("2877")),u=Object(d["a"])(c,r,n,!1,null,"44d6cd12",null),m=u.exports,p=function(){var t=this,a=t.$createElement;t._self._c;return t._m(0)},f=[function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("footer",[e("div",{staticClass:"container"},[e("div",{staticClass:"row justify-content-between align-items-center"},[e("div",{staticClass:"col-md-auto mb-md-0 mb-4"},[t._v(" © Precon Engenharia 2020 – Todos os direitos reservados. – CNPJ: 22508739/0001-41 ")]),e("div",{staticClass:"col-md-auto"},[e("a",{attrs:{href:"https://meuprecon.com.br",target:"_blank",rel:"noopener noreferrer"}},[e("img",{attrs:{src:s("d662"),alt:"Precon"}})])])])])])}],v={name:"Footer"},g=v,h=(s("2801"),Object(d["a"])(g,p,f,!1,null,"d9267bd2",null)),C=h.exports,A={name:"Dashboard",components:{TransitionPage:o["a"],HeaderDash:m,FooterDash:C}},b=A,E=(s("0a4a"),Object(d["a"])(b,e,i,!1,null,"5071833c",null));a["a"]=E.exports},"7d08":function(t,a,s){},"9a17":function(t,a,s){},b0c0:function(t,a,s){var e=s("83ab"),i=s("9bf2").f,o=Function.prototype,r=o.toString,n=/^\s*function ([^ (]*)/,l="name";e&&!(l in o)&&i(o,l,{configurable:!0,get:function(){try{return r.call(this).match(n)[1]}catch(t){return""}}})},bab1:function(t,a,s){"use strict";var e=function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"bread"},[s("div",{staticClass:"container"},[s("router-link",{attrs:{to:"/"}},[t._v("Home")]),t._v(" / "),s("span",[t._v(t._s(t.nome))])],1)])},i=[],o={name:"Breadcrumb",props:{nome:""}},r=o,n=(s("21cf"),s("2877")),l=Object(n["a"])(r,e,i,!1,null,"570ba622",null);a["a"]=l.exports},d662:function(t,a){t.exports="data:image/png;base64,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"}}]);
//# sourceMappingURL=chunk-1af763dc.10a11214.js.map
(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-5c320d55"],{1706:function(e,t,a){},"2fef":function(e,t,a){"use strict";var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("section",{staticClass:"auth"},[a("div",{staticClass:"cont"},[a("div",{staticClass:"body_auth"},[e._m(0),a("transition",{attrs:{appear:"",name:"slide",mode:"out-in"}},[e._t("default")],2),e._m(1)],1)]),e._m(2)])},r=[function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"header"},[s("div",{staticClass:"row align-items-center"},[s("div",{staticClass:"col-6"},[s("a",{staticClass:"logo",attrs:{href:"https://indicape.meuprecon.com.br/"}},[s("img",{attrs:{src:a("4ffd"),alt:"Precon"}})])]),s("div",{staticClass:"col-6 text-right"},[s("a",{staticClass:"btn btn_voltar",attrs:{href:"https://indicape.meuprecon.com.br/"}},[e._v("Voltar")])])])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"footer font-14"},[a("a",{attrs:{href:"#",target:"_blank",rel:"noopener noreferrer"}},[e._v("Política de Privacidade")]),e._v(" e "),a("a",{attrs:{href:"#",target:"_blank",rel:"noopener noreferrer"}},[e._v("Termos de Uso")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"slider"},[a("div",{staticClass:"slide"})])}],n={},o=n,i=(a("cece"),a("2877")),l=Object(i["a"])(o,s,r,!1,null,"49a49616",null);t["a"]=l.exports},"4ffd":function(e,t,a){e.exports=a.p+"img/logo.21f416a7.png"},"7c6d":function(e,t,a){},cece:function(e,t,a){"use strict";a("7c6d")},dadb:function(e,t,a){"use strict";a("1706")},fc5c:function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("base-template",[a("div",{staticClass:"form_login"},[a("div",{staticClass:"sub font-14 fw-600 text-uppercase"},[e._v("Indicapê")]),a("h1",{staticClass:"h2 fw-700 mb-4"},[e._v("Criar minha conta")]),e.loader?e._e():a("form",{attrs:{action:""},on:{submit:function(t){return t.preventDefault(),e.cadastro(t)}}},[a("div",{staticClass:"form-group"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.nome,expression:"nome"}],attrs:{type:"text",placeholder:"Nome completo",required:""},domProps:{value:e.nome},on:{input:function(t){t.target.composing||(e.nome=t.target.value)}}})]),a("div",{staticClass:"form-group"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.email,expression:"email"}],attrs:{type:"email",placeholder:"E-mail",required:""},domProps:{value:e.email},on:{input:function(t){t.target.composing||(e.email=t.target.value)}}})]),a("div",{staticClass:"form-group"},[a("input",{directives:[{name:"mask",rawName:"v-mask",value:"###.###.###-##",expression:"'###.###.###-##'"},{name:"model",rawName:"v-model",value:e.cpf,expression:"cpf"}],attrs:{type:"tel",placeholder:"CPF",required:""},domProps:{value:e.cpf},on:{input:function(t){t.target.composing||(e.cpf=t.target.value)}}})]),a("div",{staticClass:"form-group"},[a("input",{directives:[{name:"mask",rawName:"v-mask",value:"(##) #####-####",expression:"'(##) #####-####'"},{name:"model",rawName:"v-model",value:e.celular,expression:"celular"}],attrs:{type:"tel",placeholder:"Celular/Whatsapp",required:""},domProps:{value:e.celular},on:{input:function(t){t.target.composing||(e.celular=t.target.value)}}})]),a("div",{staticClass:"form-group"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.senha,expression:"senha"}],attrs:{type:"password",placeholder:"Senha",required:""},domProps:{value:e.senha},on:{input:function(t){t.target.composing||(e.senha=t.target.value)}}})]),a("div",{staticClass:"form-group"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.senha2,expression:"senha2"}],attrs:{type:"password",placeholder:"Repetir senha",required:""},domProps:{value:e.senha2},on:{input:function(t){t.target.composing||(e.senha2=t.target.value)}}})]),a("div",{staticClass:"form-group pb-2"},[a("button",{staticClass:"btn btn-success w-100 text-uppercase fw-600",attrs:{type:"submit"}},[e._v("Criar Conta")])]),a("div",{staticClass:"cadastre_btn font-14"},[a("p",[e._v("Já possui uma conta? "),a("router-link",{attrs:{to:"login"}},[e._v("Acesse agora")])],1)]),e.alerta?a("div",e._l(e.alerta,(function(t){return a("div",{staticClass:"alert alert-danger font-14 mt-3",attrs:{role:"alert"},domProps:{innerHTML:e._s(t[0])}})})),0):e._e()]),e.loader?a("loader"):e._e()],1)])},r=[],n=a("2fef"),o={name:"Cadastro",components:{BaseTemplate:n["a"]},data:function(){return{nome:"",email:"",celular:"",cpf:"",senha:"",senha2:"",alerta:"",loader:!1}},methods:{cadastro:function(){var e=this;this.loader=!0,this.$http.post(this.$urlAPI+"/cadastro",{name:this.nome,email:this.email,celular:this.celular,cpf:this.cpf,password:this.senha,password_confirmation:this.senha2}).then((function(t){1==t.data.status&&e.$router.push("/ativar-conta")})).catch((function(t){e.loader=!1,e.alerta=t.response.data.msg}))}}},i=o,l=(a("dadb"),a("2877")),c=Object(l["a"])(i,s,r,!1,null,"8cd1e344",null);t["default"]=c.exports}}]);
//# sourceMappingURL=chunk-5c320d55.ae8c2608.js.map
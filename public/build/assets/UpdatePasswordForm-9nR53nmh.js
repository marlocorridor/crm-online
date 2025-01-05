import{r as i,T as f,c as _,w as e,o as V,f as n,a as l,b as a,u as r,n as g}from"./app-0KgFkgc1.js";import{_ as v}from"./ActionMessage-D5tALbyH.js";import{_ as y}from"./FormSection-D3GV7Axt.js";import{_ as d,a as p}from"./TextInput-DDmNXaRL.js";import{_ as u}from"./InputLabel-BGw2vxrA.js";import{_ as P}from"./PrimaryButton-Dj4KUlBr.js";import"./SectionTitle-CK5OrzXg.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const b={class:"col-span-6 sm:col-span-4"},k={class:"col-span-6 sm:col-span-4"},S={class:"col-span-6 sm:col-span-4"},F={__name:"UpdatePasswordForm",setup($){const m=i(null),c=i(null),s=f({current_password:"",password:"",password_confirmation:""}),w=()=>{s.put(route("user-password.update"),{errorBag:"updatePassword",preserveScroll:!0,onSuccess:()=>s.reset(),onError:()=>{s.errors.password&&(s.reset("password","password_confirmation"),m.value.focus()),s.errors.current_password&&(s.reset("current_password"),c.value.focus())}})};return(U,o)=>(V(),_(y,{onSubmitted:w},{title:e(()=>o[3]||(o[3]=[n(" Update Password ")])),description:e(()=>o[4]||(o[4]=[n(" Ensure your account is using a long, random password to stay secure. ")])),form:e(()=>[l("div",b,[a(u,{for:"current_password",value:"Current Password"}),a(d,{id:"current_password",ref_key:"currentPasswordInput",ref:c,modelValue:r(s).current_password,"onUpdate:modelValue":o[0]||(o[0]=t=>r(s).current_password=t),type:"password",class:"mt-1 block w-full",autocomplete:"current-password"},null,8,["modelValue"]),a(p,{message:r(s).errors.current_password,class:"mt-2"},null,8,["message"])]),l("div",k,[a(u,{for:"password",value:"New Password"}),a(d,{id:"password",ref_key:"passwordInput",ref:m,modelValue:r(s).password,"onUpdate:modelValue":o[1]||(o[1]=t=>r(s).password=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),a(p,{message:r(s).errors.password,class:"mt-2"},null,8,["message"])]),l("div",S,[a(u,{for:"password_confirmation",value:"Confirm Password"}),a(d,{id:"password_confirmation",modelValue:r(s).password_confirmation,"onUpdate:modelValue":o[2]||(o[2]=t=>r(s).password_confirmation=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),a(p,{message:r(s).errors.password_confirmation,class:"mt-2"},null,8,["message"])])]),actions:e(()=>[a(v,{on:r(s).recentlySuccessful,class:"me-3"},{default:e(()=>o[5]||(o[5]=[n(" Saved. ")])),_:1},8,["on"]),a(P,{class:g({"opacity-25":r(s).processing}),disabled:r(s).processing},{default:e(()=>o[6]||(o[6]=[n(" Save ")])),_:1},8,["class","disabled"])]),_:1}))}};export{F as default};

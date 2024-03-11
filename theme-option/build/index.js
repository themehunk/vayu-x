!function(){"use strict";var e,t={834:function(){var e=window.wp.element,t=window.wp.i18n,n=()=>(0,e.createElement)(e.Fragment,null,(0,e.createElement)("div",{className:"blockline-theme-options-header"},(0,e.createElement)("div",{className:"th-logo-img"},(0,e.createElement)("a",{target:"_blank",href:"https://themehunk.com/"},(0,e.createElement)("span",{className:"logo-image"},(0,e.createElement)("img",{className:"logo-img",src:`${wpapi.vayuUri}/theme-option/assets/img/logo-themehunk.png`})))),(0,e.createElement)("div",{className:"th-option-area"},(0,e.createElement)("div",{className:"th-option-top-hdr"},(0,e.createElement)("div",{className:"th-col2"},(0,e.createElement)("div",{className:"th-option-heading"},(0,e.createElement)("h2",null,sprintf((0,t.__)("Welcome To %s Theme","blockline"),wpapi.themeName)),(0,e.createElement)("p",null,wpapi.themeName," ",(0,t.__)("Multipurpose WordPress Full Site Editing Theme","blockline"))),(0,e.createElement)("div",{className:"th-option-detail"},(0,e.createElement)("p",{className:"th-version"},(0,t.__)("Version ","blockline")," ",wpapi.themeVersion," "),(0,e.createElement)("span",null,(0,t.__)("Free","blockline")))))))),a=window.React,l=()=>{let n=`${wpapi.homeUrl}/wp-admin/site-editor.php`;return(0,e.createElement)(e.Fragment,null,(0,e.createElement)("div",{className:"option-content-wrp"},(0,e.createElement)("div",{className:"content-box-full"},(0,e.createElement)("h3",null," ",(0,t.__)("Welcome to Vayu X","vayu-x")),(0,e.createElement)("video",{width:"320",height:"240",controls:!0},(0,e.createElement)("source",{src:`${wpapi.vayuUri}/theme-option/assets/img/video2.mp4`,type:"video/mp4"})),(0,e.createElement)("p",null,(0,t.__)("Create beautiful website using Vayu X Full Site Editing Theme. It allows you to customize your site, including individual blocks, as much as you’d like with different colors, typography, layouts, and more.","vayu-x")),(0,e.createElement)("a",{href:n,className:"content-link button"},(0,t.__)("Start Customizing Vayu","vayu-x")))))},c=()=>(0,e.createElement)(e.Fragment,null,(0,e.createElement)("div",{className:"option-content-wrp"},(0,e.createElement)("div",{className:"content-box"},(0,e.createElement)("h3",null," ",(0,t.__)("Contact Support","blockline")),(0,e.createElement)("p",null,(0,t.__)("If you need any help you can contact to our support team","blockline")),(0,e.createElement)("a",{href:"https://themehunk.com/contact-us/",target:"_blank",className:"content-link "}," ",(0,t.__)("Need help...","blockline"))),(0,e.createElement)("div",{className:"content-box"},(0,e.createElement)("h3",null," ",(0,t.__)("Documentation","blockline")),(0,e.createElement)("p",null,(0,t.__)("Our WordPress Theme is well documented, you can go with our documentation and learn to customize Big Store.","blockline")),(0,e.createElement)("a",{href:"https://themehunk.com/docs/",target:"_blank",className:"content-link "}," ",(0,t.__)("Go to Doc","blockline"))),(0,e.createElement)("div",{className:"content-box"},(0,e.createElement)("h3",null," ",(0,t.__)("Create a child theme","blockline")),(0,e.createElement)("p",null,(0,t.__)("Before modifying theme core files. You should create child theme to make those changes update proof. Please follow this link to create child theme.","blockline")),(0,e.createElement)("a",{href:"https://themehunk.com/child-theme/",target:"_blank",className:"content-link "}," ",(0,t.__)("Create Child Theme","blockline"))),(0,e.createElement)("div",{className:"content-box"},(0,e.createElement)("h3",null," ",(0,t.__)("Join Group","blockline")),(0,e.createElement)("p",null,(0,t.__)("Join the community of friendly ThemeHunk users. Get connected, share opinion, ask questions and help each other !","blockline")),(0,e.createElement)("a",{href:"https://linktr.ee/themehunk",target:"_blank",className:"content-link button"}," ",(0,t.__)("Join Our Social Group","blockline"))))),s=function(t){let{pluginSlug:n}=t;const[a,l]=(0,e.useState)("Loading"),[c,s]=(0,e.useState)(!0),[o,r]=(0,e.useState)("Loading"),i=wpapi.getPluginStatusNonce,m=wpapi.installAndActivatePluginNonce,u=wpapi.ajaxurl;return(0,e.useEffect)((()=>{(async()=>{const e=await fetch(`${u}?action=get_plugin_status_callback`,{method:"POST",headers:{"Content-Type":"application/x-www-form-urlencoded"},body:new URLSearchParams({plugin_slug:n,security:i}).toString()});if(e.ok){const t=await e.json();if(t.success){const e=t.data.status;"not_installed"===e?(l("Install"),r("install-now"),s(!1)):"installed_not_activated"===e?(l("Active Now"),r("active-now"),s(!1)):"installed_and_activated"===e&&(l("Activated"),r("activated"),s(!0))}}})()}),[n]),(0,e.createElement)("button",{className:`custom-button button ${o}`,onClick:async()=>{console.log(m);const e=await fetch(`${u}?action=install_and_activate_plugin_callback`,{method:"POST",headers:{"Content-Type":"application/x-www-form-urlencoded"},body:new URLSearchParams({plugin_slug:n,security:m}).toString()});if(e.ok){const t=await e.json();t.success?(l("Activated"),s(!0),alert("Plugin installed and activated successfully!")):alert("Error: "+t.message)}},disabled:c},a)},o=function(){const[n,a]=(0,e.useState)(null),l=wpapi.homeUrl,c=wpapi.ajaxurl,o=`${l}/wp-json/wp/v1/vayu`;if((0,e.useEffect)((()=>{fetch(`${o}`).then((e=>e.json())).then((e=>{a(e)}))}),[]),!n)return(0,e.createElement)("div",null,"Loading...");function r(t,n,a){"free-installed"==t.inststatus||"pro-installed"==t.inststatus?"true"==t.actstatus?(n="Activated",a="button btn activated disabled"):(n="Active Now",a="button btn active-now"):(n="Install Now",a="button btn install-now");const[l,s]=(0,e.useState)(n),[o,r]=(0,e.useState)(a);return(0,e.createElement)("button",{onClick:async e=>{r("button btn updating-message");const t={init:e.target.dataset.init,slug:e.target.dataset.slug,instl:e.target.dataset.inststatus,nonce:wpapi.wpnonce},n=await fetch(`${c}?action=vayu_install_plugin`,{method:"POST",body:new URLSearchParams(t)});await n.text();try{s("Activated"),r("button btn activated disabled")}catch(e){console.error("Error parsing JSON:",e)}},"data-label":l,"data-init":t.init,"data-slug":t.slug,"data-instl":t.instl,className:o,"data-actstatus":t.actstatus,"data-inststatus":t.inststatus},l)}return(0,e.createElement)("div",{className:"recommended-option-wrap"},(0,e.createElement)("div",{className:"th-option-2-col"},(0,e.createElement)((function(n){const{data:a}=n;let l,c,s,o,i,m;return a.map((n=>Object.keys(n).map((a=>("pro-installed"==n[a].status?(l=(0,e.createElement)("h4",null,n[a].name,(0,e.createElement)("span",null,(0,t.__)("Pro","blockline"))),c="",s=n[a].init.split("/").shift(),o=n[a].init,i=n[a].pro,m=n[a].status):(l=(0,e.createElement)("h4",null,n[a].name),c=(0,e.createElement)("a",{className:"doc-link th-go-pro",href:n[a].link}," ",(0,t.__)("Go Pro","blockline")),s=n[a].slug,o=n[a].init,i=n[a].free,m=n[a].status),(0,e.createElement)("div",{className:"th-option-row content-box"},(0,e.createElement)("div",{className:"th-col"},(0,e.createElement)("img",{src:n[a].imgUrl})),(0,e.createElement)("div",{className:"th-col"},(0,e.createElement)("div",{className:"title-plugin"},l,c),(0,e.createElement)(r,{"data-instl":m,init:o,slug:s,actstatus:i,inststatus:m}))))))))}),{data:n}),(0,e.createElement)("div",{className:"th-option-row content-box custom-install"},(0,e.createElement)("div",{className:"th-col"},(0,e.createElement)("img",{src:`${wpapi.vayuUri}/theme-option/assets/img/icon.gif`})),(0,e.createElement)("div",{className:"th-col"},(0,e.createElement)("div",{className:"title-plugin"},(0,e.createElement)("h4",null,"Vayu Blocks")),(0,e.createElement)(s,{pluginSlug:"vayu-blocks"})))))},r=()=>(0,e.createElement)(e.Fragment,null,(0,e.createElement)(o,null)),i=()=>(0,e.createElement)(e.Fragment,null,(0,e.createElement)("div",{className:"freepro-content-wrp"},(0,e.createElement)("div",{className:"freepro-content-box"},(0,e.createElement)("ul",null,(0,e.createElement)("li",{className:"freepro-tbl-heading"},(0,e.createElement)("span",null,"General Features"),(0,e.createElement)("span",null,"PRO"),(0,e.createElement)("span",null,"FREE")),(0,e.createElement)("li",null,(0,e.createElement)("span",null,"Easy Setup"),(0,e.createElement)("span",{className:"dashicons dashicons-yes"}),(0,e.createElement)("span",{className:"dashicons dashicons-yes"})),(0,e.createElement)("li",null,(0,e.createElement)("span",null,"Responsive Design"),(0,e.createElement)("span",{className:"dashicons dashicons-yes"}),(0,e.createElement)("span",{className:"dashicons dashicons-yes"})),(0,e.createElement)("li",null,(0,e.createElement)("span",null,"Speed Optimization"),(0,e.createElement)("span",{className:"dashicons dashicons-yes"}),(0,e.createElement)("span",{className:"dashicons dashicons-yes"})),(0,e.createElement)("li",null,(0,e.createElement)("span",null,"10+ Theme Color Styles"),(0,e.createElement)("span",{className:"dashicons dashicons-yes"}),(0,e.createElement)("span",{className:"dashicons dashicons-no-alt"})),(0,e.createElement)("li",null,(0,e.createElement)("span",null,"Multiple Advance Block Patterns"),(0,e.createElement)("span",{className:"dashicons dashicons-yes"}),(0,e.createElement)("span",{className:"dashicons dashicons-no-alt"})),(0,e.createElement)("li",null,(0,e.createElement)("span",null,"7 Header Pattern Layouts"),(0,e.createElement)("span",{className:"dashicons dashicons-yes"}),(0,e.createElement)("span",{className:"dashicons dashicons-no-alt"})),(0,e.createElement)("li",null,(0,e.createElement)("span",null,"9 Footer Pattern Layouts"),(0,e.createElement)("span",{className:"dashicons dashicons-yes"}),(0,e.createElement)("span",{className:"dashicons dashicons-no-alt"})),(0,e.createElement)("li",null,(0,e.createElement)("span",null,"Unlimited Blocks Plugin 19+ "),(0,e.createElement)("span",{className:"dashicons dashicons-yes"}),(0,e.createElement)("span",{className:"dashicons dashicons-yes"})))))),m=()=>(0,e.createElement)(e.Fragment,null,(0,e.createElement)("div",{className:"option-content-wrp"},(0,e.createElement)("p",null,(0,t.__)("You Can Import Demo","vayu-x")))),u=n=>{const[s,o]=(0,a.useState)("welcome"),u=e=>{o(e)};return(0,e.createElement)("div",{className:"blockline-options-tab"},(0,e.createElement)("div",{className:"blockline-tabs"},(0,e.createElement)("button",{className:"tab welcome "+("welcome"===s?"active":""),onClick:()=>u("welcome")},(0,t.__)("Welcome","blockline")),(0,e.createElement)("button",{className:"tab recommended "+("recommended"===s?"active":""),onClick:()=>u("recommended")},(0,t.__)("Recommended Plugin","blockline")),(0,e.createElement)("button",{className:"tab recommended "+("demoImport"===s?"active":""),onClick:()=>u("demoImport")},(0,t.__)("Demo Import","blockline")),(0,e.createElement)("button",{className:"tab freevspro "+("freevspro"===s?"active":""),onClick:()=>u("freevspro")},(0,t.__)("Free Vs Pro","blockline")),(0,e.createElement)("button",{className:"tab help "+("help"===s?"active":""),onClick:()=>u("help")},(0,t.__)("Help","blockline"))),(0,e.createElement)("div",{className:"tab-content"},"welcome"===s&&(0,e.createElement)("div",{className:"welcome-tab"},(0,e.createElement)(l,null)),"recommended"===s&&(0,e.createElement)("div",{className:"recommended-tab"},(0,e.createElement)(r,null)),"demoImport"===s&&(0,e.createElement)("div",{className:"'demo-import"},(0,e.createElement)(m,null)),"freevspro"===s&&(0,e.createElement)("div",{className:"freevspro-tab"},(0,e.createElement)(i,null)),"help"===s&&(0,e.createElement)("div",{className:"help-tab"},(0,e.createElement)(c,null))))},d=()=>(0,e.createElement)(e.Fragment,null,(0,e.createElement)("div",{className:"blockline-theme-content"},(0,e.createElement)(u,null))),p=()=>(0,e.createElement)(e.Fragment,null,(0,e.createElement)("div",{className:"sidebar-option-content-wrp"},(0,e.createElement)("div",{className:"content-box"},(0,e.createElement)("h3",null," ",wpapi.themeName,(0,t.__)(" Premium Theme","blockline")),(0,e.createElement)("p",null,(0,t.__)("You’re using the free version of the Vayu X Theme with limited features and functionality. You can upgrade to Blockline Pro Theme for Advanced features, Custom Sections, and more useful options to customize your website easily.","blockline")),(0,e.createElement)("a",{href:"https://themehunk.com/templates/blockline-pro/",target:"_blank",className:"content-link button"}," ",(0,t.__)("Upgrade To Pro","blockline"))),(0,e.createElement)("hr",null),(0,e.createElement)("div",{className:"content-box"},(0,e.createElement)("h3",null," ",(0,t.__)("Why Upgrade?","blockline")),(0,e.createElement)("p",null,(0,t.__)("Upgrading to Blockline Premium you will unlock dozen of unique features that will take your website to the next level. See the Comparison table for more details.","blockline")),(0,e.createElement)("a",{href:"https://themehunk.com/templates/blockline-pro/",target:"_blank",className:"content-link button"}," ",(0,t.__)("Pro Demo","blockline"))),(0,e.createElement)("hr",null),(0,e.createElement)("div",{className:"content-box"},(0,e.createElement)("h3",null," ",(0,t.__)("Leave us a review","blockline")),(0,e.createElement)("p",null,(0,t.__)("We would love to hear your feedback.","blockline")),(0,e.createElement)("a",{href:"https://wordpress.org/support/theme/blockline/reviews/?filter=5",className:"content-link"}," ",(0,t.__)("Submit review","blockline"))),(0,e.createElement)("hr",null),(0,e.createElement)("div",{className:"content-box"},(0,e.createElement)("h3",null," ",(0,t.__)("Video Tutorials","blockline")),(0,e.createElement)("p",null,(0,t.__)("Want a guide? We have video tutorials to walk you through getting started.","blockline")),(0,e.createElement)("a",{href:"https://www.youtube.com/watch?v=EbH5CRujnYQ",target:"_blank",className:"content-link"}," ",(0,t.__)("Watch Videos","blockline"))),(0,e.createElement)("hr",null),(0,e.createElement)("div",{className:"content-box"},(0,e.createElement)("h3",null," ",(0,t.__)("Support","blockline")),(0,e.createElement)("p",null,(0,t.__)("Have a question, we are happy to help! Get in touch with our support team.","blockline")),(0,e.createElement)("a",{href:"https://themehunk.com/contact-us/",target:"_blank",className:"content-link"}," ",(0,t.__)("Submit a Ticket","blockline"))))),h=()=>(0,e.createElement)(e.Fragment,null,(0,e.createElement)("div",{className:"blockline-theme-sidebar-contnet"},(0,e.createElement)(p,null))),E=()=>(0,e.createElement)(e.Fragment,null,(0,e.createElement)("div",{className:"blockline-theme-options-main"},(0,e.createElement)("div",{className:"option-tab-content-wrap"},(0,e.createElement)(d,null)),(0,e.createElement)("div",{className:"option-sidebar-wrap"},(0,e.createElement)(h,null)))),b=()=>(0,e.createElement)(e.Fragment,null,(0,e.createElement)(n,null),(0,e.createElement)(E,null));class v extends e.Component{render(){return(0,e.createElement)(e.Fragment,null,(0,e.createElement)(b,null))}}document.addEventListener("DOMContentLoaded",(function(t){(0,e.render)((0,e.createElement)(v,null),document.getElementById("blockline-theme-setting-page"))}))}},n={};function a(e){var l=n[e];if(void 0!==l)return l.exports;var c=n[e]={exports:{}};return t[e](c,c.exports,a),c.exports}a.m=t,e=[],a.O=function(t,n,l,c){if(!n){var s=1/0;for(m=0;m<e.length;m++){n=e[m][0],l=e[m][1],c=e[m][2];for(var o=!0,r=0;r<n.length;r++)(!1&c||s>=c)&&Object.keys(a.O).every((function(e){return a.O[e](n[r])}))?n.splice(r--,1):(o=!1,c<s&&(s=c));if(o){e.splice(m--,1);var i=l();void 0!==i&&(t=i)}}return t}c=c||0;for(var m=e.length;m>0&&e[m-1][2]>c;m--)e[m]=e[m-1];e[m]=[n,l,c]},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={826:0,431:0};a.O.j=function(t){return 0===e[t]};var t=function(t,n){var l,c,s=n[0],o=n[1],r=n[2],i=0;if(s.some((function(t){return 0!==e[t]}))){for(l in o)a.o(o,l)&&(a.m[l]=o[l]);if(r)var m=r(a)}for(t&&t(n);i<s.length;i++)c=s[i],a.o(e,c)&&e[c]&&e[c][0](),e[c]=0;return a.O(m)},n=self.webpackChunktheme_option=self.webpackChunktheme_option||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))}();var l=a.O(void 0,[431],(function(){return a(834)}));l=a.O(l)}();
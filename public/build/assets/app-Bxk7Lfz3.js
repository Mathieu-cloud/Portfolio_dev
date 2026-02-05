const e=()=>({showName:!0,init(){setInterval(()=>{this.showName=!this.showName},4e3)}});document.addEventListener("alpine:init",()=>{Alpine.data("heroAnimation",e)});

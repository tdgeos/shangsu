var HTMLTODOM=function(b){var a=document.createElement("ul");a.innerHTML=b;return a.firstChild},CREATETOOL=function(a,h,i,A,u){var r='" style="width:62px" ',q='<input type="text" class="item-search-text" name="',p=' value="',o="')value=''\"",n=" onfocus=\"if(value=='",m="onblur=\"if(!value)value='",g="</li>",l='<li class="o-item-con" tool-id=',f="",j=a.type,x=a.bg||"",w=a.title||"",y=a.subtitle||"",c=a.href||"";if(c&&!/^(?:[\w\+\.\-]+:)/.test(c))c="http://"+c;if(u==="add")f='<div class="item-operate-add tool-operate"><div class="item-operate-tip" style="display:none">\u6dfb\u52a0\u5230\u6211\u7684\u5de5\u5177\u7bb1</div></div>';else if(u==="rem")f='<div class="item-operate-rem tool-operate"><div class="item-operate-tip" style="display:none">\u4ece\u6211\u7684\u5de5\u5177\u7bb1\u5220\u9664</div></div>';if(j==="text")var z=l+i+' toolkit-id="'+h+'"><a target="_blank" href="'+c+'" class="o-item-link-con"><span  class="item-icon-wraper"><span class="single-round"></span><span class="item-icon" style="background:url('+x+') no-repeat 0 0;"></span></span><span class="des-content"><span class="k title-hover">'+w+'</span><span class="subtitle">'+y+"</span></span></a>"+f+g;else if(j==="form"){var t="",b=a.param.split(","),B=b.length;if(b.length===1)b='<input type="text" class="item-search-text" name='+b+" />";else if(b.length===2){var d=a.ltip||"",d=m+d+"';\""+n+d+o+p+d+'"',e=a.rtip||"",e=m+e+"';\""+n+e+o+p+e+'"';b=q+b[0]+r+d+"/>"+q+b[1]+r+e+"/>"}if(a.hiddenParam)for(var v=a.hiddenParam.split(","),k=0,B=v.length;k<B;k++){var s=v[k].split("=");t+='<input type="hidden" name="'+s[0]+'" value="'+s[1]+'" />'}var z=l+i+" toolkit-id="+h+'><a target="_blank" href="'+c+'" class="item-icon-wraper"><span class="single-round"></span><span class="item-icon"style="background:url('+x+') no-repeat 0 0 ;"></span></a><div class="des-content"><form method="get" target="_blank" action="'+c+'" ><a target="_blank" class="k title-hover" href="'+c+'">'+w+"</a>"+b+t+'<span class="item-search-but-con"><button class="item-search-but" type="submit">\u67e5\u8be2</button></span></form></div>'+f+g}else if(j==="html")var z='<li class="o-item-con" item-id='+i+" item-type-id="+h+">"+a.html+g;A.appendChild(HTMLTODOM(z))};(function(){var b=T.event,a=T.dom;a.ready(function(){var d="search-text-con",e="search-input-word";T.array.each([e,"soft-text-input"],function(d){var c=T.g(d);if(c){b.on(c,"focus",function(){a.addClass(this.parentNode,"no-tip")});b.on(c,"blur",function(){var b=T.string.trim(this.value);!b&&a.removeClass(this.parentNode,"no-tip")})}});b.on(d,"click",function(l){var f="selected",l=b.get(l),j=l.target,k=a.getAttr(j,"search-des");if(k){for(var i=document.getElementById(d).getElementsByTagName("li"),m=i.length,g=null,h=0;h<m;h++){g=i[h];if(a.hasClass(g,f)){a.removeClass(g,f);break}}a.addClass(j,f);T.g(e).focus();c(T.g("baidu-search-sub"),k)}})});function c(b,c){var a="search-args";if(c=="tieba"){b.action="http://tieba.baidu.com/f";T.g(a).innerHTML='<input type="hidden" name="kw" value="'+b.word.value+'"><input type="hidden" name="sc" value="hao123">'}else if(c=="img"){b.action="http://image.baidu.com/i";T.g(a).innerHTML='<input type="hidden" name="tn" value="baiduimage"><input type="hidden" name="ct" value="201326592"><input type="hidden" name="cl" value="2"><input type="hidden" name="lm" value="-1"><input type="hidden" name="fm" value="hao123">'}else if(c=="zhidao"){b.action="http://zhidao.baidu.com/q";T.g(a).innerHTML='<input type="hidden" name="tn" value="ikaslist"><input type="hidden" name="ct" value="17"><input type="hidden" name="sc" value="hao123"><input type="hidden" name="rn" value="20">'}else if(c=="web"){b.action="http://www.baidu.com/s";T.g(a).innerHTML='<input type="hidden" name="tn" value="sitehao123">'}else if(c=="mp3"){b.action="http://mp3.baidu.com/m";T.g(a).innerHTML='<input type="hidden" name="tn" value="baidump3"><input type="hidden" name="ct" value="134217728"><input type="hidden" name="sc" value="hao123">'}else if(c=="news"){b.action="http://news.baidu.com/ns";T.g(a).innerHTML='<input type="hidden" name="tn" value="news"><input type="hidden" name="sc" value="hao123">'}else if(c=="video"){b.action="http://video.baidu.com/v";T.g(a).innerHTML='<input type="hidden" name="sc" value="hao123">'}return true}})()
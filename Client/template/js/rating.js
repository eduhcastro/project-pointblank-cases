window.widgetG2A=window.widgetG2A||0,function(){var t={extend:function(){if(!(arguments.length<=1)){if(arguments[0]!==!0){var t={};for(var e in arguments)arguments.hasOwnProperty(e)&&this.extend(!0,t,arguments[e]);return t}var n=arguments[1],a=arguments[2];for(var e in a)a.hasOwnProperty(e)&&(n[e]=a[e])}},parseHTML:function(t,e){t=""+t;for(var n in e)e.hasOwnProperty(n)&&(t=t.replace(new RegExp("{{"+n+"}}","g"),e[n]));return t},appendHTML:function(t,e,n){var a=document.createElement(t);for(var r in e)e.hasOwnProperty(r)&&(a[r]=e[r]);n.appendChild(a)},replaceDOMElement:function(t,e){t.parentNode.insertBefore(e,t),t.parentNode.removeChild(t)},sum:function(t){var t,e=0;for(var n in arguments)if(arguments.hasOwnProperty(n)){t=arguments[n];for(var a in t)t.hasOwnProperty(a)&&(e+=t[a])}return e},jsonp:function(t,e){e=this.extend({callbackName:"callback",onSuccess:function(){}},e),window[e.callbackName]=function(t){e.onSuccess(t)};var n={type:"text/javascript",async:!0,src:t};this.appendHTML("script",n,document.getElementsByTagName("head")[0])},getAttribute:function(t,e){var n=t.getAttribute&&t.getAttribute(e)||null;if(!n)for(var a=t.attributes,r=a.length,i=0;r>i;i++)if(a[i].nodeName===e){n=a[i].nodeValue;break}return n},setAttribute:function(t,e,n){return t.setAttribute?t.setAttribute(e,n):void(t[e]=n)}},e=function(t){var e='<a href="{{rating_url}}" class="g2a_id_widget" target="_blank" style="border-radius: 3px; box-shadow: 0 2px 7px 0 rgba(0, 0, 0, 0.33); box-sizing: border-box; color: initial; display: block; font-family: Roboto, sans-serif; line-height: 1em; overflow: hidden; text-align: center; text-decoration: none; width: 220px;"><div class="information" style="background: #fff; border: 0; border-bottom: 1px solid #dbdbdb; box-sizing: border-box; color: #454545; font: inherit; font-size: 13px; font-weight: 700; margin: 0; padding: 17px 0; vertical-align: baseline;">{{header}}</div><div class="rating" style="background: #fff; border: 0; font: inherit; font-size: 12px; margin: 0; padding: 9px 14px; vertical-align: baseline;"><span class="stats" style="border: 0; font: inherit; font-size: 100%; margin: 0; padding: 0; vertical-align: top;"><span class="inactive" style="background-color: #d6d6d6; border: 0; display: inline-block; font: inherit; font-size: 100%; height: 12px; margin: 0; margin-right: 10px; padding: 0; position: relative; vertical-align: top; width: 60px;"><span class="active" style="-o-transition: width 1s ease-in-out; -webkit-transition: width 1s ease-in-out; background-color: #ffb400; border: 0; display: block; font: inherit; font-size: 100%; height: 12px; left: 0; margin: 0; padding: 0; position: absolute; top: 0; transition: width 1s ease-in-out; vertical-align: top; width: 0; z-index: 2;"><span class="stars" style="background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAAAPCAMAAABwbnmhAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABdFBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8AAADwyHpWAAAAenRSTlMAqLXy0tW0KsxSpXt8o1TRdPEISyMkc3gd/aEG7cnK7AWiee/u590iruH66kSK3vf1Z2itClq+Fj/WKD6/9NCS5Dhy+1M5kRrE+GoM/gP5wxlM2ywzuQ8yRlUC6W4SpwGWj42m5VbzB2EOoLwcLtNOdZ9gq9/ig39+xQugMgwAAAABYktHRACIBR1IAAAACXBIWXMAAAsSAAALEgHS3X78AAABw0lEQVQ4y63TaTtCQRQA4NNi3wslS9E0KUW27EqIbBFli0T2fadfbzozt5l85X6Z571nOs89S5D/pwfEqSt5qzeoMpapMpSXXNX9SlRRqUarqlXV1Kqqq1dVWVGaqAEalWiTyaxebm5RZTY1KWoFY0kiC1jbZNQG7R1SnQBdUnYHdEu1WaFHS+QkLkrdAL3UQ4jXQPoo9QH4aT8hAwFip3QQYIhSOwkMENJP/QA+SvuIwUuIhw4DuCl1ESdL1D0CxWc0EByTGndNTEpNTrimpMamZ0alRuoKpc02CzpC7BPDc1o0Ms+6taBpgQ1yPqJpMcyuRh1CLbO8R04zcmkZi42toFb5XNf86wWt+9f4sFcxuLKBim+itpxasxPoGtHAGNZaHPJ2Qdua6rGSmLYY+MNEcWpR9I6IJlEpL5eHf72Hy5tCJcXVXVS0mGgP3Pp9ODjk0TQcHUcyEOQ6AVP21AQnXEE4iJwdQZorl4FzvRv2tEQXl1dsx2zXN2L/fLl8/vbOIvbv/oH9Se4fuZ6st2wePrGhz9c2No+XywuRKP6Kr99CeLxnsa/kg9fyif2IffFKPwhOIBtGhd7weP2Wm/335wdaRV55PZhOeQAAAABJRU5ErkJggg==) center no-repeat; background-size: 100%; border: 0; display: block; font: inherit; font-size: 100%; height: 12px; left: 0; margin: 0; padding: 0; position: absolute; top: 0; vertical-align: top; width: 60px; z-index: 3;"></span></span></span> <strong style="border: 0; font: inherit; font-size: 100%; font-weight: bold; margin: 0; padding: 0; vertical-align: top;">{{rating}}</strong> / {{reviews}} {{reviews_text}}</span></div><div class="footer" style="background: url(data:image/png;base64,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) center no-repeat; background-size: 100%; border: 0; font: inherit; font-size: 100%; height: 22px; margin: 0; padding: 0; vertical-align: baseline;"></div></a>',n="",a={prefix:"g2a_widget_rating",api:"https://id.g2a.com/platform/widget-rating/:userId",callback:"handleG2ARatingWidget",rating_url:"https://id.g2a.com/rating/:userId"},r={header:"Customers love this store!",rating:"0%",reviews:"0"},i={},s=null,A=function(t){a.callback+=window.widgetG2A++,d(t),g(),o()},o=function(){t.jsonp(a.api.replace(":userId",s)+"/?callback="+a.callback,{callbackName:a.callback,onSuccess:function(t){l(t)&&c()}.bind(this)})},l=function(e){if(!e||!e.data||!e.data[0])return!1;var n=e.data[0],a=n.rating?parseInt(1e3*n.rating,10)/10:0,r=t.sum(n.buyer,n.seller);return i={rating:a+"%",reviews:r,id:s},!0},d=function(e){t.setAttribute(e,"data-process","true"),n=e},g=function(){s=t.getAttribute(n,"data-widget-rating")},c=function(){u(),p()},p=function(){setTimeout(function(){n.getElementsByClassName("active")[0].style.width=i.rating||"0"}.bind(this),10)},u=function(){var e=t.extend(r,i);e.reviews_text=1===e.reviews?"review":"reviews",e.rating_url=a.rating_url.replace(":userId",s);var A=t.parseHTML(b(),e),o=document.createElement("div");o.innerHTML=A,t.replaceDOMElement(n,o),n=o},b=function(){return e};return{init:A,className:a.prefix}},n=document.getElementsByClassName(e().className);for(var a in n)if(n.hasOwnProperty(a)){if("true"===t.getAttribute(n[a],"data-process"))continue;var r=new e(t);r.init(n[a])}return!0}();
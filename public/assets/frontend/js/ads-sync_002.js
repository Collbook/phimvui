//AdsByHadarOne
; var bshd1 = bshd1 || {}; 
; bshd1['PUBLISHER_ID'] = bshd1['PUBLISHER_ID'] || 1096 ; 
; bshd1['UUID'] = bshd1['UUID'] || 'a6712b68f5f875fd4b68ade3' ; 
; bshd1['pmli'] = bshd1['pmli'] || {}; 
; setTimeout(function() {if(window['bsInventoryTaggingDone']) return; var js1 = document.createElement('script');js1.src = 'https://static.hadarone.com/bsjs/inventory-tagging.min.js';document.head.appendChild(js1);},1000); 
;(function () {

    var init = function () {
        return new hdoCore({
          "placement": "#bsmasthead-wrapper",
          "vastURL": "//d4.hadarone.com/vast3?plm=1974&uuid=a6712b68f5f875fd4b68ade3&t=1530065641385&url=http%3A%2F%2Fvung.tv%2F",
          "passbackCode": ``,

          "vastRender": true,
          "responsive": true,
          "hideSkip": true,
          //"sticky": true,
          //"stickyPosition": 'tm', //tl , tr , bl, br, tm, bm
        });
    }

    // once load hdoCore
    function loadHDO(e,t){var s,a,c,r="hdoScript",n="Success ! Load "+r,o="Error ! Load "+r;if(document.getElementById(r)){if(t)try{var d=20,i=setInterval(function(){"undefined"!=typeof hdoCore&&(t({success:1,message:n}),clearInterval(i)),0===d&&(t({success:0,message:o}),clearInterval(i)),d--},300)}catch(e){t({success:0,message:o}),clearInterval(i)}}else a=!1,(s=document.createElement("script")).type="text/javascript",s.id=r,s.src=e,s.onload=s.onreadystatechange=function(){a||this.readyState&&"complete"!=this.readyState||(a=!0,t&&t({success:1,message:n}))},(c=document.getElementsByTagName("script")[0]).parentNode.insertBefore(s,c)};
    
  	loadHDO('//static.hadarone.com/ajs/hadarone-ad/hadarone.js', function(e){
        if(e.success){ init(); }
    });

})();

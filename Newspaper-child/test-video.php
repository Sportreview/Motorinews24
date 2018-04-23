<?php
/*
Template Name: Test VIDEO MEDIAMATIC TAG
*/
?>
    <h1>Video Test Mediamatic</h1>

    <div id="mm-player"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>

      var code2 = '<!-- Mediamatic | Masterhead Expand - 775x25 to 775x310 | 319 & 450 -->\
        <div id=\'sy_94075\' align=\'center\'></div>';
      jQuery( "#mm-player" ).append( code2 );

      function detectWidth() {return window.screen.width || window.innerWidth && document.documentElement.clientWidth ? Math.min(window.innerWidth, document.documentElement.clientWidth) : window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;}
      var mmTag = [];
      if(detectWidth() < 1141) {
        mmTag.push({mmSetPubId:319});
        mmTag.push({mmSetWeight:300});
        mmTag.push({mmSetHeight:169});
      } else {
        mmTag.push({mmSetPubId:450});
        mmTag.push({mmSetWeight:775});
        mmTag.push({mmSetHeight:25});
        mmTag.push({mmSetExpandWeight:710});
        mmTag.push({mmSetExpandHeight:399});
      }
      mmTag.push({mmSetDivId:'sy_94075'});
      mmTag.push({mmVideoDisplay:''});


      function Eroga(){

        console.log("Trigger");
        var head= document.getElementsByTagName('head')[0];
        var wf = document.createElement('script');
        wf.src = 'https://videomatictv.com/dsp/show_w.js';
        wf.type = 'text/javascript';
        head.appendChild(wf);

      }//Eroga

      setTimeout(function(){ Eroga();  }, 2000);


    </script>

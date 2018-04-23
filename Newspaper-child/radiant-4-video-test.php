<?php
/*
Template Name: Radiant 4 Video Test
*/
?>
<!doctype html >
<!--[if gt IE 8]><!--> <html lang="it-IT" prefix="og: http://ogp.me/ns#"> <!--<![endif]-->
	<head>
		<title>Radiant 4 Video Test</title>
    <meta charset="UTF-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <script src="http://www.motorinews24.com/wp-content/themes/Newspaper-child/js/isMobileNewtek.js"></script>
    <script src="//cdn.sportreview.it/radiantmp/latest/js/rmp.min.js"></script>
	</head>

<body>

<div class="playerHolder"><div id="SportreviewPlayer-209758847"></div></div>

<script>
  var bitrates = {
      mp4: [ "https://player.vimeo.com/external/209758847.sd.mp4?s=98ef1776a68bd1a0dbb12edc614f2e3361c48ee5&amp;profile_id=164" ]
    };

    if (!isMobileNewtek) {
      var tagpreroll = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/motori.sportreview/altro/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=motorinews24.com&description_url=motorinews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
      var tagpostroll = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/motori.sportreview/altro/postroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=motorinews24.com&description_url=motorinews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
      var tagprerollrepeat = tagpreroll;
    } else {
      var tagpreroll = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/motori.sportreview/mobile/preroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=motorinews24.com&description_url=motorinews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
      var tagpostroll = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/5196/motori.sportreview/mobile/postroll&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=motorinews24.com&description_url=motorinews24.com&correlator='+Math.round(Math.random()*10000000000)+'';
      var tagprerollrepeat = tagpreroll;
    }

    console.log("ARTICLE - Tag preroll: "+tagpreroll);
    console.log("ARTICLE - Tag preroll REP: "+tagprerollrepeat);
    console.log("ARTICLE - postroll: "+tagpostroll);

    var settings = {
      logo: 'http://www.motorinews24.com/wp-content/themes/Newspaper-child/images/logo-mot24-video.png',
      logoLoc:'http://www.motorinews24.com/',
      pathToRmpFiles: 'http://www.motorinews24.com/radiantmp/latest/',
      licenseKey: 'dG54dHd4aXh6aEAxNTA5NDU3',
      bitrates: bitrates,
      skin:'s1',
      delayToFade: 3000,
      debug:false,
      autoplay: false,
      autoHeightMode: true,
      muted: true,
      loop: false,
      mutedAutoplayOnMobile:true,
      sharing: true,
      ads: true,
      adTagUrl: tagpreroll,
      adCountDown:true,
      labels: {
        ads: {
          controlBarCustomMessage: 'Messaggio pubblicitario'
        },
        hint: {
          sharing: 'Condividi',
          quality: 'Qualità',
          speed: 'Velocità',
          captions: 'Sottotitoli',
          audio: 'Audio',
          cast: 'Cast',
          playlist: 'Playlist'
        },
        error: {
          customErrorMessage: 'Il contenuto video non è al momento disponibile.',
          noSupportMessage: 'Manca il supporto per la riproduzione dei video.',
          noSupportDownload: 'Puoi scaricare il video qui.',
          noSupportInstallChrome: 'E\' necessario aggiornare Google Chrome per visualizzare questo contenuto.'
        }
      },
      //poster: '<?php //echo $cover_img; ?>' // eventuale immagine poster
    };

    var elementID = 'SportreviewPlayer-209758847';
    var rmpContainer = document.getElementById(elementID);
    var rmp = new RadiantMP(elementID);

    //Inizio Engine by Riccardo Mel
    //Set up Variabili
    var postRoll_article = 0;
    var videoEnded_article  = 0;

    //trigger Events
    rmpContainer.addEventListener('adcontentresumerequested', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: resume request");
    });
    rmpContainer.addEventListener('adcontentpauserequested', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: pause request");
    });

    //AllAdsCompleted
    rmpContainer.addEventListener('adalladscompleted', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: adalladscompleted");
    if(videoEnded_article == 1 &&  postRoll_article==1){
      videoEnded_article =0; postRoll_article=0;
      rmp.setLoop(false); //abilito postroll successivo intercettando workflow del player loop
      console.log("ARTICLE - Engine by Riccardo Mel: RECALL PREROLL");
      rmp.loadAds(tagprerollrepeat);
    }
    console.log("ARTICLE - Engine by Riccardo Mel: videoEnded: "+videoEnded_article+"PostRoll:"+postRoll_article);
    document.getElementById('slideplayer-container').setAttribute('style', 'width:100%; position:relative; top:inherit; right:inherit; z-index:1; box-shadow: none;');
    });
    //AllAdsCompleted

    //Ended events
    rmpContainer.addEventListener('ended', function () {
        //Setto video ended
        videoEnded_article=1;
        //Se postroll è 0
        if(postRoll_article == 0){
          postRoll_article = 1;
          console.log("ARTICLE - Engine by Riccardo Mel: POSTROLL");
          rmp.loadAds(tagpostroll);
          rmp.setLoop(true);//Riavvio ciclo
        }
        console.log("ARTICLE - Engine by Riccardo Mel: Ended Video - videoEnded:"+videoEnded_article);
    });
    //Ended

    //AdError
    rmpContainer.addEventListener('aderror', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: aderror: ");
    if(videoEnded_article == 1 &&  postRoll_article==1){
      videoEnded_article =0; postRoll_article=0;
      rmp.setLoop(false);  //abilito postroll successivo intercettando workflow del player loop
      console.log("ARTICLE - Engine by Riccardo Mel: RECALL PREROLL");
      rmp.loadAds(tagprerollrepeat);
    }
    console.log("ARTICLE - Engine by Riccardo Mel: videoEnded: "+videoEnded_article+" PostRoll:"+postRoll_article);
    });
    //AdError

    rmpContainer.addEventListener('adloaded', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: adloaded");
    });

    rmpContainer.addEventListener('ready', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: ready");
    });

    rmpContainer.addEventListener('pause', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: pause");
    });

    rmpContainer.addEventListener('adclick', function () {
    console.log("ARTICLE - Engine by Riccardo Mel: adclick");
    rmp.play();
    });

    //fix fullscreen bug
    function FullScreenOnFix() {
      document.getElementById("at4-share").style.display = "none !important";
    }
    rmpContainer.addEventListener('enterfullscreen', FullScreenOnFix);

    function FullScreenOffFix() {
      document.getElementById("at4-share").style.display = "inherit";
    }
    rmpContainer.addEventListener('exitfullscreen', FullScreenOffFix);

    //Init
    rmp.init(settings);
</script>
  
</body>
</html>
function PlayVideo(player,width,height,video,image,canale,autostart,repeat,mute){


  // Variabili
  if(autoplay === "false") { autoplay = false; } else { autoplay = true; }
  if(repeat === "false") { repeat = false; } else { repeat = true; }
  if(mute === "false") { mute = false; } else { mute = true; }

  if(DebugCustom) { console.log("ARTICLE autoplay"+autoplay); }
  if(DebugCustom) { console.log("ARTICLE repeat"+repeat); }
  if(DebugCustom) { console.log("ARTICLE mute"+mute); }


  //By Riccardo Mel
  //V2.1


  //Variabili utenti
  var DebugCustom = true;
  //Variabili contenuti
  var poster = poster;
  var url = url;


  //Bitrates
  var bitrates = {
    mp4: [video] // url video
  };


  //ADV
  if (!isMobileNewtek) {
    //Desktop
    var prerollTag = "https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/21624773413/Motorinews24.com/Preroll_Articoli&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=__referrer__&description_url=__domain__&correlator=__timestamp__";
    var waterfallArray = [
      'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/21624773413/Motorinews24.com/Preroll_Smartclip&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=__referrer__&description_url=__domain__&correlator=__timestamp__',
      'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/21624773413/Motorinews24.com/Preroll_4W_Marketplace&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=__referrer__&description_url=__domain__&correlator=__timestamp__'
    ];
  } else {
    //Mobile
    var prerollTag = "https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/21624773413/Motorinews24.com/Preroll_Mobile&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=__referrer__&description_url=__domain__&correlator=__timestamp__";
    var waterfallArray = [
      'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/21624773413/Motorinews24.com/Preroll_Smartclip&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=__referrer__&description_url=__domain__&correlator=__timestamp__',
      'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/21624773413/Motorinews24.com/Preroll_4W_Marketplace&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=__referrer__&description_url=__domain__&correlator=__timestamp__'
    ];
  }


  //Settings
  var settings = {
    logo: 'http://www.motorinews24.com/wp-content/themes/Newspaper-child/images/logo-mot24-video.png',
    logoLoc: 'http://www.motorinews24.com/',
    pathToRmpFiles: '//cdn.sportreview.it/radiantmp/latest/',
    licenseKey: 'dG54dHd4aXh6aEAxNTA5NDU3',
    gaTrackingId: 'UA-92514278-1',
    gaCategory: 'Video Articolo',
    bitrates: bitrates,
    muted: mute,
    delayToFade: 3000,
    autoplay: autoplay,
    ads: true,
    adDisableCustomPlaybackForIOS10Plus: true,//skippable ads ios10+
    adTagUrl: prerollTag,
    adTagWaterfall: waterfallArray,
    adPauseOnClick: false,
    adTagReloadOnEnded: true,
    poster: poster,
    autoHeightMode: true,
    adCountDown: true,
    skinAccentColor: 'ed1c24',
    labels: {
      ads: {
        controlBarCustomMessage: 'Messaggio promozionale'
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
    }//labels
  };
  //Settings
  var elementID = 'SportreviewPlayer';
  var rmp = new RadiantMP(elementID);
  var rmpContainer = document.getElementById(elementID);


} //PlayVideo

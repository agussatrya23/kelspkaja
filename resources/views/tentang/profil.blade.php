<!DOCTYPE html>
<html>
<head>
<meta name="description" content="Virtual Tour"/>
<script>(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,"script","//www.google-analytics.com/analytics.js","ga");ga("create", "UA-116087-1", "auto"); ga("send", "pageview");ga("create", "UA-116087-3", "auto", "client1"); ga("client1.send", "pageview");</script>
    <title>Gedung Graha Sewaka Dharma Denpasar</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="user-scalable=no, initial-scale=0.5, width=device-width" />
    <script src="{{ asset('lib/tdvplayer.js') }}"></script>
    <script src="{{ asset('script.js') }}"></script>
    <script src="{{ asset('lib/ThreeWebGL.js') }}"></script>
    <script type="text/javascript">
        var player;
        var playersPlayingTmp = [];
        var isInitialized = false;

        function loadTour()
        {
            if(isInitialized)
                return;

            isInitialized = true;

            var beginFunc = function(event){
                if(event.name == 'begin')
                {
                    var camera = event.data.source.get('camera');
                    if(camera && camera.get('initialSequence') && camera.get('initialSequence').get('movements').length > 0)
                        return;
                }

                player.unbindOnObjectsOf('PanoramaPlayListItem', 'begin', beginFunc, player, true);
                player.unbind('stateChange', beginFunc, player, true);
                window.parent.postMessage("tourLoaded", '*');

                disposePreloader();
            };

            var settings = new TDV.PlayerSettings();

            settings.set(TDV.PlayerSettings.CONTAINER, document.getElementById('viewer'));
            settings.set(TDV.PlayerSettings.SCRIPT_URL, '{{ asset('script.js') }}');
            settings.set(TDV.PlayerSettings.FLASH_EXPRESS_INSTALLER_URL, '{{ asset('lib/ExpressInstall.swf') }}');
            settings.set(TDV.PlayerSettings.FLASH_AUDIO_PLAYER_URL, '{{ asset('lib/AudioPlayer.swf') }}');
            settings.set(TDV.PlayerSettings.FLASH_PANORAMA_PLAYER_URL, '{{ asset('lib/PanoramaRenderer.swf') }}');
            settings.set(TDV.PlayerSettings.THREE_JS_WEBGL_URL, '{{ asset('lib/ThreeWebGL.js') }}');
            settings.set(TDV.PlayerSettings.WEBVR_POLYFILL_URL, '{{ asset('lib/WebVRPolyfill.js') }}');
            settings.set(TDV.PlayerSettings.HLS_URL, '{{ asset('lib/Hls.js') }}');
            window.tdvplayer = player = TDV.PlayerAPI.create(settings);
            player.bind('stateChange', beginFunc, player, true);
            player.bindOnObjectsOf('PanoramaPlayListItem', 'begin', beginFunc, player, true);
            player.bindOnObject('rootPlayer', 'start', function(e){
                var queryDict = {}; location.search.substr(1).split("&").forEach(function(item) {var k = item.split("=")[0], v = decodeURIComponent(item.split("=")[1]);queryDict[k] = v});
                if("media-index" in queryDict){
                    setMediaByIndex(parseInt(queryDict["media-index"]) - 1);
                }
                else if("media-name" in queryDict){
                    setMediaByName(queryDict["media-name"]);
                }
            }, player, false);

            /* Listen messages */
            window.addEventListener('message', function (e) {
                //Listen to messages for make actions to player in the format function:param1,param2
                var action = e.data;
                if (action == 'pauseTour' || action == 'resumeTour') {
                    this[action].apply(this);
                }
            });
        }

        function pauseTour()
        {
            var playLists = player.getByClassName('PlayList');
            for(var i = 0, count = playLists.length; i<count; i++)
            {
                var playList = playLists[i];
                var index = playList.get('selectedIndex');
                if(index != -1)
                {
                    var item = playList.get('items')[index];
                    var itemPlayer = item.get('player');
                    if(itemPlayer && itemPlayer.pause)
                    {
                        playersPlayingTmp.push(itemPlayer);
                        itemPlayer.pause();
                    }
                }
            }

            player.getById('pauseGlobalAudios')();
        }

        function resumeTour()
        {
            while(playersPlayingTmp.length)
            {
                var viewer = playersPlayingTmp.pop();
                viewer.play();
            }

            player.getById('resumeGlobalAudios')();
        }

        function setMediaByIndex(index)
        {
            if(window.tdvplayer !== undefined) {
                var rootPlayer = window.tdvplayer.getById('rootPlayer');
                rootPlayer.setMainMediaByIndex(index);
            }
        }

        function setMediaByName(name)
        {
            if(window.tdvplayer !== undefined) {
                var rootPlayer = window.tdvplayer.getById('rootPlayer');
                rootPlayer.setMainMediaByName(name);
            }
        }

        function showPreloader()
        {
            var preloadContainer = document.getElementById('preloadContainer');
            preloadContainer.style.opacity = 1;
        }

        function disposePreloader()
        {
            var transitionEnd = transitionEndEventName();
            var preloadContainer = document.getElementById('preloadContainer');



            var transitionEndName = transitionEndEventName();
            if(transitionEndName)
            {
                preloadContainer.addEventListener(transitionEnd, hide, false);

                preloadContainer.style.opacity = 0;
            }
            else
            {
                hide();
            }

            function hide()
            {
                preloadContainer.style.visibility = 'hidden';
                preloadContainer.style.display = 'none';
            }

            function transitionEndEventName () {
                var i,
                        undefined,
                        el = document.createElement('div'),
                        transitions = {
                            'transition':'transitionend',
                            'OTransition':'otransitionend',
                            'MozTransition':'transitionend',
                            'WebkitTransition':'webkitTransitionEnd'
                        };

                for (i in transitions) {
                    if (transitions.hasOwnProperty(i) && el.style[i] !== undefined) {
                        return transitions[i];
                    }
                }

                return undefined;
            }
        }

        function onBodyClick(){
            document.body.removeEventListener("click", onBodyClick);
            document.body.removeEventListener("touchend", onBodyClick);
            loadTour();
        }

        function onLoad() {
            if (isOVRWeb()){
                showPreloader();
                loadTour();
                return;
            }

            showPreloader();
loadTour()
        }

        function playVideo(video) {
            function isSafariDesktopV11orGreater() {
                return /^((?!chrome|android).)*safari/i.test(navigator.userAgent) && parseFloat(/Version\/([0-9]+\.[0-9]+)/i.exec(navigator.userAgent)[1]) >= 11;
            }

            function detectUserAction() {
                var onVideoClick = function(e) {
                    if(video.paused) {
                        video.play();
                    }
                    video.muted = false;
                    e.stopPropagation();
                    e.stopImmediatePropagation();
                    e.preventDefault();
                    video.removeEventListener('click', onVideoClick);
                    video.removeEventListener('touchend', onVideoClick);
                };
                video.addEventListener("click", onVideoClick);
                video.addEventListener("touchend", onVideoClick);
            }

            if (isSafariDesktopV11orGreater()) {
                video.muted = true;
                video.play();
            } else {
                var canPlay = true;
                var promise = video.play();
                if (promise) {
                    promise.catch(function() {
                        video.muted = true;
                        video.play();
                        detectUserAction();
                    });
                } else {
                    canPlay = false;
                }

                if (!canPlay || video.muted) {
                    detectUserAction();
                }
            }
        }

        function isOVRWeb(){
            return window.location.hash.substring(1).split('&').indexOf('ovrweb') > -1;
        }
    </script>
    <style type="text/css">
        html, body { background-color: #0099FF;  width: 100%; height: 100%; margin: 0; padding: 0; }
        #viewer { background-color: #0099FF; z-index:1; position:absolute; width: 100%; height: 100%; top: 0; }
        #preloadContainer { z-index:2; position:relative; width:100%; height:100%; transition: opacity 1s; -webkit-transition: opacity 1s; -moz-transition: opacity 1s; -o-transition: opacity 1s;}
    </style>
</head>
<body onload="onLoad()">
    <div id="preloadContainer" style="background-color:rgba(0,153,255,1)"></div>
    <div id="viewer"></div>
</body>
</html>

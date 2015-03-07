/**
 * Created by gongchen on 15-1-25.
 */
require.config({
    paths: {
        "jquery": "../build/jquery-1.11.0-min",
        "jqaf": "../build/jq.appframework.min",
        "appframeworkui": "../build/ui/appframework.ui",
        "af": "../build/appframework",
        "juicer": "../build/juicer-min",

        "tool" : "tool",
        "scroll" : "scroll",
        "startMain" : "startMain",
        "editPanel" : "editPanel",
        "chatPanel" : "chatPanel",
        "loginPanel" : "loginPanel",
        "signupPanel" : "signupPanel",
        "tucaoPanel" : "tucaoPanel",
        "userPanel" : "userPanel",

        "af.scroller" : "../plugins/af.scroller"
    },
    shim: {
        jqaf: {
            deps: [
                'jquery'
            ]
        },
        appframeworkui:{
            deps: [
                'jqaf'
            ]
        },
        juicer: {
//            deps: [
//                'jquery'
//            ],
            exports: "juicer"
        },
        startMain: {
            deps: [
                'tool'
            ]
        }
    }
});


// Now that we have configured a named alias for the App Framework
// library, let's try to load it using the named module.
require(
    ["jquery","tool","juicer","af","jqaf","appframeworkui","af.scroller","startMain","editPanel",
    "chatPanel","loginPanel","signupPanel","tucaoPanel","userPanel"],//,"jqaf","appframeworkui"],
    function(jquery,tool,juicer, af, jqaf, appframeworkui, af_scroller, startMain){

        //注册自定义函数
        juicer.register('jsDateDiff', jsDateDiff);
        juicer.register('random29', random29);

        // set to ios7 ---cky
        $.ui.ready(function() {
            $("#afui").get(0).className = 'ios7';
        });

        $.ui.autoLaunch = false;
        $.ui.backButtonText = " ";

        if (!((window.DocumentTouch && document instanceof DocumentTouch) || 'ontouchstart' in window)) {
            var script = document.createElement("script");
            script.src = "plugins/af.desktopBrowsers.js";
            var tag = $("head").append(script);
        }

        //$("#hotMain").attr('data-load') = "startMain.startHot";
        //startMain.startHot();

        $(document).ready(function() {
            $.ui.launch();
            $("#loginError").hide();
            $("#distanceSelectDiv").hide();
            $.ui.updateBadge("#messageIcon",'2','tr','red');
        });

        var onDeviceReady = function() {// called when Cordova is ready
            if (window.Cordova && navigator.splashscreen) {// Cordova API detected
                $.ui.launch();
                navigator.splashscreen.hide();
                // hide splash screen
            }
        };
        document.addEventListener("deviceready", onDeviceReady, false);

        $(document).on("loadpanel","#hotMain", startMain.startHot);
    }
);
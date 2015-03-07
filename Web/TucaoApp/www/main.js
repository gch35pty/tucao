///**
// * Created by gongchen on 15-1-25.
// */
//require.config({
//    paths: {
//        "jquery": "./build/jquery-1.11.0.min",
//        "jqaf": "./build/jq.appframework.min",
//        "appframeworkui": "./build/ui/appframework.ui",
//        "appframework": "./build/appframework",
//        "juicer": "./build/juicer-min"
//    },
//    shim: {
//        jqaf: {
//            deps: [
//                'jquery'
//            ]
//        },
//        appframeworkui:{
//            deps: [
//                'jqaf'
//            ]
//        }
//    }
//});
//
//
//// Now that we have configured a named alias for the App Framework
//// library, let's try to load it using the named module.
//require(
//    ["jquery","jqaf","appframeworkui"],//,"jqaf","appframeworkui"],
//    function(){
//        //******此段定义常量********//
//        var userId = 2;
//        var distance = 1500;
//        var FIRST_LENGTH = 10;
//        var newTucaoId =-1;
//        var position = {
//            coords : {
//                latitude : 31.274913,
//                longitude : 120.755755
//            }
//        };
//        // var webRoot = "http://127.0.0.1/Web/tucao/index.php?r=tc_users/";
//        var webRoot = "http://127.0.0.1/tucao/index.php/";
//        var map = null;
//        var curTucaoId = 8;
//
//        //注册自定义函数
//        juicer.register('jsDateDiff', jsDateDiff);
//        juicer.register('random29', random29);
//
//        // set to ios7 ---cky
//        $.ui.ready(function() {
//            $("#afui").get(0).className = 'ios7';
//        });
//
//        $.ui.autoLaunch = false;
//        $.ui.backButtonText = " ";
//
//        $(document).ready(function() {
//            $.ui.launch();
//            $("#loginError").hide();
//            $("#distanceSelectDiv").hide();
//            $.ui.updateBadge("#messageIcon",'2','tr','red');
//        });
//
//        var onDeviceReady = function() {// called when Cordova is ready
//            if (window.Cordova && navigator.splashscreen) {// Cordova API detected
//                $.ui.launch();
//                navigator.splashscreen.hide();
//                // hide splash screen
//            }
//        };
//        document.addEventListener("deviceready", onDeviceReady, false);
//    }
//);
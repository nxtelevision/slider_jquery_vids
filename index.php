<?php
session_start() ;
require_once('CAS/CAS.php');
phpCAS::client(CAS_VERSION_2_0,'cas.my.ecp.fr',443,'');
phpCAS::setLang(PHPCAS_LANG_FRENCH);
phpCAS::setNoCasServerValidation();
phpCAS::forceAuthentication();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NX Télévision - Slider</title>
    <style type="text/css">
        html,body{
            margin: 0;
            padding: 0;
            height: 100%;
        }
        #imgNX_wrapper{
            display: inline-block;
            margin-top: -50px;
            margin-bottom: -50px;
        }
        #slider_wrapper{
            text-align: center;
            height: 100%;
            background-color: #1D1D1D;
        }
        #slider_wrapper h1{
            color: white;
            font-family: Arial;
            margin-top: -30px;
        }
        #slider1_container{
            position: relative;
            width: 900px;
            height: 400px; 
            display: inline-block;
        }
        #slides_container{
            position: absolute;
            left: 0px;
            top: 0px;
            width: 900px;
            height: 400px; 
            overflow: hidden;
        }
        #slides_container video{
            width: 900px;
            height: 400px; 
        }
        #slides_container .caption{
            left: 200px;
            width: 500px;
            padding: 5px;
            top: 0px;
            background-color: rgba(0,0,0,0.5);
            position: absolute;
        }
        #slides_container .caption a{
            color : white;
            cursor: pointer;
        }
        #slides_container .caption a:hover{
            text-decoration: none;
        }
    </style>
</head>
<body style="font-family:Arial, Verdana;background-color:#fff;">
    <!-- it works the same with all jquery version from 1.x to 2.x -->
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->

    <script>
        jQuery(document).ready(function ($) {
            var options = {
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 0,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
        });
    </script>
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    <div id="slider_wrapper">
        <img id="imgNX_wrapper" src="img/Fat_logo_NX_fond_noir.jpg">
        <h1>Direct GDA</h1>
        <div id="slider1_container" style="">
            <!-- Slides Container -->
            <div u="slides" style="" id="slides_container">
                <?php
                $folder="videos/";  
                $files = $files = scandir($folder);
                foreach($files as $file) {
                    if($file != '.' and $file != '..')
                        echo '<div><span class="caption"><a href="'.$folder.$file.'">'.$file.'</a></span><video u="video" controls><source src="'.$folder.$file.'" type="video/mp4">Your browser does not support the video tag.</video></div>';
                }
                ?>
            </div>
            
            <!--#region Arrow Navigator Skin Begin -->
            <!-- Help: http://www.jssor.com/tutorial/set-arrow-navigator.html -->
            <style>
                /* jssor slider arrow navigator skin 03 css */
                /*
                .jssora03l                  (normal)
                .jssora03r                  (normal)
                .jssora03l:hover            (normal mouseover)
                .jssora03r:hover            (normal mouseover)
                .jssora03l.jssora03ldn      (mousedown)
                .jssora03r.jssora03rdn      (mousedown)
                .jssora03l.jssora03lds      (disabled)
                .jssora03r.jssora03rds      (disabled)
                */
                .jssora03l, .jssora03r {
                    display: block;
                    position: absolute;
                    /* size of arrow element */
                    width: 55px;
                    height: 55px;
                    cursor: pointer;
                    background: url(img/a03.png) no-repeat;
                    overflow: hidden;
                }
                .jssora03l { background-position: -3px -33px; }
                .jssora03r { background-position: -63px -33px; }
                .jssora03l:hover { background-position: -123px -33px; }
                .jssora03r:hover { background-position: -183px -33px; }
                .jssora03l.jssora03ldn { background-position: -243px -33px; }
                .jssora03r.jssora03rdn { background-position: -303px -33px; }

                .jssora03l.jssora03lds { background-position: -3px -33px; opacity: .3; pointer-events: none; }
                .jssora03r.jssora03rds { background-position: -63px -33px; opacity: .3; pointer-events: none; }
            </style>
            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora03l" style="top: 173px; left: 8px;">
            </span>
            <!-- Arrow Right -->
            <span u="arrowright" class="jssora03r" style="top: 173px; right: 8px;">
            </span>
            <!--#endregion Arrow Navigator Skin End -->
            <a style="display: none" href="http://www.jssor.com">jQuery Slider</a>
        </div>
    </div>
    <!-- Jssor Slider End -->
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/styles/stylesheet.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/packaged/css/semantic.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/script/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/script/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/script/jssor.slider.mini.js"></script>
    <title>
        <?php echo $title; ?> |Eat|Sleep|Code Programming Club IIT Kanpur
    </title>
</head>
<body background="<?php echo base_url(); ?>resources/images/seamless-white-texture.jpg"  bgproperties="fixed">
    <div id="top">
        <div id="logo">
            <a href="site/home"><img src="<?php echo base_url(); ?>resources/images/logo.png"></a>
        </div>
        
        <div id="animation">
            <script>
            jQuery(document).ready(function ($) {
            var options = { $AutoPlay: true };
            var jssor_slider1 = new $JssorSlider$('slider1_container', options);
            });
            </script>
            <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 400px; height: 150px;">
                <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 400px; height: 150px;">
                    <div><img class="rounded ui image" u="image" src="<?php echo base_url(); ?>resources/images/languages.jpg" /></div>
                    <div><img class="rounded ui image" u="image" src="<?php echo base_url(); ?>resources/images/matrix.jpg" /></div>
                    <div><img class="rounded ui image" u="image" src="<?php echo base_url(); ?>resources/images/onlinejudge_small.jpg" /></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ui divided grid">
        <div class="row">
            <div class="ten wide column">
                <nav class="menu">
                    <div class="ui purple large inverted menu">
                        <a class="<?php if($active=='1') echo"active ";?> item" href="<?php echo base_url(); ?>site/home"><i class="home icon"></i> Home</a>

                        <a class="<?php if($active=='2') echo"active ";?>item" href="<?php echo base_url(); ?>site/tutorial">Tutorials</a>

                        <a class="<?php if($active=='3') echo"active ";?>item" href="<?php echo base_url(); ?>site/projects">Project</a>

                        <a class="<?php if($active=='4') echo"active ";?>item" href="<?php echo base_url(); ?>site/blog">Blog</a>

                        <a class="<?php if($active=='5') echo"active ";?>item" href="<?php echo base_url(); ?>site/forum">Forum</a>

                        <a class="item" href="http://pclub.in/onj/" target="_blank">Online Judge</a>

                        <a class="<?php if($active=='6') echo"active ";?>item" href="<?php echo base_url(); ?>site/team">Team</a>

                        <a class="<?php if($active=='7') echo"active ";?>item" href="<?php echo base_url(); ?>site/about">About Us</a>

                        <a class="<?php if($active=='8') echo"active ";?>item" >Calender</a>
                    </div>
                </nav>
            </div>

            <div class="one wide column">
                <a class="ui green button" href="<?php echo base_url(); ?>site/<?php 
                    if ( $this->session->userdata('is_logged_in'))echo 'logout';
                    else echo 'login' ;?> ">
                 <?php 
                    if ( $this->session->userdata('is_logged_in')){
                        echo 'Logout';
                    } else{
                        echo 'Login' ;
                    }
                ?> </a>
<!--                 <a class="ui green button" href="<?php echo base_url(); ?>site/login">Login </a> -->

                        <!-- <div class="right menu">
                          <div class="item">
                            <div class="ui icon input">
                              <input type="text" placeholder="Search...">
                              <i class="search link icon"></i>
                            </div>
                          </div>
                        </div> -->
            </div>
        </div>
    </div>
    <!-- <nav class="menu">
        <div id="menu_div">
        <ul>
        <li><a href="<?php echo base_url(); ?>site/home">Home</a></li>
        <li><a href="<?php echo base_url(); ?>site/tutorial">Tutorials</a></li>
        <li><a href="<?php echo base_url(); ?>site/projects">Projects</a></li>
        <li><a href="<?php echo base_url(); ?>site/blog">Blog</a></li>
        <li><a href="<?php echo base_url(); ?>site/forum">Forum</a></li>
        <li><a href="http://pclub.in/onj/" target="_blank">Online Judge</a></li>
        <li><a href="<?php echo base_url(); ?>site/team">Team</a></li>
        <li><a href="<?php echo base_url(); ?>site/about">About Us</a></li>
        <li><a href="calender">Calender</a></li>
        </ul>
        </div>
    </nav> -->
    
    
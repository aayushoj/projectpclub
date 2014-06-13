<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/styles/stylesheet.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/packaged/css/semantic.css">
    <script src="<?php echo base_url(); ?>resources/script/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/packaged/javascript/semantic.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/script/script.js"></script>
    
    <title>
        <?php echo $title; ?>
    </title>
</head>
<body background="<?php echo base_url(); ?>resources/images/seamless-white-texture.jpg"  bgproperties="fixed">
<!--     <div id="top">

        
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
    </div> -->
    
    <div class="ui divided grid">
        <div class="row">
            <div class="one wide column">
                    <a href="site/home"><img src="<?php echo base_url(); ?>resources/images/logo.png"></a>
            </div>
            <div class="eight wide column" >
                <nav class="menu">
                    <div class="ui purple inverted menu" >
                        <a class="<?php if($active=='1') echo"active ";?> item" href="<?php echo base_url(); ?>site/home"><i class="home icon"></i> Home</a>

                        <a class="<?php if($active=='2') echo"active ";?>item" href="<?php echo base_url(); ?>site/tutorial">Tutorials</a>

                        <a class="<?php if($active=='3') echo"active ";?>item" href="<?php echo base_url(); ?>site/projects">Project</a>

                        <a class="<?php if($active=='4') echo"active ";?>item" href="<?php echo base_url(); ?>site/blog">Blog</a>

                        <a class="<?php if($active=='5') echo"active ";?>item" href="<?php echo base_url(); ?>site/forum">Forum</a>

                        <a class="item" href="http://pclub.in/onj/" target="_blank">Online Judge</a>

                        <a class="<?php if($active=='6') echo"active ";?>item" href="<?php echo base_url(); ?>site/about">About Us</a>

                        <a class="<?php if($active=='8') echo"active ";?>item" >Calender</a>
                        <?php 
                            if($this->session->userdata('admin')){
                                $a= "<a class='" ;
                                $a .= $active=='7' ? "active " : "" ;
                                $a .= "item' href='" . base_url() . "site/admin_panel'>Admin</a>";
                                echo $a;
                            }
                        ?>
                    </div>
                </nav>
            </div>

            <div class="two wide column">
                <?php
                    if ($this->session->userdata('is_logged_in')){
                        echo "<div style='margin:20px;'>";
                                echo "<div class='ui red labeled icon top right pointing dropdown button'>";
                                echo "<span class='text' style='text-transform: lowercase;'>". $this->session->userdata('username')  . "</span>";
                                echo "<i class='settings icon'></i>";
                                echo "<div class='menu'>";
                                    echo "<div class='item'>" . " <a href='" . base_url() . "site/account/" . $this->session->userdata('username') . "'><i class='user icon'></i>Account</a></div>";
                                    echo "<div class='item'>" . " <a href='" . base_url() . "site/logout' ><i class='off icon'></i>Logout</a></div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    }
                    else{
                        echo "<div style='margin: 10px 50px'>";
                        echo "<a class='ui green button' href='" . base_url() . "site/login'>" . "Login" . "</a>";
                        echo "</div>";
                    }

                 ?>

                        <!-- <div class="right menu">
                          <div class="item">          style='font-size:15px; float:right; margin:10px 10px 0px 0px;'     style='margin:10px; font-size:15px; text-transform: lowercase; text-decoration:underline; '
                            <div class="ui icon input">
                              <input type="text" placeholder="Search...">
                              <i class="search link icon"></i>
                            </div>
                          </div>
                        </div> -->
            </div>
        </div>
    </div>
    
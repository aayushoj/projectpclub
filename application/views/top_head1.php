<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/styles/stylesheet.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/packaged/css/semantic.css">
    <script src="<?php echo base_url(); ?>resources/script/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/script/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/packaged/javascript/semantic.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/script/script.js"></script>
    <script type="text/javascript">


    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste moxiemanager"
        ],

        height: "200",
        width:"1000",

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
    </script>
    
    <title>
        <?php echo $title; ?>
    </title>
</head>
<body background="<?php echo base_url(); ?>resources/images/background.jpg"  bgproperties="fixed" style="margin:0px;padding-top:60px;">
    <div style="background-color:#383838 ;height:40px;margin:0px;width:100%;top:0px; " class="ui fixed transparent inverted main menu">
        <nav class="menu_ex" style="margin-left:100px;display:block;">
            <a  href="<?php echo base_url(); ?>site/home"><div class="<?php if($active=='1') echo"active";?>" style="color:white;"><i class="home icon"></i> Home</div></a>

            <a  href="<?php echo base_url(); ?>site/tutorial"><div class="<?php if($active=='2') echo"active";?>" style="color:white;">Tutorials</div></a>

            <a  href="<?php echo base_url(); ?>site/projects"><div class="<?php if($active=='3') echo"active";?>" style="color:white;">Project</div></a>

            <a  href="<?php echo base_url(); ?>forum"><div class="<?php if($active=='a') echo"active";?>" style="color:white;">Forum</div></a>

            <a  href="http://pclub.in/onj/" target="_blank"><div class="<?php if($active=='a') echo"active";?>" style="color:white;">Online Judge</div></a>

            <a  href="<?php echo base_url(); ?>site/about"><div class="<?php if($active=='4') echo"active";?>" style="color:white;">About Us</div></a>

            <a href="<?php echo base_url(); ?>site/calender"><div class="<?php if($active=='5') echo"active";?>" style="color:white;">Calender</div></a>
            <?php 
                if($this->session->userdata('admin')){
                    $a ='<div class="ui compact menu" style="background-color:#383838;">';
                    $a .="<div class='ui simple dropdown item' style='margin:0px 10px;padding:10px;'>";
                        $a .= "<a style='color:white;'>Admin</a>";
                        $a .= "<div class='menu'>
                            <a href='" . base_url() . "site/admin_panel_tutorial' id='admin_menu'> <div class='item' style='font-size:15px;width:170px;'>Add Tutorial</div></a>
                            <a href='" . base_url() . "site/admin_panel_event' id='admin_menu'><div class='item' style='font-size:15px;width:170px;'>Add Event</div></a>
                            <a href='" . base_url() . "site/update_codechef_database' id='admin_menu'><div class='item' style='font-size:15px;width:170px;'>Update Codechef Data</div></a>";
                    $a.="</div></div></div>
                    ";
                    echo $a;

                }

                if ($this->session->userdata('is_logged_in')){
                    echo '<div class="ui compact menu" style="float:right;background-color:#383838;margin-right:30px;">';
                        echo "<div class='ui simple dropdown item' style='margin-right:30px;margin: 0px 10px;padding:10px;color:white;'>";
                            echo "<i class='inverted settings icon' ></i>";
                            echo "<a style='text-transform: lowercase;color:white;'>". $this->session->userdata('username')  . "</a>";
                            echo "<div class='menu'>";
                                echo "<a id='admin_menu' href='" . base_url() . "site/account/" . $this->session->userdata('username') . "' ><div class='item' style='font-size:15px;width:120px;'><i class='user icon'></i>Account</div></a>";
                                echo "<a id='admin_menu' href='" . base_url() . "site/logout' ><div class='item' style='font-size:15px;width:120px;'><i class='off icon'></i>Logout</div></a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
                else{
                    echo "<a onclick='login_modal();'>";
                    echo "<div style='float:right;margin-right:40px;margin-left:0px;color:white;'>Login</div>";
                    echo "</a>";
                    echo "</nav>";
                    echo "<div style='float:right;margin:0px;padding:10px;' > ";
                    echo "<a style='color:white;font-size:20px;' >/</a>";
                    echo "</div>";

                    echo "<nav class='menu_ex'>";
                    echo "<a onclick='signup_modal();' >";
                    echo "<div style='float:right;margin-right:0px;color:white;'>Register</div>";
                    //href='" . base_url() . "site/signup'
                    echo "</a>";

                }
              echo "</nav>";
            ?>

    </div>

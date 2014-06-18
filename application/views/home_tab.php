<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/styles/stylesheet.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/packaged/css/semantic.css">
    <title>
        Eat|Sleep|Code Programming Club IIT Kanpur
    </title>
    <style>
.main_page img
{
    
    margin:10px;
/*    display:inline-block;*/
    
}
.first_row 
{
    
    display:block;
}
.first_row img
{
    height:110px;
    width:260px;
    
}
.second_row
{
    display:block;
    height:250px;
    width:570px;
}
.second_row img
{
   /* height:250px;
    width:570px;*/
   
}
.third_row
{
    display:block;
}
.third_row img
{
    height:110px;
    width:260px;
   
}

</style>
</head>


<body background="<?php echo base_url(); ?>resources/images/bg.jpg"  bgproperties="fixed">
<div class="main_page">
        <div class="first_row">
            <div class="ui four column divided grid" style="border:0px;">
                <div class="row">
                    <div class="column">
                        <a href="http://pclub.in/onj" style="text-decoration:none; color:white; text-align:center; font-size:20px;"><img src="<?php echo base_url(); ?>resources/images/onlinejudge.jpg" class="rounded ui image"><p>Online judge</p></a>
                    </div>
                    
                    <div class="column">
                        <a href="<?php echo base_url(); ?>site" style="text-decoration:none; color:white; text-align:center; font-size:20px;"><img src="<?php echo base_url(); ?>resources/images/forum.jpg"class="rounded ui image"><p>Forum</p></a>
                    </div>

                    <div class="column">
                        <a href="<?php echo base_url(); ?>site/projects" style="text-decoration:none; color:white; text-align:center; font-size:20px;"><img src="<?php echo base_url(); ?>resources/images/project.jpg" class="rounded ui image"><p>Project</p></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="second_row">
            <div  >
                <a href="<?php echo base_url(); ?>site/home" style="margin:20px"><img src="<?php echo base_url(); ?>resources/images/logo.png"></a>
            </div>
        </div>

        <div class="third_row">
            <div class="ui four column divided grid">
                <div class="row">
                    <div class="column">
                        <a href="<?php echo base_url(); ?>site/about" style="text-decoration:none; color:white; text-align:center; font-size:20px;"><img src="<?php echo base_url(); ?>resources/images/aboutus.jpg" class="rounded ui image"><p>About Us</p></a>
                    </div>
                    <div class="column">
                        <a href="<?php echo base_url(); ?>site/tutorial" style="text-decoration:none; color:white; text-align:center; font-size:20px;"><img  src="<?php echo base_url(); ?>resources/images/tutorial.jpg" class="rounded ui image"><p>Tutorial</p></a>
                    </div>
                    <div class="column">
                        <a href="<?php echo base_url(); ?>site/calender" style="text-decoration:none; color:white; text-align:center; font-size:20px;"><img src="<?php echo base_url(); ?>resources/images/calendar.jpg" class="rounded ui image"><p>Calender</p></a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
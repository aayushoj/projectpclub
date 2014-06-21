$(document).ready(function () {
  $('.ui.selection.dropdown').dropdown();
  $('.ui.dropdown').dropdown();
  $('.ui.red.labeled.icon.top.right.pointing.dropdown.button').dropdown();
  $('.ui.checkbox').checkbox();

});
function login_modal(){
	$("#login_username").val("");
	$("#login_pass").val("");
	$('#username_check').html("");
	$('#password_check').html("");
	$('#login_modal').modal('show');

}
function signup_modal(){
	$("#sign_username").val("");
	$("#sign_email").val("");
	$("#sign_password").val("");	
	$("#sign_cppassword").val("");
	$("#sign_sec_ans").val("");
	$('#username_sign_check').html("");
	$('#email_sign_check').html("");
	$('#password_sign_check').html("");
	//$("#sign_sec_que").val("Security Question");	
	$('#sign_sec_que').next().text("Security Question");
	$('#signup_modal').modal('show');
}

function submit_login(){
    document.getElementById("login_form").submit();
}

function submit_signup(){
    document.getElementById("signin_form").submit();
}
function username_check(){
    $.post('../resources/script/checks/username_validate.php', {username: $('#login_username').val()},function(output){
            $('#username_check').html(output).show();
    });
}
function password_check(){
    $.post('../resources/script/checks/password_validate.php', {username: $('#login_username').val(),password: $('#login_pass').val()},function(output){
            $('#password_check').html(output).show();
    });
}

function username_sign_check(){
    $.post('../resources/script/checks/username_sign_validate.php', {username: $('#sign_username').val()},function(output){
            $('#username_sign_check').html(output).show();
    });
}
function email_sign_check(){
    $.post('../resources/script/checks/email_sign_validate.php', {username: $('#sign_username').val(),email: $('#sign_email').val()},function(output){
            $('#email_sign_check').html(output).show();
    });
}
function password_sign_check(){
    $.post('../resources/script/checks/password_sign_validate.php', {username: $('#sign_username').val(),email: $('#sign_email').val(),password: $('#sign_password').val(),cppassword: $('#sign_cppassword').val()},function(output){
            $('#password_sign_check').html(output).show();
    });
}
function password_len(){
    $.post('../resources/script/checks/password_len.php', {username: $('#sign_username').val(),email: $('#sign_email').val(),password: $('#sign_password').val()},function(output){
            $('#password_sign_check').html(output).show();
    });
}
function password_cpp_check(){
    $.post('../resources/script/checks/password_cpp_check.php', {username: $('#sign_username').val(),email: $('#sign_email').val(),password: $('#sign_password').val(),cppassword: $('#sign_cppassword').val()},function(output){
            $('#password_sign_check').html(output).show();
    });
}


function forgot_modal(){
    $("#forgot_username").val("");
    $("#forgot_email").val("");
    $("#forgot_sec_ans").val("");
    //$("#sign_sec_que").val("Security Question");  
    $('#forgot_sec_que').next().text("Security Question");
    setTimeout(function(){$('#login_modal').modal('hide');},100);
    $('#forgot_modal').modal('show');

}

function forgot_validate() {
    $.post('../forgot_validate.php' , { username : $('#forgot_username').val() , security_ques : $('#forgot_sec_que').val() , security_ans : $('#forgot_sec_ans').val() },function(output){
            $('#forgot_top').html(output).show();
    });
}

function submit_password(){
    document.getElementById("password_reset").submit();
}

function try_agan(){
    window.open("http://localhost/website_new/site/home","_self");
    $("#forgot_username").val("");
    $("#forgot_email").val("");
    $("#forgot_sec_ans").val("");
    $('#forgot_sec_que').next().text("Security Question");
    setTimeout(function(){$('#forgot_modal').modal('show');},1000);
    // setTimeout(function(){$('#forgot_modal').modal('hide');},100);
    // $("#forgot1_username").val("");
    // $("#forgot1_email").val("");
    // $("#forgot1_sec_ans").val("");
    // $('#forgot1_modal').modal('show');
}

function password_modal(){
    $("#new_password").val("");
    $("#new_cppassword").val("");
    $('#password_modal').modal('show');

}
function submit_password_new(){
    document.getElementById("password_reset_new").submit();
}


function old_pass_check() {
    $.post('../../old_pass_check.php' , {username : $('#username1').val() , old_password : $('#old_password').val() },function(output){
            $('#password_top').html(output).show();
    });
}
function old_password_modal(){
    $("#old_password").val("");
    $('#old_password_modal').modal('show');

}
function try_agan1(){
//     setTimeout(function(){$('#old_password_modal').modal('hide');},100);
//     $("#old_password").val("");
//     $('#old_password_modal1').modal('show');
    window.open("http://localhost/website_new/site/home","_self");
    $("#old_password").val("");
    setTimeout(function(){$('#old_password_modal1').modal('show');},1000);
}

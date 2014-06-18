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
    $.post('../resources/script/checks/username_validate.php', {username: login.username.value},function(output){
            $('#username_check').html(output).show();
    });
}
function password_check(){
    $.post('../resources/script/checks/password_validate.php', {username: login.username.value,password: login.password.value},function(output){
            $('#password_check').html(output).show();
    });
}

function username_sign_check(){
    $.post('../resources/script/checks/username_sign_validate.php', {username: signup_form.username.value},function(output){
            $('#username_sign_check').html(output).show();
    });
}
function email_sign_check(){
    $.post('../resources/script/checks/email_sign_validate.php', {username: signup_form.username.value,email: signup_form.email.value},function(output){
            $('#email_sign_check').html(output).show();
    });
}
function password_sign_check(){
    $.post('../resources/script/checks/password_sign_validate.php', {username: signup_form.username.value,email: signup_form.email.value,password: signup_form.password.value,cppassword: signup_form.cppassword.value},function(output){
            $('#password_sign_check').html(output).show();
    });
}
function password_len(){
    $.post('../resources/script/checks/password_len.php', {username: signup_form.username.value,email: signup_form.email.value,password: signup_form.password.value},function(output){
            $('#password_sign_check').html(output).show();
    });
}
function password_cpp_check(){
    $.post('../resources/script/checks/password_cpp_check.php', {username: signup_form.username.value,email: signup_form.email.value,password: signup_form.password.value,cppassword: signup_form.cppassword.value},function(output){
            $('#password_sign_check').html(output).show();
    });
}
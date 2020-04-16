<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/style-login.css">
    <script src="assets/js/jquery-3.4.1.js"></script>
</head>

<body>
    <form class="login-form upl">
        <h1>Login Vreport News</h1>
        <div class="txtb">
            <input type="email" id="txt-email">
            <span data-placeholder="Email"></span>
        </div>

        <div class="txtb">
            <input type="password" id="txt-pass">
            <span data-placeholder="Password"></span>
        </div>

        <input type="button" id="btn" class="logbtn" value="Login">

        <div class="bottom-text">
            <a href="#">Forgot Password</a>
        </div>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".txtb input").on("focus", function() {
                $(this).addClass("focus");
            });
            $(".txtb input").on("blur", function() {
                if ($(this).val() == "")
                    $(this).removeClass("focus");
            });
			$('#btn').click(function(){
				var email=$('#txt-email');
				var pass=$('#txt-pass');
				if(email.val()==''){
					alert('Please In put Email....');
					email.focus();
					return;
				}else if(pass.val()==''){
					alert('Please In put Password....');
					pass.focus();
					return;
				}
				$.ajax({
					url:'action/login.php',
					type:'POST',
					data:{pass:pass.val(),email:email.val()},
					cache:false,
					dataType:"json",
					beforeSend:function(){
						
					},
					success:function(data) {
						if(data.login == true){
							window.location.href = "admin.php";
						}else{
							alert('pleas Input Again...');
						}
						
					},

				});
			});
        });
    </script>
</body></html>
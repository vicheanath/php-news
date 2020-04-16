<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-3.4.1.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="../assets/css/fontawesome-free-5.11.2-web/css/all.min.css">
    <title>Reset Password</title>
</head>
<body>
    <div class="form-gap" style="height: 100px"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">

                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="txt-code" name="txt-code" placeholder="code 6 degit"
                                                class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit"
                                            class="btn btn-lg btn-primary btn-block bottom-text" value="verify code"
                                            type="button">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<script>
    $(document).ready(function () {
        $(".bottom-text").on("click", function () {
            var email = $('#txt-email');
            $.ajax({
                url: '../action/forgotpass.php',
                type: 'POST',
                data: {
                    email: email.val(),
                },
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data.dpl == false) {
                        alert('Plese Input email again...');
                        return;
                    } else if (data.send == false) {
                        alert('please try again...');
                        return;
                    } else {
                        alert('please chech your email...');
                        return;
                    }
                },
            });
        });
    });
</script>
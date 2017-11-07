<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/js/authentication/register.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <section class="container">
        <div class="container-page">
            <div class="col-md-6 col-md-offset-3">
                <form id="register">
                    <h3 class="dark-grey">Admin Registration</h3>
                    <div class="text-danger" id="error"></div>
                    <div class="text-success" id="success"></div>
                    <div class="form-group col-lg-12">
                        <label>Name</label>
                        <input type="" name="name" class="form-control" id="" value="">
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Username</label>
                        <input type="" name="username" class="form-control" id="" value="">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" id="" value="">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Repeat Password</label>
                        <input type="password" name="repassword" class="form-control" id="" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </section>
</div>
</body>
</html>
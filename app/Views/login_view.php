<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,500;1,100&display=swap" rel="stylesheet">
    </head>

    <body style="height: 100%; background-color: #222d32; font-family: 'Roboto',sans-serif;">
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      1
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->   
        <!-- <div class="container" >
            <div class="row">
                <div class="col-lg-4 col-md-4 p-0"></div>

                <div class="col-lg-4 col-md-4 p-0" style="margin-top: 80px;">
                    <div class="card login-form">
                        <div class="card-body p-5">
                            <h1 class="card-title text-center" style="font-family: 'Roboto Mono', monospace;">LOGIN</h1>
                            &nbsp
                            <div class="card-text">

                                <form action="addlogin">

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" style="border-radius:50px;">
                                        </div>
                                        &nbsp
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="border-radius:50px;">
                                        </div>
                                        &nbsp
                                    
                                        <div class="form-group">
                                            <button type="submit" value="login" class="btn btn-primary fw-bold form-control" style="border-radius:50px;">Login</button>
                                            &nbsp
                                            <button type="button" class="btn btn-secondary form-control" style="border-radius:50px;">
                                                <a href="/" class="text-decoration-none text-light fw-bold" >Back</a>
                                            </button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 p-0"></div>               
            </div>            
        </div> -->
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      End 1
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->   
<!-- #################################################################################################################################################################### -->
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      2
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->   
        <div class="container" style="height: 100%; display: flex; align-items: center; justify-content: center; color: #0db8de;">
            <div class="card" style="width: 380px; height: 450px; margin: 20px; margin-top: 80px; background: #1a2226; border-radius: 10px;">
                <div class="card-body">
                    <h1 class="card-title text-center" style="font-weight: 900; padding-top: 20px;">LOGIN</h1>
                    <div class="card-text">
                        <form action="addlogin" method="post" style="padding-top: 10px; font-size: 14px; margin-top: 30px;">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control form-control-sm text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 25px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <a href="#" class="text-decoration-none" style="float: right; font-size: 12px; color: #0db8de;">Forgot Password?</a>
                                <input type="password" name="password" id="password" class="form-control form-control-sm text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 25px;">
                            </div>
                            
                            &nbsp
                            <input type="submit" value="Sign In" class="btn btn-block form-control" style="background: #0db8de; font-size: 14px; transform: translateY(10px); border-radius: 10px;">
                        </form>
                    </div>
                </div>
                
            </div>
        </div>

<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      End 2
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->   

        &nbsp
        <?php if (!empty(session()->getFlashdata("error"))):?>
            <div class="alert text-light fw-bold text-center text-uppercase" style="background: red; font-family: 'Roboto',sans-serif;">
                <?= session()->getFlashdata("error")?>
            </div>
        <?php endif ?> 

    </body>
</html>
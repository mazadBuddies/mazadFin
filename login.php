<?php
    include "config/directors.config.php";
    include ROOT_APP . "init.php";
    if(isLogin())header("location:index.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $masterUser = new user();
        (isset($_POST['firstName']))?$masterUser->signUp() : $masterUser->logIn($_POST['email'], $_POST['password']);
    }//end of if
?>
<section class="body">
    <div class="login col-lg-4 col-md-6 col-sm-8">
        <div class="selectForm">
            <span class="active" data-name="Sign In">Sign In</span>
            <span data-name="Sign Up">Sign Up</span>
        </div>
        <div class="form">
            <div class="myCon">
                <h2 class="signIn head" id="formTitle"></h2>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="frm" enctype="multipart/form-data">

                    <div class="row" id="names">
                        <div class="email col-12">
                            <label for="email" class="col-12">Email address</label>
                            <div class="border">
                                <input type="email" name="email" class="col-12" placeholder='Your@mail.com' checked/>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="pass">
                        <div class="password col-12">
                            <label for="password" class="col-12">Password</label>
                            <div class="border add-icon">
                                <input type="password" class="col-12" name="password" data-show="true" placeholder="Enter strong password" />
                            </div>
                        </div>
                    </div>
                    <div class="sup">
                        <input type="submit" id="submit1" value = "Sign in"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    <script src=<?php echo "'" . JS_DIR . "jquery.min.js" . "'";?> ></script>
    <script src=<?php echo "'" . JS_DIR . "popper.min.js" . "'";?>></script>
    <script src=<?php echo "'" . JS_DIR . "bootstrap.min.js" . "'";?>></script>
    <script src=<?php echo "'" . JS_DIR . "selectize.min.js" . "'";?>></script>
    <script src=<?php echo "'" . JS_DIR . "loader.js" . "'";?>></script>
    <script src=<?php echo "'" . JS_DIR . "ajax.js" . "'";?>></script>
    <script src=<?php echo "'" . JS_DIR . "validation.js" . "'";?>></script>
    <script src=<?php echo "'" . JS_DIR . "ajaxRequestMainPages.js" . "'";?>></script>
    <script src=<?php echo "'" . JS_DIR . "cookiesFunctions.js" . "'";?> ></script>
    <script src=<?php echo "'" . JS_DIR . "sessionValidation.js" . "'";?> ></script>
    <script src=<?php echo "'" . JS_DIR . "formTransform.js" . "'";?> ></script>
    <script src=<?php echo "'" . JS_DIR . "main.js" . "'";?> ></script>
    <script src=<?php echo "'" . JS_DIR . "changeDir.js" . "'";?> ></script>
</html>

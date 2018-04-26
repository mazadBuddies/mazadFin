<?php
/* 6260 */
    setcookie('dir', 'dashboard', time() + (86400 * 30));
    include "config/directors.config.php";
    include ROOT_APP . "init.php";
    //if(!isLogin())header("location:mazadHome.php");
    include INCLUDES_DIR . "nav.inc.php";
    include INCLUDES_DIR . "side.inc.php";
    include COMP_INC_DIR . "magicButton.comp.php";
?>

<section class="content">
    <div class="overlay">
        <i class="far fa-times-circle exit-icon"></i>
        <div class="edit"></div>
    </div>
<?php 
    $master = new user();
    include INCLUDES_DIR . "dashboard.inc.php";
    if($master->getRole() == 1)// note that we use == not === "don't work in this case"
        include  INCLUDES_DIR ."adminPanel.inc.php";
    include     INCLUDES_DIR . "profile.inc.php";
    include     INCLUDES_DIR . "chat.inc.php";
    include     INCLUDES_DIR . "notifications.inc.php";
?>
</section><!-- end of section conent-->
<?php include ROOT_APP . "footer.php";?>

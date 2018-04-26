<?php
include "../../../config/directors.config.php";
include "../../../class/autoLoader.class.php";?>
<section>
    <div class="login col-lg-4 col-md-6 col-sm-8">
        <div class="form">
            <div class="myCon">
                <?php
                    $masterWallet = new wallet();
                    $myWallet = $masterWallet->getWalletByUserId($_SESSION['id']);
                    $wal = sizeof($myWallet);
                ?>
                <h2 class="signIn head"><i class="fa fa-bullseye"></i> Create Wallet</h2>
                <form method="POST" class="signUp ajax submit" data-method="post" autocomplete="off" enctype="multipart/form-data" id="editProfile" data-action="INSERT_WALLET" data-accept="1" data-url="class/wallet.class.php" data-function="7">
                    <div class="row">
                        <div class="email col-12">
                            <label for="email" class="col-12">Wallet Name</label>
                            <div class="border">
                                <input type="text" name="name" class="col-12" placeholder='wallet name' checked value="<?php if($wal) echo $myWallet[0]['walletName'];?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="password" class="col-12">Password</label>
                            <div class="border add-icon">
                                <input type="text" class="col-12" name="balance" placeholder="Enter your balance" />
                            </div>
                        </div>
                    </div>

                    <div class="sup">
                        <input type="submit" value = "Create Wallet"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

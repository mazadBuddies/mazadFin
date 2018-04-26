<?php
        session_start();
        include "../../../config/directors.config.php";
        include CLASS_DIR . "autoLoader.class.php";
?>

<div class="form col-lg-4 col-md-6 col-sm-8" id="test">
    <div class="myCon">
        <h2 class="title"><i class="fa fa-bullseye"></i>Add Categorie</h2>
        <form method="POST" class="signUp ajax submit" data-method="post" autocomplete="off" enctype="multipart/form-data" id="editProfile" data-action="Edit" data-accept="1" data-url="class/user.class.php">
            <div class="row">
                <div class="firstName col-10">
                    <label for="firstName" class="col-12">Categorie Name</label>
                    <input name="ACTION" value="Edit" type="hidden">
                    <div class="border">
                        <input type="text" name="categorieName" class="col-12"/>
                    </div>
                </div>

                <div class="lastName col-2">
                    <label for="lastName" class="col-12">Icon</label>
                    <div class="border">
                        <input type="text" name="lastName" class="col-12"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="userName col-12">
                    <label for="userName" class="col-12">Description</label>
                    <div class="border">
                        <textarea class="txt-area" name="desc"></textarea>
                    </div>
                </div>
            </div>

            <div class="sup">
                <input type="submit" value = "ADD Categorie"/>
            </div>
        </form>
    </div>
    <p>
        * By Editing your Info , you agree to changing your Profile Info. 
    </p>
</div>
<script src="../../../js/jquery.min.js"></script>
<script src="../../../js/forms.js"></script>
<script src="../../../js/main.js"></script>
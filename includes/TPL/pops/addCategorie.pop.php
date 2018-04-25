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
<<<<<<< HEAD
                        <input type="text" name="firstName" class="col-12"/>
=======
                        <input type="text" name="categorieName" class="col-12"/>
>>>>>>> 31918311fa8ae36f8dd36f325901aba657e96491
                    </div>
                </div>

                <div class="lastName col-2">
                    <label for="lastName" class="col-12">Icon</label>
                    <div class="border">
<<<<<<< HEAD
                        <input type="text" name="lastName" class="col-12"/>
=======
                        <input type="text" name="categorieIcon" class="col-12"/>
>>>>>>> 31918311fa8ae36f8dd36f325901aba657e96491
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="userName col-12">
                    <label for="userName" class="col-12">Description</label>
                    <div class="border">
<<<<<<< HEAD
                        <textarea class="txt-area" name="desc"></textarea>
=======
                        <textarea class="txt-area" name="categorieDetails"></textarea>
>>>>>>> 31918311fa8ae36f8dd36f325901aba657e96491
                    </div>
                </div>
            </div>

            <div class="sup">
<<<<<<< HEAD
                <input type="submit" value = "ADD Categorie"/>
            </div>
        </form>
    </div>
    <p>
        * By Editing your Info , you agree to changing your Profile Info. 
    </p>
</div>
=======
                <input type="submit" value = "ADD Categorie" class='ajax click' data-url='./class/adminPanel.class.php' data-action='ADD_CATEGORY' data-method='POST' data-function='6'/>
            </div>
        </form>
    </div>
</div>
<script
    function removeCategoryPopUp(){
        "use strict";
        trigger = false;
        $(".edit").animate({
            "opacity": "0"
        }, 300, function () {
            $(".exit-icon").animate({
                "opacity": "0"
            }, 100, function () {
                $(".overlay").animate({
                    "opacity": "0"
                }, 1000, function () {
                    $("body").css({
                        "overflow-y": "auto"
                    });
                    $(".overlay").css({
                        "display": "none"
                    });
                    $(".exit-icon").css({
                        "display": "none"
                    });
                    $(".edit").empty();
                }); 
            });
        });
    }
></script>
>>>>>>> 31918311fa8ae36f8dd36f325901aba657e96491
<script src="../../../js/jquery.min.js"></script>
<script src="../../../js/forms.js"></script>
<script src="../../../js/main.js"></script>
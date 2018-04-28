<!-- start of pouUp following board-->
<div class="followSec followPup closeDbl">
    <i class="far fa-times-circle exit-icon closeP"></i>
    <div class="row panel">
    <?php
    if(sizeof($following)>0){
        for ($i=0; $i < sizeof($following) ; $i++) { 
            echo '<div class="col-2">
            <div class="cir">
                <img src="'; 
                echo $following[$i]['imagePath'];
                echo ' " class="img-responsive"/>
            </div>
            <div class="userInfo">';
            echo $following[$i]['firstName'];
            echo '
            </div>
            <div class="controls" data-show="false">
                <button class="unFollow" date-id="';
                echo $following[$i]['id'];
                echo '">
                Unfollow</button>
            </div>
        </div>';
        }
    }
        ?>
    </div>

    </div>
<!-- end of pouUp following board-->
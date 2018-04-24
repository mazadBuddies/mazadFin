<div class="followSec followerPup closeDbl">
    <i class="far fa-times-circle exit-icon closeP"></i>
    <div class="row panel">
        <?php
        if(sizeof($follower)>0){
            for ($i=0; $i < sizeof($follower) ; $i++) { 
                echo '<div class="col-2">
                <div class="cir">
                    <img src="';
                    echo $follower[$i]['imagePath'];
                    echo ' 
                       " class="img-responsive"/>
                </div>
                <div class="userInfo">';
                   echo $follower[$i]['firstName'];
                   echo '
                </div>
            </div>';
            }
        }
        
       
        ?>
</div>
</div>
<!-- end of pouUp following board-->

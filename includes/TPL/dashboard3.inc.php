<?php
$masterSession = new session();
$sessionData = $masterSession->getAllSessions();
if(sizeof($sessionData)==0){
    echo "<pre>";
    echo "There is no sessions right now";
    echo "</pre>";    
}
    

/*
else{
echo "<pre>";
print_r($sessionData);
echo "</pre>";
}*/
?>
<section class="dashboard col-11">
    <div class="container-fluid">
        <h2 class="head">All Markets</h2>
        <div class="noti-suc">
            <i class="far fa-thumbs-up"></i>
            <span>
            noti-suc
            </span>
    </div>
        <div class="session col-10">
            <?php
                for($i = 0; $i<sizeof($sessionData); $i+=2){
                    echo '<div class="row session-row">
                                <div class="session-panel col-5" data-img="';
                                echo $sessionData[$i]['productImage'];
                                echo '">
                                    <div class="time">
                                        <span class="icon">
                                            <i class="fas fa-clock"></i>
                                        </span>
                                        <span class="timeVal">
                                            <span class="val">12 DAYS</span>
                                            <span>TILL OUTCOME</span>
                                        </span>
                                    </div>
                                    <div class="details">';
                                    echo $sessionData[$i]['description']; 
                                    echo '</div>
                                    <div class="userInfo">
                                        <div class="cir">
                                            <img src="';
                                            echo $sessionData[$i]['imagePath'];
                                            echo '" class="img-responsive"/>
                                        </div>
                                        <div class="name">';
                                            echo $sessionData[$i]['firstName'];
                                        echo '</div>
                                    </div>
                                    <div class="enter">
                                        <div class="cir">
                                            <a href="session.php?id='.$sessionData[$i]['sessionId'].'" target="_blank"><i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="bottom-panel">
                                        <div class="money">
                                            <i class="fas fa-money-bill-alt"></i>
                                            <span class="number">';
                                             echo $sessionData[$i]['startPrice'];
                                            echo'<sup>EGP</sup>
                                            </span>
                                        </div>
                                        <div class="users">
                                            <i class="fas fa-users"></i>
                                            <span class="number">';
                                            echo $sessionData[$i]['sessionEnters'];
                                            echo'</span>
                                        </div>
                                    </div>
                                </div>';
                            if(sizeof($sessionData)==$i+1&&$sessionData%2==1){
                                break;
                            }
                            if($i < sizeof($sessionData)){
                                echo '<div class="session-panel col-5" data-img="';
                                echo $sessionData[$i+1]['productImage'];
                                echo '">
                                    <div class="time">
                                        <span class="icon">
                                            <i class="fas fa-clock"></i>
                                        </span>
                                        <span class="timeVal">
                                            <span class="val">12 DAYS</span>
                                            <span>TILL OUTCOME</span>
                                        </span>
                                    </div>
                                    <div class="details">';
                                    echo $sessionData[$i+1]['description']; 
                                    echo 
                                    '</div>
                                    <div class="details">
                                        A hot-shot race-car named Lightning McQueen gets waylaid in Radiator Springs
                                    </div>
                                    <div class="userInfo">
                                        <div class="cir">
                                            <img src="';
                                            echo $sessionData[$i+1]['imagePath'];
                                            echo '" class="img-responsive"/>
                                        </div>
                                        <div class="name">';
                                            echo $sessionData[$i+1]['firstName'];
                                        echo '</div>
                                    </div>
                                    <div class="enter">
                                        <div class="cir">
                                            <i class="fa fa-angle-right"></i>
                                        </div>
                                    </div>
                                    <div class="bottom-panel">
                                        <div class="money">
                                            <i class="fas fa-money-bill-alt"></i>
                                            <span class="number">';
                                            echo $sessionData[$i+1]['startPrice'];
                                            echo $sessionData[$i+1]['sessionEnters'];
                                            echo'<sup>EGP</sup>
                                            </span>
                                        </div>
                                        <div class="users">
                                            <i class="fas fa-users"></i>
                                            <span class="number">';
                                            echo'</span>
                                        </div>
                                    </div>
                                </div>';
                            }
                            echo '</div><!-- end of row-->';
                }
                echo "<pre>";
    echo $sessionData;
    echo "</pre>";
                ?>
        </div>
    </div>
</section>
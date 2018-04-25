<section class="notification center-content col-11">
    <div class="container-fluid">
        <h2 class="head">Notifications</h2>
        <div class="allNoti">
            <ul>
                <?php 
                for($i=0;$i<10;$i++){
                    echo '
                
                <li class="fir">
                    <div class="row">
                        <div class="fromInfo col-1">
                            <div class="cir">
                                <img src="imgs/bodey.jpg" alt="" class="img-responsive">
                            </div>
                            <!--<div class="name">
                                Bodey
                            </div>-->
                        </div>
                        <div class="noti-msg col-9">
                            TESTSETETSETE tEStestste setse stetetsetstetsetset
                        </div>
                        <div class="noti-info col-2">
                            <ul>
                                <li class="btn-primary">from 3 second</li>
                                <li class="btn-success">New session</li>
                            </ul>
                        </div>
                    </div>
                </li>';
                }?>
            </ul>
        </div>
    </div>
</section>
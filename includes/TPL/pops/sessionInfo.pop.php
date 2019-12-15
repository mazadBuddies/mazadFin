<?php 
$masterSession = new session();
$masterSessionUser = new user();
$currentSessionData = $masterSession->getSessionById($_GET['id']);
$currentSessionUser = $masterSessionUser->getUserInfoById($currentSessionData['ownerId']);

?>
<div class="session-info">
    <div class="row">
        <div class="col-4">
            <h2>Session Owner</h2>
            <div class="session-owner-info">
                <div class="cir">
                    <img src="imgs/12.jpg" alt=""/>
                </div>
                <div class="user-info">
                    <div class="full-name"><?php echo $currentSessionUser[0]['firstName']." ".$currentSessionUser[0]['lastName']; ?></div>
                </div>
            </div>
            <table>
                <tr>
                    <th>RANK</th>
                    <th class="deff"><?php echo $masterSessionUser->generateRank($currentSessionUser[0]['rate']);?> </th>
                </tr>
                <tr>
                    <th class="deff">RATE</th>
                    <th><?php echo $currentSessionUser[0]['rate'];?></th>
                </tr>
                <tr>
                    <th>Session Number</th>
                    <th class="deff">5</th>
                </tr>
            </table>
        </div>
        <?php
        $activeSessionId = $_GET['id'];
        
        ?>
        <div class="session-side Name col-4">
            <h2 class="align-left">Session Info</h2>
                <table>
                    <tr>
                        <th>Session name</th>
                        <th class="deff"><?php echo $masterSession->getSessionName(); ?></th>
                    </tr>
                    <tr>
                        <th class="deff">Start Price</th>
                        <th> <?php echo $sessionData['startPrice']?><sup>EGP</sup></th>
                    </tr>
                    <tr>
                        <th>Start Time</th>
                        <th class="deff"><?php echo $sessionData['startTime']?></th>
                    </tr>
                    <tr>
                        <th class="deff">End Time</th>
                        <th><?php echo $sessionData['endTime']?></th>
                    </tr>
                    <tr>
                        <th>Increament</th>
                        <th class="deff"><?php echo $sessionData['increament']?>%</th>
                    </tr>
                    <tr>
                        <th class="deff">Blind</th>
                        <th><?php echo $sessionData['blind']?></th>
                    </tr>
                    <tr>
                        <th>Categorie</th>
                        <th class="deff"><?php echo $sessionData['catName']?></th>
                    </tr>
                </table>
            </div>
        <div class="product Name col-4">
            <h2 class="align-left">Product Info</h2>
            <div>
                <img src="<?php echo $sessionData['productImage']?>" alt="">
            </div>
            <table>
                <tr>
                    <th>Product name</th>
                    <th class="deff"><?php echo $sessionData['productName']?></th>
                </tr>
            </table>
        </div>
    </div>
</div>
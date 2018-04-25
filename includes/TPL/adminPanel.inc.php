<section class="admin-panel col-11">
        <div class="container-fluid">
            <h2 class="head">Admin Panel</h2>
            <div class="stat">
                <h3>Statistics</h3>
                <div class="con">
                    <p>users</p>
                    <div class="cir">
                        <span class="number">
                        <?php 
                            $db = new dataBase(HOST ,DB_NAME,DB_USER, DB_PASS);
                            $db->setTable("session");
                            $sessions = $db->getCount();
                            $db->setTable("categorie");
                            $categories = $db->getCount();
                            $db->setTable("user");
                            $users = $db->getCount();
                            $admins = count($db->select('*', array('userRole'), array(1), true));
                            echo $users;
                        ?>
                        </span>
                    </div>
                </div>

                <div class="con">
                    <p>Sessions</p>
                    <div class="cir">
                        <span class="number"><?php echo($sessions) ?></span>
                    </div>
                </div>

                <div class="con">
                    <p>Admin</p>
                    <div class="cir">
                        <span class="number"><?php echo($admins) ?></span>
                    </div>
                </div>

                <div class="con">
                    <p>Categories</p>
                    <div class="cir">
                        <span class="number"><?php echo($categories) ?></span>
                    </div>
                </div>
            </div><!-- end of div.stat-->
            <div class="manage-user">
                <h3>manage-user</h3>
                <div class="tbl">
                    <table>
                        <tr class="head">
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Rate</th>
                            <th>Number Of Reports</th>
                            <th> controls</th>
                        </tr>
                        <?php 
                            
                            $db->setTable('user');

                            $allData = $db->select();
                            
                            for($i = 0; $i<sizeof($allData);$i++){
                                ?>
                                <tr>
                                <th>
                                    <div class="cir">
                                        <img src= <?php echo $allData[$i]["imagePath"];?> alt="">
                                    </div>
                                </th>
                                <th>
                                    <?php echo $allData[$i]['firstName'];?>
                                </th>
                                <th>
                                    190
                                </th>
                                <th>
                                    3
                                </th>
                                <th>
                                    <?php
                                        $c = $allData[$i]['id'];
                                        echo ($allData[$i]["blocked"])?"<button class='activate$c good ajax click' data-url='./class/adminPanel.class.php' data-action='ACTIVATE' data-method='POST' data-values='id=>$c' data-function='3'>Unblock</button>":"<button class='activate$c danger ajax click' data-url='./class/adminPanel.class.php' data-action='DEACTIVATE' data-method='POST' data-values='id=>$c' data-function='2'>Block</button>";
                                    ?>
                                    <!--<button class="danger">Delete</button>-->
                                </th>
                            </tr>
                            <?php }?>
                        
                        
                    </table>
                </div><!-- end of div tbl-->
            </div><!-- end of div manage-user-->

            <div class="manage-cats">
                <h3>Manage Categories</h3>
                <table>
                    <tr class="head">
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Number Of Session</th>
                        <th>Details</th>
                        <th> controls</th>
                    </tr>
                    <?php                            
                    $db->setTable('categorie');

                    $allData = $db->select();
                    
                    for($i = 0; $i<sizeof($allData);$i++){
                        ?>
                    <tr>
                        <th>
                            <div class="cir">
                            <i class="<?php echo($allData[$i]['icon']); ?>"></i>
                            </div>
                        </th>
                        <th>
                        <?php echo($allData[$i]['catiegorieName']); ?>
                        </th>
                        <th>
                            24
                        </th>
                        <th>
                        <?php echo($allData[$i]['details']); ?>
                        </th>
                        <th>
                            <button>Edit</button>
                            <?php $c = $allData[$i]['id']; echo("<button id='category$c' class='danger ajax click' data-url='./class/adminPanel.class.php' data-action='DELETE_CATEGORY' data-method='POST' data-values='id=>$c' data-function='4'>Delete</button>");  ?>
                        </th>
                    </tr>
                    <?php } ?>
                </table>
                <button class="add makeOverLay" data-content="2">Add New</button>
            </div><!-- end of div manage-cats-->

            <div class="manage-cats">
                    <h3>Manage Reports</h3>
                    <table>
                        <tr class="head">
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Session Name (id)</th>
                            <th>Details</th>
                            <th>controls</th>
                        </tr>
                        <?php
                            $tempDB = new dataBase(HOST ,DB_NAME,DB_USER, DB_PASS);     
                            $tempDB->setTable('user');        
                            $db->setTable('report');
                            $allData = $db->select();
                            $userData = $tempDB->select();
                            
                            for($i = 0; $i<sizeof($allData);$i++){
                        ?>
                        <tr>
                            <th>
                                <div class="cir">
                                    <img class="img-responsive" src="<?php echo($userData[$allData[$i]['fromId']]['imagePath']); ?>"></img>
                                </div>
                            </th>
                            <th>
                            <?php echo($userData[$allData[$i]['fromId']]['firstName']); ?>
                            </th>
                            <th>
                            <?php echo($allData[$i]['sessionId']); ?>
                            </th>
                            <th>
                            <?php echo($allData[$i]['report']); ?>
                            </th>
                            <th>
                                <?php
                                    $c = $userData[$allData[$i]['fromId']]['id'];
                                    $r = $allData[$i]['id'];
                                    echo("<button id='report$r' class='good ajax click' data-url='./class/adminPanel.class.php' data-action='CLEAR_REPORT' data-method='POST' data-values='id=>$r' data-function='6'>Clear</button>");
                                    echo ($userData[$allData[$i]['fromId']]["blocked"])?"<button class='activate$c good ajax click' data-url='./class/adminPanel.class.php' data-action='ACTIVATE' data-method='POST' data-values='id=>$c' data-function='3'>Unblock</button>":"<button class='activate$c danger ajax click' data-url='./class/adminPanel.class.php' data-action='DEACTIVATE' data-method='POST' data-values='id=>$c' data-function='2'>Block</button>"; 
                                 ?>
                            </th>
                        </tr>
                        <?php } ?>
                    </table>
                </div><!-- end of div manage-cats-->

                <div class="manage-session">
                    <h3>Manage Session</h3>
                    <table>
                        <tr class="head">
                            <th>Id</th>
                            <th>Auto Sell</th>
                            <th>Blind</th>
                            <th>startTime</th>
                            <th>endTime</th>
                            <th>Item</th>
                            <th>Controls</th>
                        </tr>
                        <?php                            
                            $db->setTable('session');
                            $tempDB->setTable('product');
                            $allData = $db->select();
                            $productData = $tempDB->select();
                            for($i = 0; $i<sizeof($allData);$i++){
                        ?>
                        <tr>
                            <th>
                                <?php echo($allData[$i]['id']) ?>
                            </th>
                            <th>
                            <?php echo($allData[$i]['autoSell']) ?> <sup>EGP</sup>
                            </th>
                            <th>
                               <?php echo($allData[$i]['Blind']) ? ('<i class="fas fa-circle on"></i>') : ('<i class="fas fa-circle off"></i>') ?>
                            </th>
                            <th>
                                <?php echo($allData[$i]['startTime']) ?>
                            </th>
                            <th>
                                <?php echo($allData[$i]['endTime']) ?>
                            </th>
                            <th>
                                <?php echo($productData[$allData[$i]['productId']-1]['productName']); ?>
                            </th>
                            <th>
                                <?php
                                    $s = $allData[$i]['id'];
                                    echo("<button id='session$s' class='danger ajax click' data-url='./class/adminPanel.class.php' data-action='BLOCK_SESSION' data-method='POST' data-values='id=>$s' data-function='5'>Block</button>");  
                                    echo("<button id='session$s' class='danger ajax click' data-url='./class/adminPanel.class.php' data-action='DELETE_SESSION' data-method='POST' data-values='id=>$s' data-function='5'>Delete</button>");  
                                    ?>
                            </th>
                        </tr>
                        <?php } ?>
                    </table>
                    <!-- id  autoSell 	isBlind 	startTime 	endTime 	itemId  -->
                    <script>
                        function deactivateButton(id){
                            var x = document.getElementsByClassName('activate'+id);
                            for (i = 0;i<x.length;i++){
                                x[i].innerHTML = 'Block';
                                x[i].setAttribute('data-action', 'DEACTIVATE');
                                x[i].setAttribute('data-function', '2');
                                x[i].classList.remove('good');
                                x[i].classList.add('danger');
                            }
                        }

                        function activateButton(id){
                            var x = document.getElementsByClassName('activate'+id);
                            for (i = 0;i<x.length;i++){
                                x[i].innerHTML = 'Unblock';
                                x[i].setAttribute('data-action', 'ACTIVATE');
                                x[i].setAttribute('data-function', '3');
                                x[i].classList.remove('danger');
                                x[i].classList.add('good');
                            }
                        }
                        
                        function deleteCategory(id){
                            var x = document.getElementById('category'+id);
                            x.parentElement.parentElement.remove();
                        }

                        function deleteSession(id){
                            var x = document.getElementById('session'+id);
                            x.parentElement.parentElement.remove();
                        }

                        function clearReport(id){
                            var x = document.getElementById('report'+id);
                            x.parentElement.parentElement.remove();
                        }
                        
                    </script>
                </div>
        </div><!-- end of section container-fluid-->
    </section><!-- end of section admin-panel-->

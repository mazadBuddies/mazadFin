<section class="center-content chattingRoom col-11">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 chatMessage">
                <div class="messages">
                            <?php 
                            $messageSize = sizeof($masterSession->getSessionMessagesById($activeSessionId));
                            $Sessionmessages = $masterSession->getSessionMessagesById($activeSessionId);
                            for($i=0; $i<$messageSize; $i++){
                                if($_SESSION['id'] == $Sessionmessages[$i]['fromId']){
                                    echo '
                                        <div class="message me row">
                                            <div class="message-text">';
                                            echo $Sessionmessages[$i]['meesage'];
                                            echo '</div>
                                            <div class="cir">
                                                <img class="img-responsive" src="';
                                                    echo $Sessionmessages[$i]['fromImage'];
                                                echo'"></img>
                                            </div>
                                        </div>';
                                }//end of if "my message"
                                else{
                                    echo '
                                        <div class="message other row">';
                                        echo '<div class="cir">
                                                <img class="img-responsive" src="';
                                                    echo $Sessionmessages[$i]['fromImage'];
                                                echo'"></img>
                                            </div>';
                                            echo '<div class="message-text">';
                                                echo $Sessionmessages[$i]['meesage'];
                                            echo '</div>';
                                        echo '</div>';
                                }//end of else
                            }//end of for
                            if($messageSize > 0){
                                echo '<input type="hidden" id="lastMessageTime" data-max="'. $Sessionmessages[$messageSize-1]['messageTime'] .'">';
                            }else{
                                echo '<input type="hidden" id="lastMessageTime" data-max="2018-03-07 03:04:48">';
                            }
                            
                            echo '<input type="hidden" id="activeUserId" data-id="'. $_SESSION['id'] .'"/>';
                            
                            ?>
                        </div><!--end of message-->
                    <div class="send mrg-input">
                        <input type="text" name="message" placeholder="Enter Your Message Here, <?php echo $_SESSION['firstName']?>!" id="sessionMessageText"/>
                        <button class="ajax click" id="snd-msg" data-url="class/session.class.php" data-action="INSERT_MESSAGE" data-accept="0" data-method="POST" data-values="" data-function="0" >Send</button>
                    </div><!--end of send-->
            </div>
            <div class="col-3 chatOnline">
                <div class="friends">
                    <ul>
                        <?php
                        for($i=0;$i<10;$i++){
                            echo '<li>
                            <div class="row">
                                <div class="cir">
                                    <img src="imgs/bodey.jpg" class="img-responsive"/>
                                </div>
                                <span> </span>
                                <div class="name">Bodey Solieman</div>
                            </div>
                        </li>';
                        }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

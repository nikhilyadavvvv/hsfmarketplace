<?php
                                                   require 'model/db.php';
                                                  
                                                   $user_id = $_SESSION['user_id'];
                                                   echo $sql = "SELECT *  FROM `message` WHERE `receiver` = $user_id ORDER BY `message`.`message_id` DESC LIMIT 1";
                                                    $result = mysqli_query($mysqli,$sql);
                                                    if($result){
                                                        while($row = $result -> fetch_assoc()){
                                                            
                                                            $sender = $row['sender'];
                                                            $content = $row['content'];
                                                           
                                                            
                                                            $sender_img="";
                                                           $sql2 = "SELECT *  FROM `user` WHERE `user_id` = $sender";
                                                            $result2 = mysqli_query($mysqli,$sql2);
                                                            while($row2 = $result2 -> fetch_assoc()){
                                                                $sender = $row2["firstname"];
                                                                $sender_img = $row2["image"];
                                                            }
                                                            
                                                            echo '<div class="chat_list">
                                                            <div class="chat_people">
                                                                <div class="chat_img"> <img src="'.$sender_img.'" alt="sunil"> </div>
                                                                <div class="chat_ib">
                                                                    <h5>'.$sender.'<span class="chat_date">Dec 25</span></h5>
                                                                    <p>'.$content.'</p>
                                                                </div>
                                                            </div>
                                                        </div>';
                                                        }
                                                    }
                                                ?>
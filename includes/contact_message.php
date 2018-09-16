
            <div id="messages">
                <div class="row">

                
                <?php
                

                    $message_query = "SELECT * FROM messages";
                    $message_result = $mysqli->query($message_query);

                    if(!$message_result){
                        print($mysqli->error);
                        exit();
                    }  
                    
                    while($row = $message_result->fetch_assoc()){
                        $name = $row['name'];
                        $subject = $row['subject'];
                        $date = $row['senttime'];
                        $email = $row['email'];
                        $message = $row['message'];
                        print(
                            
                            
                            "<div class='message-box col-md-12'>
                                <div><h3>$subject</h3></div>
                                <div>$date</div>
                                <div>From: $name | Email: $email</div>
                                <div><br>$message</div>
                            </div>
                            "
                            
                            );
                    }
                    
                ?>
                    
                </div>
            </div>
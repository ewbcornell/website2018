            <div class="shadow">
                <div class="row main">
                    <div class="col-md-3 col-lg-4 info">
                        <p><span class="glyphicon glyphicon-map-marker"></span> Ithaca, NY</p>
                        <p><span class="glyphicon glyphicon-envelope"></span> Email: ewbcornell@gmail.com</p>
                        <p><span></span></p>
                    </div>

                    <?php
                        if(isset($_POST['send'])){
                            
                            $post_name  = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                            
                            $post_email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                            $post_subject = filter_input( INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
                            $post_content = filter_input( INPUT_POST, 'content', FILTER_SANITIZE_STRING); 


                            
                            if(!empty($post_name) && !empty($post_email) && !empty($post_subject) && !empty($post_content))
                            {

                                $to = "yw774@cornell.edu";
                                $subject = $post_email;
                                $txt = $post_content;
                                $headers = "Send By ".$post_name."From:".$post_email."\r\n";

                                mail($to,$subject,$txt,$headers);

                                $post_time=date("Y-m-d h:i:sa");

                                $insertSql = "INSERT into messages(name, email, subject, message, senttime) VALUES('$post_name', '$post_email','$post_subject', '$post_content', '$post_time')";

                                $insert_result = $mysqli->query($insertSql);

                                if(!$insert_result){
                                    print($mysqli->error);
                                    exit();
                                }
                            }
                            
                            

                        }  
                    ?>

                    <div class="col-md-8 col-lg-8">
                        <form id="form" name="form" method="post">
                            <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <input type="text" name="name" placeholder="Name" class="contact-form" required>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <input type="email" name="email" placeholder="Email" class="contact-form" required>
                            </div>
                            </div>    
                            <div class="row">
                            <div class="col-lg-12">
                            <input type="text" name="subject" placeholder="Subject" class="contact-form" required>
                            </div>
                            </div>
                            <textarea rows="6" name="content" class="contact-form" placeholder="message"  required></textarea>
                            
                            <div class="row">
                            <div class="col-lg-12">
                            <input type="submit" name='send' value="send" class="pull-right bb">
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
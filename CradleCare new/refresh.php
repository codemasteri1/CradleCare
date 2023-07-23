<?php
//STAFF REGISTRATION.....................................................................................................
include('connection.php');
	$the_message = $_GET['the_message'];
	$sender_name = $_GET['sender_name'];
	$sender_id = $_GET['sender_id'];
	$to_id = $_GET['to_id'];
	$chat_time = date("h:i:sa");
	$date_today = date("d/m/Y");	
					$sql2 = "SELECT * FROM group_chat WHERE (to_userid = '$sender_id' AND from_user_id = '$to_id') || (from_user_id = '$sender_id' AND to_userid = '$to_id') ";
					$run2 = mysqli_query($connect,$sql2);
					$rowss = mysqli_fetch_all($run2, MYSQLI_ASSOC);
					$output =  '<div class="chat-content-wrap">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="chats">';
											 foreach($rowss as $chat_m):																															
                                            $output .= '    <div class="chat chat-left">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>'.$chat_m['chat_out'].'</p>
                                                                <span class="chat-time">'.$chat_m['sender_name'].'</span>
																<span class="chat-time">'.$chat_m['chat_time'].'</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="chat-line">
                                                </div>';	
											 endforeach;
                                          $output .= '	  </div>
                                        </div>
                                    </div>
                                </div>';
					
				echo $output;
?>
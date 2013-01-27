<div id="top">
            <?php
                        
                        if(isset($message))
                              if($message=='Logout'){ 
                                    
                                    
                                    ?>
                                    
                                    <div id="login_suc">
                                          Logout 완료
                                  
                                    </div>
                                    <script type="text/javascript">
                                          setTimeout("$('#login_suc').slideUp('slow')",5000);
                                    </script>
                                    
                              <?php
                              }
                              if($loggedin){
                              ?>
                                    <div id="login_suc">
                                    <?php echo $current_user; ?> 님 반갑습니다.
                                  
                                    </div>
                                    <script type="text/javascript">
                                          setTimeout("$('#login_suc').slideUp('slow')",3000);
                                    </script>
                              <?php
                              }
            ?>
                  
                  
                   
           <div id="current_notice">
                       
                  </div>
                  
                  <img src="../images/notice_end.png" alt="" />
<div id="user_icon">
                        <div><a href="http://twitter.com/pechakucha" target="_blank"><img src="../images/twitter2.png" alt="twitter" /> twitter</a></div>
                        <?php
                              
                              
                              if(!$loggedin){
                              ?>
                                    <div><a href="../Auth/Login.php" target="_self"><img src="../images/login.png" alt="login" />login</a></div>
                                    <div><a href="../Auth/Join_Check.php" target="_self"><img src="../images/join.png" alt="join" />join</a></div>
                              <?php 
                              }else{
                                    if($_SESSION['level']=='1'){
                                         ?>
                                         <div><a href="../Auth/Admin.php"> 관리</a></div>
                                         <div><a href="../Auth/Logout.php" target="_self"><img src="../images/logout.png" alt="join" />logout</a></div>
                                         <?php
                                    } else{?>
                                          <div><a href="../Auth/Modify.php">정보수정</a></div>
                                         <div><a href="../Auth/Logout.php" target="_self"><img src="../images/logout.png" alt="join" />logout</a></div>
                                         <?php
                                    }
                              ?>
                              
                              <?php
                              }
                              ?>
                  </div>
                   </div>

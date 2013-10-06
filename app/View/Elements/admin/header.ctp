<?php $user = AuthComponent::user(); ?>
<!-- START OF HEADER -->
	<div class="header radius3">
    	<div class="headerinner">
        	
            <a href="">
                <?php echo $this->Html->image('redsuns.png', array('height' => '37px')); ?>
            </a>
            
              
            <div class="headright">
            	<div class="headercolumn">&nbsp;</div>
            	<div id="notiPanel" class="headercolumn" style="display:none;">
                    <div class="notiwrapper">
                        <a href="ajax/messages.php" class="notialert radius2">5</a>
                        <div class="notibox">
                            <ul class="tabmenu">
                                <li class="current"><a href="ajax/messages.php" class="msg">Messages (2)</a></li>
                                <li><a href="ajax/activities.php" class="act">Recent Activity (3)</a></li>
                            </ul>
                            <br clear="all" />
                            <div class="loader"><img src="../img/loaders/loader3.gif" alt="Loading Icon" /> Loading...</div>
                            <div class="noticontent"></div><!--noticontent-->
                        </div><!--notibox-->
                    </div><!--notiwrapper-->
                </div><!--headercolumn-->
                <div id="userPanel" class="headercolumn">
                    <a href="" class="userinfo radius2">
                        <?php echo $this->Html->image('avatar.png'); ?>
                        <span><strong><?php echo $user['name']; ?></strong></span>
                    </a>
                    <div class="userdrop">
                        <ul>
                            <li  style="display:none;"><a href="">Profile</a></li>
                            <li  style="display:none;"><a href="">Account Settings</a></li>
                            <li><?php echo $this->Html->link('Sair', '/admin/users/logout'); ?></li>
                        </ul>
                    </div><!--userdrop-->
                </div><!--headercolumn-->
            </div><!--headright-->
        
        </div><!--headerinner-->
	</div><!--header-->
    <!-- END OF HEADER -->
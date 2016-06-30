<ul class="nav nav-list">
   <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar  responsive">
        <ul class="nav nav-list">
            <?php 
                $active_class = '';
                if($this->uri->segment(1) == 'admin'){
                    $active_class = 'active';
                }
            ?>
            <li class="<?php echo $active_class; ?>">
                <a href="<?php echo base_url(); ?>adm_dashboard">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>

            <?php  if($this->session->userdata('User Management')){ ?>
            <?php 
                $active_class = '';
                if($this->uri->segment(1) == 'con_users'){
                    $active_class = 'active';
                }
            ?>
            <li class="<?php echo $active_class; ?>">
                    <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-users"></i> <span class="menu-text"> User Management </span> <b class="arrow fa fa-angle-down"></b> </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            
                            <?php
                                echo anchor('con_users/list_user', '<span class="menu-icon fa fa-user"></span><span class="menu-text">User </span>');
                            ?>
                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <?php
                                echo anchor('con_roles/index', '<i class="menu-icon fa fa-caret-right"></i> User Groups');
                            ?>
                            <b class="arrow"></b>
                        </li>
                    </ul>
            </li>
            <?php } ?>
			
            <?php  if($this->session->userdata('Manage Menu')){ ?>
            <?php 
                $active_class = '';
                if($this->uri->segment(1) == 'con_menus'){
                    $active_class = 'active';
                }
            ?>
            <li class="<?php echo $active_class; ?>">
                <?php 
                    echo anchor('con_menus/list_menu', '<span class="menu-icon fa fa-book"></span><span class="menu-text">Manage Menu </span>');
                ?>

                <b class="arrow"></b>
            </li>
            <?php } ?>

            <?php  if($this->session->userdata('Mange Articles')){ ?>
            <?php 
                $active_class = '';
                if($this->uri->segment(1) == 'con_articles'){
                    $active_class = 'active';
                }
            ?>
            <li class="<?php echo $active_class; ?>">
                <?php 
                    echo anchor('con_articles/list_article', '<span class="menu-icon fa fa-book"></span><span class="menu-text">Manage Pages </span>');
                ?>

                <b class="arrow"></b>
            </li>
            <?php } ?>

            <?php  if($this->session->userdata('Manage Partner')){ ?>
			<?php 
                $active_class = '';
                if($this->uri->segment(1) == 'con_partner'){
                    $active_class = 'active';
                }
            ?>
            <li class="<?php echo $active_class; ?>">
                <?php 
                    echo anchor('con_partner/list_partner', '<span class="menu-icon fa fa-book"></span><span class="menu-text">Manage Job and Detail </span>');
                ?>

                <b class="arrow"></b>
            </li>
            <?php } ?>

            <!--end code Chantra Choeung -->

             <?php  if($this->session->userdata('Manage SlideShow')){ ?>
             <?php
                $active_class = '';
                if($this->uri->segment(1) == 'con_sliders'){
                    $active_class = 'active';
                }
            ?>
            <li class="<?php echo $active_class; ?>">
                <?php
                    if($this->uri->segment(1) == 'con_sliders'){

                    }
                    echo anchor('con_sliders/list_slider', '<span class="menu-icon fa fa-user"></span><span class="menu-text">Manage SlideShow </span>');
                ?>

                <b class="arrow"></b>
            </li>
            <?php } ?>


            <?php  if($this->session->userdata('Setting')){ ?>
            <?php 
                $active_class = '';
                if($this->uri->segment(1) == 'con_settings'){
                    $active_class = 'active';
                }
            ?>
            <li class="<?php echo $active_class; ?>">
                <?php 
                    echo anchor('con_settings/con_settings', '<span class="menu-icon fa fa-cog"></span><span class="menu-text">Setting </span>');
                ?>

                <b class="arrow"></b>
            </li>
            <?php } ?>
            
        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>

<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">

<!-- Sidebar mobile toggler -->
<div class="sidebar-mobile-toggler text-center">
    <a href="#" class="sidebar-mobile-main-toggle">
        <i class="icon-arrow-left8"></i>
    </a>
    Navigation
    <a href="#" class="sidebar-mobile-expand">
        <i class="icon-screen-full"></i>
        <i class="icon-screen-normal"></i>
    </a>
</div>
<!-- /sidebar mobile toggler -->


<!-- Sidebar content -->
<div class="sidebar-content">

    <!-- User menu -->
    <div class="sidebar-user">
        <div class="card-body">
            <div class="media">
                <div class="mr-3">
                    <a href="#"><img src="<?php echo base_url();?>assets/backend/global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
                </div>

                <div class="media-body">
                    <div class="media-title font-weight-semibold"><?php echo $user_na; ?></div>
                    <div class="font-size-xs opacity-50">
                        <i class="icon-vcard font-size-sm"></i> &nbsp;
                        <?php $session_level = $this->Dashboard_model->getDatalevel($user_le); echo $session_level->roles_name ?>
                            <br/>
                        
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- /user menu -->


    <!-- Main navigation -->
    <div class="card card-sidebar-mobile">
        <ul class="nav nav-sidebar" data-nav-type="accordion">

            <!-- Main -->
            
            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>            
            
            <?php 
            $get_permissionsgroup_data =  $this->Dashboard_model->getroles_permissions($user_le);            
            foreach ($get_permissionsgroup_data as $get_permissionsgroup){
                $data_permissions = $this->Dashboard_model->getpermissions($get_permissionsgroup->idpermissions_group, $user_le);
                if($data_permissions->num_rows() > 0){  ?>
                        <li class="nav-item nav-item-submenu <?php $dtget_method = $this->Dashboard_model->getmethod_permission($get_permissionsgroup->idpermissions_group,$tk_m,$tk_c);                            
                            $get_method ='';
                            $get_class='';
                            $get_group='';
                            if($dtget_method != NULL){
                                $get_method = $dtget_method->code_method;
                                $get_class = $dtget_method->code_class;
                                $get_group = $dtget_method->idpermissions_group;
                            }
                            if ($tk_c == $get_class && $tk_m == $get_method && $get_permissionsgroup->idpermissions_group == $get_group) { ?><?php echo 'nav-item-open'; } else { echo '';} ?>">
                            <a href="#" class="nav-link"><i class="<?= $get_permissionsgroup->display_icon; ?>"></i> <span><?php echo $get_permissionsgroup->permissions_groupname; ?></span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="<?php echo $get_permissionsgroup->permissions_groupname; ?>" <?php if ($tk_c == $get_class && $tk_m == $get_method  && $get_permissionsgroup->idpermissions_group == $get_group) { ?>  <?php echo 'style="display: block;"'; } else { echo 'style="display: none;"';} ?>>                            
                                <?php 
                                $get_permissions_data = $this->Dashboard_model->getpermissions($get_permissionsgroup->idpermissions_group, $user_le);
                                
                                foreach($get_permissions_data->result() as $get_permissions){ ?>                                
                                    <li class="nav-item"><a href="<?=base_url().$get_permissions->code_class.'/'.$get_permissions->code_url; ?>" class="nav-link <?php if ( $tk_m == $get_permissions->code_method && $tk_c == $get_permissions->code_class && $get_permissionsgroup->idpermissions_group == $get_permissions->idpermissions_group ) { ?>  <?php echo 'active'; } ?>"><i class="<?= $get_permissions->display_icon ?>"></i><?php echo $get_permissions->display_name; ?></a></li>  
                                <?php } ?>
                            </ul>
                        </li>
                <?php 
                    } 
                } ?>
            
            
            <!-- /page kits -->

        </ul>
    </div>
    <!-- /main navigation -->

</div>
<!-- /sidebar content -->

</div>
<!-- /main sidebar -->
<ul class="nav ace-nav">
    <li class="dropdown-modal">
        <a data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle">
            <i class="fa fa-user fa-lg"></i>
            <span class="user-infof">
                <small><?php echo strtoupper($this->ion_auth->user()->row()->first_name . ' ' . $this->ion_auth->user()->row()->last_name); ?></small>
            </span>
            <i class="ace-icon fa fa-caret-down"></i>
        </a>
        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

            <li class="divider"></li>
            <li>
                <a href="<?php echo site_url('poweroff') ?>">
                    <i class="ace-icon fa fa-power-off"></i>
                    Logout
                </a>
            </li>
        </ul>
    </li>
</ul>
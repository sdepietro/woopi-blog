<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Usuario</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?= panel_url('profile') ?>"><i class="icon-user"></i> Mi Perfil</a></li>
                <li class="divider"></li>
                <li><a href="<?= panel_url('login/logout') ?>"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
</div>
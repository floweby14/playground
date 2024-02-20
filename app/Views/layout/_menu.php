        <!-- Overlay For Sidebars -->

        <div class="overlay"></div>

<!-- Left Sidebar -->

    <aside id="leftsidebar" class="sidebar">

        <div class="navbar-brand">

            <a href="/home/">
                
                <img src="<?php echo base_url('assets') ?>/dashboard/hammer.png" style="width: 30px; height: 30px;" alt="logo_sph">
                <span class="m-l-7" style="font-size: 20px;">Keuangan TNMD</span>
            
            </a>

        </div>

        <div class="menu">

            <ul class="list">

                <li>

                    <div class="user-info">
                        
                        <div class="image mr-2"><img src="/assets/images/yoimiya.png" alt="User"></div>

                        <div class="detail">

                            <h4><?php echo ucwords(session() -> username) ?></h4>

                        </div>

                    </div>

                </li>

               
                    <li class="active"><a href="/home/user"><i class="fas fa-user-gear"></i><span>Data User</span></a></li>
                    <li class="active"><a href="/home/pelanggan"><i class="fas fa-user-gear"></i><span>Data Pelanggan</span></a></li>
                    <li class="active"><a href="/home/permainan"><i class="fas fa-user-gear"></i><span>Permainan</span></a></li>
                    <li class="active"><a href="/home/logout"><i class="fas fa-power-off"></i><span>Logout</span></a></li>
            

            </ul>

        </div>

    </aside>

                     
<?php $this->load->helper('url');?>



<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="<?php echo base_url();?>images/logo_.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url();?>images/part2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
				<?php $tsknya=base_url(uri_string()); 
				
				?>
                    
					<?php 
					if($tsknya==base_url().'mda/index')
					{echo"<li class='active'>";}
					else
					{echo"<li class=''>";}
					?>
					
                        <a href="<?php base_url();?>index"> <i class="menu-icon fa fa-dashboard"></i>Divisi Cash Man.</a>
                    </li>
					
					 <h3 class="menu-title">DATA MASTER</h3>
					
					<?php 
					if($tsknya=="".base_url()."mda/masterkl")
					{echo"<li class='active'>";}
					else
					{echo"<li class=''>";}
					?>
                        <a href="<?php base_url();?>masterkl">
						<i class="menu-icon fa fa-building-o"></i>Kantor Layanan</a>
                    </li>
					

					<?php 
					if($tsknya=="".base_url()."mda/userkl")
					{echo"<li class='active'>";}
					else
					{echo"<li class=''>";}
					?>
                        <a href="<?php base_url();?>userkl">
						<i class="menu-icon fa fa-users"></i>User KL</a>
                    </li>
					



					
					<h3 class="menu-title">MONITORING HARIAN</h3>
					
					<?php 
					if($tsknya=="".base_url()."mda/monpagi")
					{echo"<li class='active'>";}
					else	
					{echo"<li class=''>";}
					?>
                        <a href="<?php base_url();?>monpagi">
						<i class="menu-icon fa fa-cloud"></i>Pagi Hari</a>
                    </li>
					
					
					<?php 
					
					if($tsknya=="".base_url()."mda/monsiang")
					{echo"<li class='active'>";}
					else
					{echo"<li class=''>";}
					?>
                        <a href="<?php base_url();?>monsiang">
						<i class="menu-icon fa fa-cog"></i>Siang Hari </a>
                    </li>
					
					<?php 
					if($tsknya=="".base_url()."mda/perjam")
					{echo"<li class='active'>";}
					else
					{echo"<li class=''>";}
					?>
                        <a href="<?php base_url();?>perjam">
						<i class="menu-icon fa fa-clock-o"></i>Per 3 Jam </a>
                    </li>
					
					
					<!--------------->

					<h3 class="menu-title">MONITORING MINGGUAN</h3>
					
					<?php 
					/*
					
					*/
					if($tsknya=="".base_url()."mda/mga")
					{echo"<li class='active'>";}
					else
					{echo"<li class=''>";}
					?>
                        <a href="<?php base_url();?>mga">
						<i class="menu-icon fa fa-unlink"></i>UTLE</a>
                    </li>
					
					
					<?php 
					if($tsknya=="".base_url()."mda/mgb")
					{echo"<li class='active'>";}
					else
					{echo"<li class=''>";}
					
					?>
                        <a href="<?php base_url();?>mgb">
						<i class="menu-icon fa fa-map-marker"></i>GPS </a>
                    </li>
					
					<?php 
					if($tsknya=="".base_url()."mda/mgc")
					{echo"<li class='active'>";}
					else
					{echo"<li class=''>";}
					?>
                        <a href="<?php base_url();?>mgc">
						<i class="menu-icon fa fa-video-camera"></i>CCTV </a>
                    </li>

					<?php 
					if($tsknya=="".base_url()."mda/mgd")
					{echo"<li class='active'>";}
					else
					{echo"<li class=''>";}
					?>
                        <a href="<?php base_url();?>mgd">
						<i class="menu-icon fa fa-money"></i>Dana Operasional </a>
                    </li>
					
					<?php 
					if($tsknya=="".base_url()."mda/mge")
					{echo"<li class='active'>";}
					else
					{echo"<li class=''>";}
					?>
                        <a href="<?php base_url();?>mge">
						<i class="menu-icon fa fa-external-link"></i>Sanggahan </a>
                    </li>





					<h3 class="menu-title">ACCOUNT</h3>
					
					<?php 
					if($tsknya=="".base_url()."mda/masterkl")
					{echo"<li class='active'>";}
					else
					{echo"<li class=''>";}
					?>
                        <a href="<?php base_url();?>masterkl">
						<i class="menu-icon fa fa-user-md"></i>Account</a>
                    </li>
					
					<li class=''>
					<a href="<?php base_url();?>logout">
					<i class="menu-icon fa fa-power-off"></i>Logout</a>
                    </li>




                    </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
	<div id="right-panel" class="right-panel">
	 <header id="header" class="header">

            <div class="header-menu" >

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    
					<span id="judul">Aplikasi Monitoring Operasional</span>
                </div>

                <div class="col-sm-5">
                    

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
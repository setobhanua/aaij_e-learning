<style>
.cs_customnavbar
{
	position: fixed;
	right:0px;
	margin-right:10px!important;
	font-size:30px!important;
	width:250px;
}
</style>
<nav class="navbar navbar-expand-lg">
	<div class="container-fluid">
		<div class="navbar-wrapper">
			<div class="navbar-minimize">
				<button id="minimizeSidebar" class="btn btn-primary btn-fill btn-round btn-icon d-none d-lg-block">
					<i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
					<i class="fa fa-navicon visible-on-sidebar-mini"></i>
				</button>
			</div>
			<span class="navbar-brand"><?php echo $navbar_brand; ?></span>
			
			<!-- <span class="navbar-brand cs_customnavbar" style=''>Manufacturing Information System</span>
			<img class="cs_customnavbar" src='assets/icon/logo3.png'>
			 <div class="collapse navbar-collapse justify-content-end">
				   <ul class="navbar-nav mr-auto">
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                </a>
								  <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Create New Post</a>
                                    <a class="dropdown-item" href="#">Manage Something</a>
                                    <a class="dropdown-item" href="#">Do Nothing</a>
                                    <a class="dropdown-item" href="#">Submit to live</a>
                                    <li class="divider"></li>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </ul>
							</li>
					</ul>
			 </div> -->
		</div>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-bar burger-lines"></span>
			<span class="navbar-toggler-bar burger-lines"></span>
			<span class="navbar-toggler-bar burger-lines"></span>
		</button>


			<div class="collapse navbar-collapse justify-content-end">
				<span style="margin-right:250px;"><?=$_SESSION['status']?"Admin":"User"?>, <?=$_SESSION['user_nama']?></span>
				<!-- <ul class="nav navbar-nav mr-auto">
					<form class="navbar-form navbar-left navbar-search-form" role="search">
						<div class="input-group">
							<i class="nc-icon nc-zoom-split"></i>
							<input type="text" value="" class="form-control" placeholder="Search...">
						</div>
					</form>
				</ul> -->
			</div>
		
		
	</div>
	
</nav>
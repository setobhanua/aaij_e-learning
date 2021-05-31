<?php
date_default_timezone_set("Asia/Jakarta");
$npk = $_SESSION["npk"];
$status = $_SESSION['status'];

function admin(){
	$status = $_SESSION['status'];
	if ($status == 1) {
		return "show";
	}elseif ($status == 0) {
		return "none";
	}
}
?>
<div class="sidebar" data-color="blue" data-image="">
	<div class="sidebar-wrapper" style='border-right:thin #cccccc solid;'>
		<div class="logo">
			<a href="https://www.akebono-astra.co.id/" class="simple-text logo-normal">
			<center><img style='height:25px;' width="auto" src="assets/img/logo_akebono3.png"></center>
					
			</a>
		</div>

		<div class="user">
			<form class="navbar-form navbar-left navbar-search-form" role="search">
				<div class="input-group">
					<i class="nc-icon nc-zoom-split" style='margin-left:10px;'></i>
					<input style='margin-left:20px;' type="text" class="form-control" id="filter" placeholder="Pencarian...">
				</div>
			</form>
		</div>
		<ul class="nav">
			<!-- Menu Utama 1 -->
			<li class="nav-item <?php if ($_GET['hm'] == 'hm') {
												echo 'active';
											} ?>">
				<a class="nav-link " href="home.php?hm=hm">
					<i><img src="assets/icn/home.png" width="auto" height="30px" /></i>
					<p>
						Beranda</p>
				</a>
			</li>

			<!-- Kelas -->
			<!-- Menu Utama 2 -->
			<li class="nav-item <?php if ($collapsePage == 'menu2') {
									echo 'active';
								} ?>">
				<a class="nav-link" data-toggle="collapse" href="#menu2">
					<!--<i class="nc-icon nc-notes"></i>-->
					<i><img src="assets/icn/teach.png" width="auto" height="30px" /></i>
					<p>Kelas
						<b class="caret"></b>
					</p>
				</a>
				<div class="collapse <?php if ($collapsePage == 'menu2') {
											echo 'show';
										} ?>" id="menu2">
					<ul class="nav">
						
						<!-- Sub Menu2 3 -->
						<li class="nav-item <?php if ($_GET['wjb'] == 'wjb' || $page=="kelas_wajib") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="kelas_wajib.php?wjb=wjb">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">Kelas Wajib</span>
							</a>
						</li>
						<!-- Sub Menu2 4 -->
						<li class="nav-item <?php if ($_GET['plh'] == 'plh' || $page=="kelas_pilihan") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="kelas_pilihan.php?plh=plh">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">Kelas Pilihan</span>
							</a>
						</li>
						<!-- Sub Menu2 5 -->
						<li class="nav-item <?php if ($_GET['sy'] == 'sy' || $page=="kelas_saya") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="kelas_saya.php?sy=sy">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">Kelas Saya</span>
							</a>
						</li>
						
					</ul>
				</div>
			</li>

			<!-- Profile -->
			
				<li class="nav-item <?php if ($_GET['prl'] == 'prl') {
												echo 'active';
											} ?>">
					<a class="nav-link" href="profile.php?prl=prl">
						<!--<i class="nc-icon nc-notes"></i>-->
						<i><img src="assets/icn/user.png" width="auto" height="30px" /></i>
						<p>Profil
							
						</p>
					</a>
				</li>								

			

					
							<!-- Sub menu3 2 -->
							
						
			<!--ADMIN -->
			
					
		<?php if($_SESSION['status']): ?>
			<li class="nav-item <?php if ($collapsePage == 'menu3') {
											echo 'active';
										} ?>">
				<a class="nav-link" data-toggle="collapse" href="#menu3">
					<!--<i class="nc-icon nc-notes"></i>-->
					<i><img src="assets/icon/admin.png" width="auto" height="30px" /></i>
					<p>Admin
						<b class="caret"></b>
					</p>
				</a>

				<div class="collapse<?php if ($collapsePage == 'menu3') {
												echo 'show';
											} ?>" id="menu3">
					<ul class="nav">
						
						<!-- Sub Menu3 1 -->
						<li class="nav-item <?php if ($_GET['mowa'] == 'mowa' || $page=="admin_module_wajib") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="admin_module_wajib.php?mowa=mowa">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">Module Wajib</span>
							</a>
						</li>
						

						<!-- Sub Menu3 2 -->
						<li class="nav-item <?php if ($_GET['mopi'] == 'mopi' || $page=="admin_module_pilihan") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="admin_module_pilihan.php?mopi=mopi">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">Module Pilihan</span>
							</a>
						</li>


						<!-- Sub Menu3 3 -->
						<li class="nav-item <?php if ($_GET['sic'] == 'sic' || $page=="admin_sic") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="admin_sic.php?sic=sic">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">Sharing is Caring Ekstern</span>
							</a>
						</li>

						<!-- Sub Menu3 3 -->
						<li class="nav-item <?php if ($_GET['sic2'] == 'sic2' || $page=="admin_sic2") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="admin_sic2.php?sic2=sic2">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">Sharing is Caring Intern</span>
							</a>
						</li>


						<!-- Sub Menu3 4 -->
						<li class="nav-item <?php if ($_GET['avi'] == 'avi' || $page=="admin_video") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="admin_video.php?avi=avi">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">AICast</span>
							</a>
						</li>


						<!-- Sub Menu3 5 -->
						<li class="nav-item <?php if ($_GET['adbok'] == 'adbok' || $page=="admin_book") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="admin_book.php?adbok=adbok">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">library</span>
							</a>
						</li>

						<!-- Sub Menu3 5 -->
						<li class="nav-item <?php if ($_GET['edbok'] == 'edbok' || $page=="admin_ebook") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="admin_ebook.php?edbok=edbok">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">eLibrary</span>
							</a>
						</li>

						<!-- Sub Menu3 6 -->
						<li class="nav-item <?php if ($_GET['prg'] == 'prg' || $page=="admin_progress" || $page=="admin_progress_det") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="admin_progress.php?prg=prg">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">Progress</span>
							</a>
						</li>

						<!-- Sub Menu3 7 -->
						<li class="nav-item <?php if ($_GET['kry'] == 'kry' || $page=="karyawan") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="karyawan.php?kry=kry">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">Data Karyawan</span>
							</a>
						</li>
						
						<!-- Sub Menu3 8 -->
						<li class="nav-item <?php if ($_GET['adfaq'] == 'adfaq' || $page=="admin_faq") {
												echo 'active';
											} ?>">
							<a class="nav-link " href="admin_faq.php?adfaq=adfaq">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">FAQ</span>
							</a>
						</li>


					</ul>
				</div>
			</li>

		<?php endif; ?>
		
							
						
			<!-- Informasi -->					
	
			<li class="nav-item <?php if ($collapsePage == 'menu4') {
									echo 'active';
								} ?>">
				<a class="nav-link" data-toggle="collapse" href="#menu4">
					<i><img src="assets/icn/i.png" width="auto" height="30px" /></i>
					<p>Informasi
						<b class="caret"></b>
					</p>
				</a>

				<div class="collapse <?php if ($collapsePage == 'menu4') {
											echo 'show';
										} ?>" id="menu4">
					<ul class="nav">
						<!-- Sub Menu3 1 -->
						<li class="nav-item <?php if ($_GET['inf'] == 'inf') {
												echo 'active';
											} ?>">
							<a class="nav-link" href="about.php?inf=inf">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">Tentang</span>
							</a>
						</li>

						
						
						<!-- Sub Menu3 2 -->
						<li class="nav-item <?php if ($_GET['fq'] == 'fq') {
												echo 'active';
											} ?>">
							<a class="nav-link" href="faq.php?fq=fq">
								<span class="sidebar-mini"></span>
								<span class="sidebar-normal">FAQ</span>
							</a>
						</li>
												
					</ul>
				</div>

			</li>

			

			<li class="nav-item active" style='margin-top:20px;'>
				<a id="logout-btn" class="nav-link" style='background-color:#2e86de; cursor:pointer;'>
					<i><img style="-webkit-transform: scaleX(-1); transform: scaleX(-1); bottom:0px;" src="assets/icon/logout_logo.png" width="auto" height="30px" /></i>
					<p>Keluar</p>
				</a>
			</li>
			
		</ul>
	</div>
</div>


<script src="assets\jstambahan\jquery.min.js"></script>
<script>
	$("#logout-btn").on("click", function() {
		var acc = confirm("Apakah Anda ingin keluar?");
		if (acc == true) {
			window.location.href = "logout.php";
		} else {

		}
	});

	var labels = $('span'); // cache this for better performance
	$('#filter').keyup(function() {
		var valThis = $(this).val().toLowerCase();

		if (valThis == "") {
			labels.parent().show(); // show all lis
			$('.collapse').collapse("hide");
		} else {
			labels.each(function() {
				var label = $(this); // cache this
				var text = label.text().toLowerCase();

				if (text.indexOf(valThis) > -1) {
					label.parents('a').show(); // show all li liparents up the ancestor tree
					$('.collapse').collapse("show");
				} else {
					label.parent().hide(); // hide current li as it doesn't match
				}
			});
		};
	});
</script>
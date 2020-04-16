<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0&appId=379994899221403&autoLogAppEvents=1"></script>
<div class="top-menu yellow">
	<div class=" container">
		<nav class="menu">
			<ul>
				<li class="<?php if (isset($_GET['menu_id'])) {
								echo 'not-active';
							}else{
								echo 'active';
							}
							?>"><a href="<?php echo BASE_URL ?>"><i class="fas fa-home"></i></a></li>
				<?php
				$post_data = $db->select_data("tbl_menu", "id,name,color,name_link", "status=1", "od DESC", "0,99");
				if ($post_data != 0) {
					foreach ($post_data as $row) {
				?>
						<li class="<?php
									if (isset($_GET['menu_id'])) {
										$menu = $_GET['menu_id'];
										$active = $row[3];
										if ($menu == $active) {
											echo 'active';
										} else {
											echo 'not-active';
										}
									}
									?>"><a href="<?php echo BASE_URL . $row[3]; ?>"><?php echo $row[1]; ?></a></li>
				<?php
					}
				}
				date_default_timezone_set('Asia/Phnom_Penh');
				?>
			</ul>
		</nav>
	</div>
</div>
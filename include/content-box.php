<?php
$post_data = $db->select_data("tbl_menu", "id,name,color,name_link", "status=1", "od DESC", "0,99");
if ($post_data != 0) {
	foreach ($post_data as $row) {
?>
		<a href="<?php echo  BASE_URL . $row[3]; ?>">
			<div class="category yellow" style="background: <?php echo $row[2]; ?>"><span></span><?php echo $row[1]; ?></div>
		</a>
		<div class="box-content b-yellow" style="border-top:2px solid <?php echo $row[2]; ?>">
			<div class="row row-item" data-menu="<?php echo $row[0] ?>">
				

			</div>
		</div>
<?php
	}
}

?>
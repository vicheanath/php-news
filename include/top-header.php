<div id="fb-root"></div>
<script>
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<div class="top-header container">
  <div class="top-logo">
    <div class="main-logo">
      <a href="<?php echo BASE_URL ?>">
        <img src="<?php echo BASE_URL ?>assete/images/main-logo.svg" alt="main-logo">
      </a>
    </div>
  </div>
  <span><i class="fa fa-bars menu-icon" aria-hidden="true"></i></span>
  <div class="ads-right-logo">
    <div class="ads-728x90">
      <?php $row = $db->select_cur_data("tbl_ads", "id,img", "status=1&&location=1", "id DESC", "0,1"); ?>
      <img src="<?php BASE_URL ?>admin/img/product/<?php echo $row[1]; ?>" alt="">

    </div>
  </div>
</div>
<?php
include "_config_inc.php";
include BASE_PATH."admin/action/db/db.php";
$db= new Database;
include BASE_PATH."include/header.php";


$url= BASE_URL;
$title= 'V Report News';
$des= 'News Web Site in cambodia';
$img= 'assete/images/logo.png';



//include BASE_URL."include/og.php";
?>
</head>	
<body>
    <!--Header-->
	<section id="header">
<!--       Top Header-->
       <?php include BASE_PATH."include/top-header.php" ?>
<!--       Top Menu-->
       <?php include BASE_PATH."include/top-menu.php" ?> 
    </section>
    <!-- endheader -->
    <!--	Content-->
	<section id="content">
        <div class="container">
            <!-- slide -->
			
			<?php
			$status_code= http_response_code();
            $code = $db->status_code();
            ?>
			<h1><?php echo $code[$status_code] ?></h1>
  
		</div>
	</section>
    <!--	Footer-->
	<section id="footer">
        <div class="container">
            <div class="row">
                <!-- Adress -->
                <div class="col-md-4 address">
                   <h2>អស័យដ្ជាន</h2>
                   <p>ភូមិអង្គជ័យ ឃុំដំណាក់កន្ទួតខាងត្បូង ស្រុកកំពង់ត្រាច ខេត្តកំពត</p>
                </div>
                <!-- Info -->
                <div class="col-md-4 info">
                    <h2>អំពីយើង</h2>
                    <p>រចនាដោយ៖ ណាត វិជ្ជា</p>
                </div>
                <!-- Contuct -->
                <div class="col-md-4 contuct">
                    <h2>ទំនាក់ទំនង</h2>
                    <p>លេខទូរសព្ទ៖​ 096​ 67 91 754</p>
                    <p>សារអេឡិត្រូនិច៖​ nathvichea1@gmail.com</p>
                </div>
            </div>
        </div>
	</section>	
</body>
</html>
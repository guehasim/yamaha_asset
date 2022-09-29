<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Website Pelamar Pekerjaan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Appraise Register Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs Sign up Web Templates, 
 Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- Custom Theme files -->
	<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="<?php echo base_url() ?>assets/content/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/content/build/css/custom.min.css" rel="stylesheet">

	<link href="<?php echo base_url() ?>assets/awal/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/awal/css/style.css" rel='stylesheet' type='text/css' />

	<link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">

	<style type="text/css">
	.btnsudah{
		background-color: #189e1c;
	}
	.btnbelum{
		background-color: #dbd521;
	}
	</style>
	<!--//fonts-->
</head>


<body>
	<!-- login -->
	<h1 class="wthree">Info Riwayat</h1>
	<br/>
	<div class="col-md-12 col-sm-12  profile_details" style="opacity: 0.8;">
        <div class="well profile_view">
          <div class="col-sm-12">
            <div class="left col-md-12 col-sm-12">

            	<?php foreach ($asset->result() as $as): ?>

                <div class="right col-md-12 col-sm-12 text-center">
                  <img src="<?php echo base_url() ?>assets/upload/images/<?php echo $as->ImageAsset;?>" alt="" class="img-circle img-fluid" style="height: 150px;">
                </div> 

                <?php endforeach ?>              	
                <table class="right col-sm-12 col-md-12">
                	<?php foreach ($asset->result() as $as): ?>               		
                	
                	<tbody>
                		<tr>
                			<td style="text-align: right; width: 40%;">Kode</td>
                			<td style="text-align: center; width: 15%;">:</td>
                			<td style="text-align: left; width: 45%;"><?php echo $as->KodeAsset;?></td>
                		</tr>
                		<tr>
                			<td style="text-align: right;">Nama</td>
                			<td style="text-align: center;">:</td>
                			<td style="text-align: left;"><?php echo $as->NamaAsset;?></td>
                		</tr>
                		<tr>
                			<td style="text-align: right;">Lokasi</td>
                			<td style="text-align: center;">:</td>
                			<td style="text-align: left;"><?php echo $as->NamaLokasi;?></td>
                		</tr>
                	</tbody>

                	<?php endforeach ?>
                </table>
            </div>
          </div>
          <div class="col-md-12 col-sm-12">
          	<label></label>
          </div>
	        <div class="table-responsive">             	
	            <table id="datatable-fixed-header" class="table table-striped table-bordered dataTable no-footer" width="100%" aria-describedby="datatable-fixed-header_info">
	              <thead>
	                <tr>
	                  <th>No.</th>
	                  <th>Tanggal</th>
	                  <th>Repair</th>
	                  <th>Pen. Jawab</th>
	                </tr>
	              </thead>
	              <tbody>
	                <?php $no = 1; foreach ($detail->result() as $ad): ?>
	                <tr>
	                  <td><?php echo $no++;?></td>
	                  <td><?php echo date('d M y',strtotime($ad->TglRepair));?></td>
	                  <td><?php echo $ad->NamaRepair;?></td>
	                  <th><?php echo $ad->NamaUser;?></th>
	                </tr>
	                
	            	<?php endforeach ?>
	              </tbody>
	            </table>

	        </div>
        </div>
      </div>

</body>    
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/content/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="<?php echo base_url() ?>assets/content/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="<?php echo base_url() ?>assets/content/vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/content/build/js/custom.min.js"></script>

</html>
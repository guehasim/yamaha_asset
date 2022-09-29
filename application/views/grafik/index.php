<!DOCTYPE html>
<html lang="en">
<head>

  <?php 
  error_reporting(0);
  $sec = "15";
  ?>
  <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta http-equiv="refresh" content="<?php echo $sec?>;">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Yamaha Assets</title>
  
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/vendor_components/bootstrap/dist/css/bootstrap.min.css">
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/bootstrap-extend.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/master_style.css">

    <!-- skins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/skins/_all-skins.css">
    
    <!-- main-nav -->
    <link href="<?php echo base_url(); ?>assets/login/css/main-nav.css" rel="stylesheet" />    

    <!-- bootstrap datepicker --> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- toast CSS -->
    <link href="<?php echo base_url(); ?>assets/login/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">


    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="<?php echo base_url() ?>assets/content/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/build/css/custom.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
      }

      th{
        background-color: #020673;
        color:#FFFFFF;
      }

      tr:nth-child(even) {
        background-color: #D6EEEE;
      }
    </style>

    <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  title: {
    text: " "
  },
  theme: "light2",
  animationEnabled: true,
  toolTip:{
    shared: true,
    reversed: true
  },
  axisY: {
    title: "Total Monitoring",
    suffix: ""
  },
  legend: {
    cursor: "pointer",
    itemclick: toggleDataSeries
  },
  data: [
  {
      type: "stackedColumn",
      name: "Assets Repair",
      showInLegend: true,
      yValueFormatString: "#,##0",
      color: "#fc0303",
      dataPoints: <?php echo json_encode($open, JSON_NUMERIC_CHECK); ?>
    }
  ]
});
 
chart.render();
 
function toggleDataSeries(e) {
  if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  } else {
    e.dataSeries.visible = true;
  }
  e.chart.render();
}
 
}
</script>
</head>
<body class="hold-transition bg-img" style="background-color :#000000" data-overlay="3">    
    <div class="wrapper">
      <div class="container">
        <div class="row mt-20">    
          <div class="col-lg-12 col-xs-12">
            <div class="card">
              <div class="card-body">
                <h2 class="bg-purple-ym p-2 text-center font-weight-bold" style="background-color:#020673;">Assets Repair Monitoring</h2>
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-xs-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable-fixed-header" class="table table-striped table-bordered dataTable no-footer" width="100%" aria-describedby="datatable-fixed-header_info">
                    <thead style="background-color:#020673;;">
                      <th>No.</th>
                      <th>Tanggal</th>
                      <th>Repair</th>
                      <th>Assets</th>
                      <th>Lokasi</th>
                      <th>Pen.Jawab</th>
                    </thead>
                    <tbody>
                      <?php

                      $query = $this->db->query("SELECT
                                                  tbl_detailasset.ID_DetailAsset, 
                                                  tbl_detailasset.TglRepair, 
                                                  tbl_detailasset.ID_Asset, 
                                                  tbl_detailasset.PelaksanaRepair, 
                                                  tbl_detailasset.ID_User_Input, 
                                                  tbl_detailasset.NamaRepair, 
                                                  m_asset.NamaAsset, 
                                                  m_lokasi.NamaLokasi, 
                                                  m_user.NamaUser
                                                FROM
                                                  tbl_detailasset
                                                  INNER JOIN
                                                  m_asset
                                                  ON 
                                                    tbl_detailasset.ID_Asset = m_asset.ID_Asset
                                                  INNER JOIN
                                                  m_lokasi
                                                  ON 
                                                    m_asset.LokasiAsset = m_lokasi.ID_Lokasi
                                                  INNER JOIN
                                                  m_user
                                                  ON 
                                                    tbl_detailasset.PelaksanaRepair = m_user.ID_User
                                                ORDER BY
                                                  tbl_detailasset.TglRepair DESC"); 
                       ?>
                       <?php $no=1; foreach ($query->result() as $ad): ?> 
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d M y',strtotime($ad->TglRepair));?></td>
                        <td><?php echo $ad->NamaRepair;?></td>
                        <td><?php echo $ad->NamaAsset;?></td>
                        <td><?php echo $ad->NamaLokasi;?></td>
                        <td><?php echo $ad->NamaUser;?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    <script src="<?php echo base_url() ?>assets/chart/canvasjs.min.js"></script>

    <!-- jQuery 3 -->
    <script src="<?php echo base_url(); ?>assets/login/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
    
    <!-- popper -->
    <script src="<?php echo base_url(); ?>assets/login/vendor_components/popper/dist/popper.min.js"></script>
    
    <!-- Bootstrap 4.0-->
    <script src="<?php echo base_url(); ?>assets/login/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- toast -->
    <script src="<?php echo base_url(); ?>assets/login/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>



    <!-- bootstrap datepicker -->
  <script src="<?php echo base_url(); ?>assets/login/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- JQuery Validate -->
    <script src="<?php echo base_url(); ?>assets/login/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>

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

    <script src="<?php echo base_url() ?>assets/content/vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url() ?>assets/content/vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/content/build/js/custom.min.js"></script>
    
</body>
</html>

       <?php error_reporting(0); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>Laporan Log Assets</h2>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">              
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">

                      <form method="post" action="<?php echo base_url(); ?>log/laporan">
                        <div class="col-md-2">
                          <?php
                            if(isset($_POST['period_awal'])){
                              if ($_POST['period_awal'] == NULL) {
                                $oke_awal = "";
                              }else{
                                $oke_awal = $_POST['period_awal'];
                              }
                            }else{
                              $oke_awal = "";
                            }
                              
                          ?>
                          <input id="birthday" name="period_awal" value="<?php echo $oke_awal;?>" class="date-picker form-control" type="text" onfocus="this.type='date'" onclick="this.type='date'" placeholder="Tanggal Awal" required>
                          </div>

                          <div class="col-md-2">
                          <?php
                            if(isset($_POST['period_akhir'])){
                              if ($_POST['period_akhir'] == NULL) {
                                $oke_akhir = "";
                              }else{
                                $oke_akhir = $_POST['period_akhir'];
                              }
                            }else{
                              $oke_akhir = "";
                            }
                              
                          ?>
                          <input id="birthday" name="period_akhir" value="<?php echo $oke_akhir;?>" class="date-picker form-control" type="text" onfocus="this.type='date'" onclick="this.type='date'" placeholder="Tanggal Akhir" required>
                           <script>
                              function timeFunctionLong(input) {
                                setTimeout(function() {
                                  input.type = 'text';
                                }, 60000);
                              }
                            </script>
                          </div>

                          <div class="col-md-7 col-sm-7">
                            <div class="d-inline-flex align-items-center btn btn-info py-0">
                              <i class="fa fa-search"></i>
                              <input type="submit" name="submitdata" class="btn btn-info" value="Search" style="padding-bottom: 2px;" />
                            </div>

                            <div class="d-inline-flex align-items-center btn btn-warning py-0">
                              <i class="fa fa-arrow-circle-left" style="color:#FFFFFF;"></i>
                              <input type="submit" name="submitdata" class="btn btn-warning btn-xs" style="color:#FFFFFF;padding-bottom: 2px;" value="Reset"/>
                            </div>

                            <div class="d-inline-flex align-items-center btn btn-dark py-0">
                              <i class="fa fa-print"></i>
                              <input type="submit" name="submitdata" class="btn btn-dark btn-xs button-solid" formtarget="_blank" value="Print" style="padding-bottom: 2px;" />
                            </div>

                            <div class="d-inline-flex align-items-center btn btn-success py-0">
                              <i class="fa fa-print"></i>
                              <input type="submit" name="submitdata" class="btn btn-success btn-xs" value="Excel" style="padding-bottom: 2px;" />
                            </div>
                          </div>
                          <div>
                          </div>
                        </form>   
                      <div class="col-sm-12">
                              
                      <div class="card-box table-responsive">
                      <table id="datatable-keytable" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%">
                        <thead>
                          <tr>                            
                            <th >No.</th>
                            <th >Tanggal</th>
                            <th >Repair</th>
                            <th >Assets</th>
                            <th >Lokasi</th>
                            <th >Penanggung Jawab</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; foreach ($log->result() as $ad): ?>
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
            </div>
          </div>
        </div>

        
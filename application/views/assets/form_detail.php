 <?php if ($baru == 1): ?>

  <script type="text/javascript">
    function loadIdentitas() 
        {
          var nik = $("#nik_pilih").val();

          $.ajax({
                type:'GET',
                url:"<?php echo base_url(); ?>karyawan/pilih_id",
                data:"id=" + nik,
                success: function(html)
                { 
                   $("#tampil_id").html(html);
                }
            });

            $.ajax({
                type:'GET',
                url:"<?php echo base_url(); ?>karyawan/pilih_nama",
                data:"id=" + nik,
                success: function(html)
                { 
                   $("#tampil_nama").html(html);
                }
            });

            $.ajax({
                type:'GET',
                url:"<?php echo base_url(); ?>karyawan/pilih_dept",
                data:"id=" + nik,
                success: function(html)
                { 
                   $("#tampil_dept").html(html);
                }
            });
        }

  
  </script>

  <div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Input Detail Asset</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Asset/simpanDetail">

                <input type="text" name="id_asset" value="<?php echo $asset;?>" hidden>

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="birthday" name="Tgl" class="date-picker form-control font-size-16" type="text" onfocus="this.type='date'" onclick="this.type='date'" required>
                   <script>
                      function timeFunctionLong(input) {
                        setTimeout(function() {
                          input.type = 'text';
                        }, 60000);
                      }
                    </script>
                </div>
              </div>               

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Penanggung Jawab <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="nik" onkeypress="loadIdentitas()" id="nik_pilih" class="form-control" placeholder="(NIK Karyawan)" required>
                </div>
              </div>

              <div id="tampil_id"></div>

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                </label>
                <div class="col-md-6 col-sm-6 " id="tampil_nama">
                  <input type="text" class="form-control" disabled required>
                </div>
              </div>

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                </label>
                <div class="col-md-6 col-sm-6" id="tampil_dept">
                  <input type="text" class="form-control" disabled required>
                </div>
              </div>

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Repair <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="namarepair" class="form-control" required>
                </div>
              </div>

              <input type="text" name="id_user_input" value="<?php echo $this->session->userdata('ses_IdUser');?>" hidden>             

              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a href="<?php echo base_url() ?>Asset/detail_asset?us=<?php echo $asset;?>"><button class="btn btn-primary" type="button">Kembali</button></a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
 <?php else: ?>

  <script type="text/javascript">
    function loadIdentitas() 
        {
          var nik = $("#nik_pilih").val();

          $.ajax({
                type:'GET',
                url:"<?php echo base_url(); ?>karyawan/pilih_id",
                data:"id=" + nik,
                success: function(html)
                { 
                   $("#tampil_id").html(html);
                }
            });

            $.ajax({
                type:'GET',
                url:"<?php echo base_url(); ?>karyawan/pilih_nama",
                data:"id=" + nik,
                success: function(html)
                { 
                   $("#tampil_nama").html(html);
                }
            });

            $.ajax({
                type:'GET',
                url:"<?php echo base_url(); ?>karyawan/pilih_dept",
                data:"id=" + nik,
                success: function(html)
                { 
                   $("#tampil_dept").html(html);
                }
            });
        }

  
  </script>

 <div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Update Detail Asset</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Asset/updatedetail">

              <?php foreach ($detail->result() as $ad): ?>

             <input type="text" name="id_asset" value="<?php echo $ad->ID_Asset?>" hidden>

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="birthday" name="Tgl" value="<?php echo date('d-m-Y',strtotime($ad->TglRepair));?>" class="date-picker form-control font-size-16" type="text" onfocus="this.type='date'" onclick="this.type='date'" required>
                   <script>
                      function timeFunctionLong(input) {
                        setTimeout(function() {
                          input.type = 'text';
                        }, 60000);
                      }
                    </script>
                </div>
              </div>               

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Penanggung Jawab <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="nik" value="<?php echo $ad->NikUser;?>" onkeypress="loadIdentitas()" id="nik_pilih" class="form-control" placeholder="(NIK Karyawan)" required>
                </div>
              </div>

              <div id="tampil_id"><input type="text" name="karyawan" value="<?php echo $ad->ID_User;?>"></div>

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                </label>
                <div class="col-md-6 col-sm-6 " id="tampil_nama">
                  <input type="text" class="form-control" value="<?php echo $ad->NamaUser;?>" disabled required>
                </div>
              </div>

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                </label>
                <div class="col-md-6 col-sm-6" id="tampil_dept">
                  <input type="text" class="form-control" value="<?php echo $ad->DeptUser;?>" disabled required>
                </div>
              </div>

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Repair <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="namarepair" value="<?php echo $ad->NamaRepair;?>" class="form-control" required>
                </div>
              </div>

              <input type="text" name="id_user_input" value="<?php echo $this->session->userdata('ses_IdUser');?>" hidden> 

              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="<?php echo base_url() ?>Asset/detail_asset?us=<?php echo $ad->ID_Asset;?>"><button class="btn btn-primary" type="button">Kembali</button></a>
                  <?php endforeach ?>                  
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
 <?php endif ?>
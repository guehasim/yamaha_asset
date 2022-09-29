 <?php if ($baru == 1): ?>

  <div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Input Assets</h2>
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
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Asset/simpan" enctype="multipart/form-data">

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="kode" class="form-control" autofocus required>
                </div>
              </div>

              <input type="text" name="jenis_form" value="2" hidden>

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="nama" class="form-control" required>
                </div>
              </div>  

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Lokasi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-control" name="lokasi" required>
                    <option></option>
                    <?php foreach ($lokasi->result() as $ad): ?>
                      <option value="<?php echo $ad->ID_Lokasi;?>"><?php echo $ad->NamaLokasi;?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div> 

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Gambar<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="file" name="image" class="form-control" required>
                </div>
              </div>            

              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a href="<?php echo base_url() ?>Asset"><button class="btn btn-primary" type="button">Kembali</button></a>
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

 <div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Update Assets</h2>
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
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Asset/update" enctype="multipart/form-data">

              <?php foreach ($asset->result() as $ad): ?>

              <input type="text" name="id" value="<?php echo $ad->ID_Asset;?>" hidden>             
              
              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="kode" class="form-control" value="<?php echo $ad->KodeAsset;?>" required>
                </div>
              </div>

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="nama" class="form-control" value="<?php echo $ad->NamaAsset;?>" required>
                </div>
              </div>  

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Lokasi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-control" name="lokasi" required>
                    <?php foreach ($lokasi->result() as $as): ?>
                      <?php
                      if ($ad->LokasiAsset == $as->ID_Lokasi) {
                         $tampil = "selected";
                       }else{
                        $tampil = "";
                       } 
                       ?>
                      <option value="<?php echo $as->ID_Lokasi;?>" <?php echo $tampil;?>><?php echo $as->NamaLokasi;?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div> 

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Gambar<span class="required">*</span>
                </label>
                <div class="col-md-6">
                  <img class="img-responsive avatar-view" src="<?=base_url()?>assets/upload/images/<?=$ad->ImageAsset;?>" style="height: 50px; text-align:center; display: block; height:100px">
                </div>
              </div>    

              <div class="item form-group form-check">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                </label>
                <div class="col-md-6">
                  <input type="file" name="image" class="form-control">
                </div>
              </div>             

              <?php endforeach ?>

              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a href="<?php echo base_url() ?>Asset"><button class="btn btn-primary" type="button">Kembali</button></a>
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

      
      <!-- /page content -->
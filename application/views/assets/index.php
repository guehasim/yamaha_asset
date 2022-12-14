        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>Data Assets</h2>
              </div>

            </div>

            <div class="clearfix"></div>
            <div>
              <?php echo $this->session->flashdata('msg'); ?>
            </div> 

            <div class="row">              
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="<?php echo base_url() ?>Asset/newAsset"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Assets</button></a>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kode</th>
                          <th>Nama</th>
                          <th>Lokasi</th>
                          <th>Photo</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($assets->result() as $ad): ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $ad->KodeAsset;?></td>
                          <td><?php echo $ad->NamaAsset;?></td>
                          <td><?php echo $ad->NamaLokasi;?></td>
                          <td>
                            <?php if ($ad->ImageAsset != NULL): ?>
                                <img class="img-responsive avatar-view" src="<?=base_url()?>assets/upload/images/<?=$ad->ImageAsset;?>" style="height: 50px; text-align:center; display: block; height:100px">
                              <?php else: ?>
                                <?php echo "-"; ?>
                              <?php endif ?>
                          </td>
                          <td>
                            <a href="<?php echo base_url() ?>Asset/detail_asset?us=<?php echo $ad->ID_Asset; ?>" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i> Detail </a>
                            <a href="<?php echo base_url() ?>Asset/cetak?us=<?php echo $ad->ID_Asset; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-qrcode"></i> QrCode </a>
                            <a href="<?php echo base_url() ?>Asset/get?us=<?php echo $ad->ID_Asset; ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-info-<?php echo $ad->ID_Asset;?>"><i class="fa fa-trash-o"></i> Delete </button>                                                      
                          </td>
                        </tr>

                        <!-- modal delete -->
                        <div class="modal fade" id="hapus-info-<?php echo $ad->ID_Asset;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content edit-dialog-modal">
                              <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>Asset/hapus" method="post">    
                                <?php
                                  $this->load->helper("form");
                                ?>
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Hapus Data Asset</h4>                                  
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="id" value="<?php echo $ad->ID_Asset;?>">
                                  Apakah anda benar mau menghapus data "<?php echo $ad->NamaAsset;?>" ini?
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                  <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                                </div>
                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- end modal delete-->
                        
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
        <!-- /page content -->

        
<section class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-3">

           <!-- Profile Siswa -->
           <div class="card card-primary card-outline">
             <div class="card-body box-profile">
               <div class="text-center">
                 <img class="profile-user-img img-fluid img-circle"
                      src=" <?php echo base_url('assets/foto/murid.png') ?> "
                      alt="User profile picture">
               </div>

               <h3 class="profile-username text-center"><?php echo $nama->nama_siswa ?></h3>

               <p class="text-muted text-center"><?php echo $nama->nis; ?></p>

               <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                   <b>Jenis Kelamin</b> <a class="float-right"><?php if ($nama->jk='l') {
                     echo 'Laki-Laki';} else {echo 'Perempuan';} ?></a>
                 </li>
                 <li class="list-group-item">
                   <b>Kelas</b> <a class="float-right"><?php echo $nama->tingkat.' '.$nama->nama_kelas ?></a>
                 </li>
                 <li class="list-group-item">
                   <b>No Virtual</b> <a class="float-right"><?php echo $nama->id_virtual ?></a>
                 </li>
                 <li class="list-group-item">
                   <b> Saldo</b> <a class="float-right"><?php echo $nama->nominal ?></a>
                 </li>
                 <li class="list-group-item">
                   <b>Tagihan</b> <a class="float-right">
                     <?php echo "Rp ".number_format($totTagihan->total,"0",".",".")  ?>
                   </a>
                 </li>
               </ul>

               <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
             </div>
             <!-- /.card-body -->
           </div>
         </div>
         <!--tagihan dan pembayaran-->
         <div class="col-md-9">
           <!--tagihan siswa header-->
           <form role="form" action="<?php echo $action; ?>" method="post" >
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pengajuan Keringanan</h3>
              </div>
              <?php foreach ($data_tagihan->result() as $row) {?>
                <div class="card-body">
                  <div class="form-group row">

                          <div class="col-md-7 ">
                              <input id="nominal" class="form-control col-md-7" name="id_tagihan_siswa" type="number" value="<?php echo $row->id_tagihan_siswa_kelas ?>" hidden>
                          </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3 ">Jenis Tagihahan <?php echo form_error('kelas') ?></label>
                          <div class="col-md-7">
                              <input id="nominal" class="form-control col-md-7 col-xs-12" name="nominal" type="text" value="<?php echo $row->jn_tagihan ?>" disabled>
                          </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3 ">Bulan <?php echo form_error('kelas') ?></label>
                          <div class="col-md-7">
                              <input id="nominal" class="form-control col-md-7 col-xs-12" name="nominal" type="text" value="<?php
                                $bulan = array('1'=>'Januari','Februari','Maret' ,'April' ,'Mei','Juni','Juli','Agustus', 'September','Oktober','November','Desember');

                                foreach ($bulan as $index => $nama_bulan) {
                                  if ($row->bulan==$index) {
                                        echo $nama_bulan ;
                                  }
                                }
                                ?>
                              " disabled>
                          </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3 ">Tagihan Awal <?php echo form_error('kelas') ?></label>
                          <div class="col-md-7">
                              <input id="nominal" class="form-control col-md-7 col-xs-12" name="nominal" type="text" value="<?php echo 'Rp. '.$row->nominal_tagihan ?>"disabled>
                          </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3 ">Tagihan Akhir<?php echo form_error('tagihan_akhir') ?></label>
                          <div class="col-md-7">
                              <input id="nominal" class="form-control col-md-7 col-xs-12" name="tagihan_akhir" type="number" value="" required>
                          </div>
                  </div>
                  <div class="form-group">
                      <div class="col-md-6 offset-3">
                        <button id="send" type="submit" class="btn btn-success">Ajukan</button>
                      </div>
                  </div>
                </div>
              <?php } ?>
              <!-- isi tagihan -->

            </div>
          </form>
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>

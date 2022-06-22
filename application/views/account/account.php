    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          <small>advanced tables</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php $this->view('alert');?>
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Account</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <?php if ($this->session->userdata('role') == 'admin') { ?>
            <a href="<?php echo site_url('Account/add') ?>" class="btn btn-success" style="padding:2px 5px 2px 5px"><i class="fa fa-plus"></i> Add Account</a>
                <?php } ?>
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
              
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <?php
                      $level = $this->session->userdata('role');
                            if ($level == "admin") {                            
                        ?>
                    <th>Aksi</th>
                    <?php }?>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach ($account as $data) { ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td> <?php echo $data['name'] ?> </td>
                      <td> <?php echo $data['role'] ?> </td>
                      <?php
                          $level = $this->session->userdata('role');
                                if ($level == "admin") {                            
                            ?>
                            <td nowrap><a href="<?php echo site_url('Account/add/'.$data['username']) ?>" class="btn btn-success btn-sm position-sticky"><i class="fa fa-edit"></i>Edit</a>
                            <a  onclick="return konfirmasi('<?php echo $data['username'];?>')" href="<?php echo site_url('Account/delete/'.$data['username']) ?>" class="btn btn-danger btn-sm position-sticky"><i class="fa fa-trash"></i>Delete</a>
                            </td>
                      <?php } ?>
                    </tr>
                  <?php 
                    $no++;
                    } ?>
                
               
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <?php
                      $level = $this->session->userdata('role');
                            if ($level == "admin") {                            
                        ?>
                    <th>Aksi</th>
                    <?php }?>

                  </tr>
                </tfoot>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <script type="text/javascript" language="JavaScript">
     function konfirmasi(id){
    tanya = confirm("Apakah anda yakin untuk menghapus id "+id+" ?");
    if (tanya == true) 
      return true;
    else return false;
    }
    </script>
    <!-- /.content -->

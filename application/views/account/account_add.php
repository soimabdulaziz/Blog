    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>advanced tables</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Provider</h3>
            <div class="pull-right">
              <a href ="<?=site_url('Account') ?>" class="btn btn-warning btn-flat">
                  <i class="fa fa-undo"></i> Back
              </a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <div class="col-md-4 col-md-offset-4">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('Account/add/'.$this->uri->segment(3).'') ?>
                      <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                          <label>Username*</label>
                          <input type ="text" value = "<?php echo @$d['username'] ?>" name="username" id="username" class="form-control" require>
                          <?=form_error('username')?>

                      </div>
                      <div class="form-group <?=form_error('name') ? 'has-error' : null ?>">
                          <label>Name*</label>
                          <input type ="text" value = "<?php echo @$d['name'] ?>" name="name" id="name" class="form-control" require>
                          <?=form_error('name')?>

                      </div>
                      <div class =" form-group <?=form_error('role') ? 'has-error' : null?> ">
                          <label>Role * </label>
                          <select name = " role" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="admin" <?=@$d['role'] == 'admin' ? "selected" : null?>>Admin</option>
                            <option value="author" <?=@$d['role'] == 'author' ? "selected" : null?>>Author</option>
                          </select>  
                          <span class="help-block"> <?=form_error('role')?> </span> 
                    </div>
                      <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                          <label>Password*</label>
                          <input type ="password" value = "<?php echo @$d['password'] ?>" name="password" id="password" class="form-control" require>
                        <?=form_error('password')?>

                      </div>
                      <div class="form-group">
                        <button type= "submit" class="btn btn-success">
                          <i class="fa fa-paper-plane"></i>Save
                          </button>
                        <button type= "reset" class="btn btn-danger">Reset</button>

                      </div>
                    </form>
                  </div>
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
    <!-- /.content -->

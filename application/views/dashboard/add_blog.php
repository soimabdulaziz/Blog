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
              <h3 class="box-title">Tambah Data Tower</h3>
            <div class="pull-right">
              <a href ="<?=site_url('Dashboard') ?>" class="btn btn-warning btn-flat">
                  <i class="fa fa-undo"></i> Back
              </a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <div class="col-md-4 col-md-offset-4">
                    <?php// echo validation_errors(); ?>
                    <form action="" method="post">
                      <div class="form-group <?=form_error('title') ? 'has-error' : null ?> ">
                          <label>Title*</label>
                          <input type ="text" name="title" value= "<?php echo @$d['title'] ?>"id="title" class="form-control" require>
                        <span class="help-block"><?=form_error('title')?></span>
                      </div>
                      <div class="form-group <?=form_error('content') ? 'has-error' : null ?>">
                          <label>Content*</label>
                          <textarea name="content" id="content" rows="10" cols="50" class="form-control"><?php echo @$d['content'] ?></textarea>
                          <?=form_error('content')?>
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

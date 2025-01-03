<?php include("header.php") ?>
<div class="page-header">
  <h1 class="page-title">Schema</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
    <li class="breadcrumb-item active">Schema</li>
  </ol>
  <div class="page-header-actions">
    <?php if($role == "user"){ ?>
    <a href="<?= base_url()?>schema/add/"><button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect waves-classic">
      <i class="icon md-plus" aria-hidden="true"></i> &nbsp; Add New Schema&nbsp;&nbsp; 
    </button></a>
    <?php } ?>
  </div>
</div>

<div class="page-content">
  <div class="row row-lg">
    <div class="col-md-12">
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">List of Master Schema</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Schema Code</th>
                <th>Purpose</th>
                <th>Detail</th>
                <th>Date Add</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Schema Code</th>
                <th>Purpose</th>
                <th>Detail</th>
                <th>Date Add</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
              if(!empty($data))
              foreach($data as $d){ ?>
              <tr>
                <td><?= $d->name?></td>
                <td><?= $d->schema_code?></td>
                <td><?= $d->information->purpose; ?></td>
                <td><?= $d->information->detail; ?></td>
                <td><?= date("Y-m-d H:i:s", (int)($d->date_add->{'$date'}/1000)); ?></td>
                <td class="actions">
                  <a href="<?= base_url()?>schema/data/<?= $d->schema_code; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"
                    data-toggle="tooltip" data-original-title="Show Data"><i class="icon md-grid" aria-hidden="true"></i></a>
                  <?php if($role == "user"){ ?>
                  <a href="<?= base_url()?>schema/edit/<?= $d->schema_code; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"
                    data-toggle="tooltip" data-original-title="Edit"><i class="icon md-edit" aria-hidden="true"></i></a>
                  <a href="<?= base_url()?>schema/delete/<?= $d->id; ?>" class="btn btn-sm btn-icon btn-pure btn-default btn-leave on-default remove-row"
                    data-toggle="tooltip" data-original-title="Remove"><i class="icon md-delete" aria-hidden="true"></i></a>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript">  
  $( document ).ready(function() {
    // Override global options
    toastr.options = {
      positionClass: 'toast-top-center'
    };
    <?php if($success){ ?>
      toastr.success('<?= $success; ?>', 'Success', {timeOut: 3000})
    <?php }  
    if($error){ ?>
        toastr.error('<?= $error; ?>', 'Failed', {timeOut: 3000});
    <?php } ?>
      
    $(".btn-leave").click(function(e){
      e.preventDefault();
      link = $(this).attr('href');
      alertify.confirm('Do you continue to delete this schema?', 
        function(){ 
          location.replace(link);
        },function(){ 
          
        });
    });
  });
</script>
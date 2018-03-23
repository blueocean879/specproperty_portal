<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-home"></i> Project Management
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?= $project->project_name; ?> Project Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="#" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">                                
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>
                                                    <i class="fa fa-cog"></i>
                                                    <span>&nbsp;Special Offers</span>
                                                </h4>
                                                <a href="#" class="minimize" style="display: none;">Minimize</a>
                                            </div>
                                            <div class="panel-body">
                                                <a href="<?php echo base_url(); ?>project/managespecialoffers/<?= $project_id; ?>">
                                                    <button type="button" class="btn btn-primary">Special Offers</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">                                
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>
                                                    <i class="fa fa-image"></i>
                                                    <span>&nbsp;Demographics</span>
                                                </h4>
                                                <a href="#" class="minimize" style="display: none;">Minimize</a>
                                            </div>
                                            <div class="panel-body">
                                                <a href="<?php echo base_url(); ?>project/managedemographics/<?= $project_id; ?>">
                                                    <button type="button" class="btn btn-primary">Demographics Images</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">                                
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>
                                                    <i class="fa fa-comments"></i>
                                                    <span>&nbsp;Messages</span>
                                                </h4>
                                                <a href="#" class="minimize" style="display: none;">Minimize</a>
                                            </div>
                                            <div class="panel-body">
                                                <a href="<?php echo base_url(); ?>project/managespecialoffers/<?= $project_id; ?>">
                                                    <button type="button" class="btn btn-primary">Messages</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">                                
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>
                                                    <i class="fa fa-usd" aria-hidden="true"></i>
                                                    <span>&nbsp;Pricelist</span>
                                                </h4>
                                                <a href="#" class="minimize" style="display: none;">Minimize</a>
                                            </div>
                                            <div class="panel-body">
                                                <a href="<?php echo base_url(); ?>project/managespecialoffers/<?= $project_id; ?>">
                                                    <button type="button" class="btn btn-primary">Price Lists</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">                                
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>
                                                    <i class="fa fa-envelope-square"></i>
                                                    <span>&nbsp;Bulk Mail Brochures</span>
                                                </h4>
                                                <a href="#" class="minimize" style="display: none;">Minimize</a>
                                            </div>
                                            <div class="panel-body">
                                                <a href="<?php echo base_url(); ?>project/managespecialoffers/<?= $project_id; ?>">
                                                    <button type="button" class="btn btn-primary">Bulk Mails</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
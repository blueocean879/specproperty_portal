<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-image"></i> Demographics Images
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>project/addspecialoffer/<?= $project_id; ?>"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body table-responsive">
                  <table id="tbl_specialoffers" class="display table table-hover" data-page-length='5'>
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Description</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th class="text-center">Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            if(!empty($special_offers))
                            {
                                foreach($special_offers as $key => $record)
                                {
                            ?>
                            <tr>
                              <td><?php echo ++$key; ?></td>
                              <td><?php echo $record->offer_content ?></td>
                              <td><?php echo $record->start_date ?></td>
                              <td><?php echo $record->end_date ?></td>
                              <td class="text-center">
                                  <a class="btn btn-sm btn-info" href="" title="Edit"><i class="fa fa-pencil"></i></a>
                                  <a href="<?php echo base_url().'specialoffer/deletespecialoffer/'.$record->id.'/'.$project_id; ?>" title="Delete">
                                    <button type="button" class="btn btn-sm btn-danger" onclick="if(!confirm('Are you sure you want to delete this special offer?')){return false;}"><i class="fa fa-trash"></i></button>
                                  </a>
                              </td>
                            </tr>
                            <?php
                                }
                            }
                          ?>
                      </tbody>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php //echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<!--<script type="text/javascript" src="<?php //echo base_url(); ?>assets/js/common.js" charset="utf-8"></script> -->
<script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery('#tbl_specialoffers').DataTable();
    });
</script>

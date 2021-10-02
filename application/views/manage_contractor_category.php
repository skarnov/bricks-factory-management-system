<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/add_contractor_category" class="btn btn-info">Add Contractor Category</a>
                <a href="<?php echo base_url(); ?>bricks/manage_contractor_category" class="btn btn-success">Manage Contractor Category</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contractor Category Manager <small>Contractor Category Management</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h3 style="color:green">
                        <?php
                        $msg = $this->session->userdata('edit_contractor_category');
                        if (isset($msg)) {
                            echo $msg;
                            $this->session->unset_userdata('edit_contractor_category');
                        }
                        ?>
                    </h3>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_contractor_category as $v_contractor_category) {
                                ?>
                                <tr>
                                    <td><?php echo $v_contractor_category->contractor_category_name; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>bricks/edit_contractor_category/<?php echo $v_contractor_category->contractor_category_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Contractor Category"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>bricks/delete_contractor_category/<?php echo $v_contractor_category->contractor_category_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Contractor Category" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>          
    </div>
</div>
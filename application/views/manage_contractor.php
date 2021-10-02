<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/add_contractor" class="btn btn-info">Add Contractor</a>
                <a href="<?php echo base_url(); ?>bricks/manage_contractor" class="btn btn-success">Manage Contractor</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contractor Manager <small>Contractor Management</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h3 style="color:green">
                        <?php
                        $msg = $this->session->userdata('edit_contractor');
                        if (isset($msg)) {
                            echo $msg;
                            $this->session->unset_userdata('edit_contractor');
                        }
                        ?>
                    </h3>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Name</th>
                                <th style="color:red;">Due</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Number of Labor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_contractor as $v_contractor) {
                                ?>
                                <tr>
                                    <td><?php echo $v_contractor->contractor_category_name; ?></td>
                                    <td><?php echo $v_contractor->contractor_name; ?></td>
                                    <td style="color:red;"><?php echo $v_contractor->due_amount; ?></td>
                                    <td><?php echo $v_contractor->contractor_address; ?></td>
                                    <td><?php echo $v_contractor->contractor_mobile; ?></td>
                                    <td><?php echo $v_contractor->number_of_labor; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>bricks/all_contractor_transaction/<?php echo $v_contractor->contractor_id; ?>" class="btn btn-warning" data-toggle="tooltip" title="View This Contractor Transaction"><i class="fa fa-calculator"></i> Transactions</a>
                                        <a href="<?php echo base_url(); ?>bricks/edit_contractor/<?php echo $v_contractor->contractor_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Contractor"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>bricks/delete_contractor/<?php echo $v_contractor->contractor_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Contractor" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
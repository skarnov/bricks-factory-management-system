<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/add_employee" class="btn btn-info">Add Employee</a>
                <a href="<?php echo base_url(); ?>bricks/manage_employee" class="btn btn-success">Manage Employee</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Employee Manager <small>Employee Management</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h3 style="color:green">
                        <?php
                        $msg = $this->session->userdata('edit_employee');
                        if (isset($msg)) {
                            echo $msg;
                            $this->session->unset_userdata('edit_employee');
                        }
                        ?>
                    </h3>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Job Type</th>
                                <th>Name</th>
                                <th>Salary</th>
                                <th>Salary Due</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>NID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_employee as $v_employee) {
                                ?>
                                <tr>
                                    <td>
                                        <span style="color: red;">
                                            <?php
                                            if ($v_employee->employee_type == '1') {
                                                echo 'Contractual';
                                            }
                                            ?>
                                        </span>
                                        <span style="color: royalblue;">
                                            <?php
                                            if ($v_employee->employee_type == '2') {
                                                echo 'Permanent';
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td><?php echo $v_employee->employee_name; ?></td>
                                    <td><?php echo $v_employee->employee_salary; ?></td>
                                    <td><?php echo $v_employee->due_amount; ?></td>
                                    <td><?php echo $v_employee->employee_address; ?></td>
                                    <td><?php echo $v_employee->employee_mobile; ?></td>
                                    <td><?php echo $v_employee->employee_nid; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>bricks/all_employee_transaction/<?php echo $v_employee->employee_id; ?>" class="btn btn-warning" data-toggle="tooltip" title="View All Salary History"><i class="fa fa-calculator"></i> Salary History</a>
                                        <a href="<?php echo base_url(); ?>bricks/edit_employee/<?php echo $v_employee->employee_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Employee"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>bricks/delete_employee/<?php echo $v_employee->employee_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Employee" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
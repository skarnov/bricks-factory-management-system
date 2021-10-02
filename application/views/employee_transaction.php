<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/add_salary" class="btn btn-info">New Salary</a>
                <a href="<?php echo base_url(); ?>bricks/manage_salary" class="btn btn-success">Manage Salary</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Salary Manager <small>Salary Management</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Net</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Previous Due</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($transaction_info as $v_salary) {
                                ?>
                                <tr>
                                    <td># <?php echo $v_salary->salary_id; ?></td>
                                    <td><?php echo $v_salary->net_amount; ?></td>
                                    <td><?php echo $v_salary->paid_amount; ?></td>
                                    <td><?php echo $v_salary->total_due_amount; ?></td>
                                    <td><?php echo $v_salary->previous_due; ?></td>
                                    <td><?php echo $v_salary->salary_time; ?></td>
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
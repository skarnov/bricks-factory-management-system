<div style="display:none;">
    <script type="text/javascript">
        function PrintDiv()
        {
            var divToPrint = document.getElementById('divToPrint');
            var popupWin = window.open('', '_blank', 'width=250,height=560');
            popupWin.document.open();
            popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
        }
        function PrintGate()
        {
            var divToGate = document.getElementById('divToGate');
            var popupWin = window.open('', '_blank', 'width=250,height=560');
            popupWin.document.open();
            popupWin.document.write('<html><body onload="window.print()">' + divToGate.innerHTML + '</html>');
            popupWin.document.close();
        }
    </script>
    <div id="divToPrint" >
        <div style="width: 250px; height: 800px; font-size: 10px; margin-left: 2px; font-weight: bold;">
            <div style="text-align: center;"><h3><b>Messrs Onik Bricks</b></h3></div>
            <table>
                <thead>
                    <tr>
                        <td class="text-center" style="font-size: 10px;"><b>Invoice No:</b> # <?php echo $sale_detail->ref_no; ?><br/> Mobile: 01718 - 316677, <br/> 01718 - 245258</td>
                        <td class="text-center" style="font-size: 10px;">Time: <?php echo $sale_detail->time; ?><br/>Proprietor: Md Kawsar-ul-Gani <br/>Pirer Bazar, Cunarughat, Habijang</td>
                    </tr>
                </thead>
            </table>
            <table>
                <thead>
                    <tr>
                        <td class="text-center" style="font-size: 10px;">Customer Name:</b> <?php echo $sale_detail->customer_name; ?></td>
                    </tr>
                </thead>
            </table>
            <table>
                <thead>
                    <tr>
                        <td class="text-center" style="font-size: 10px;">Customer Address:</b> <?php echo $sale_detail->customer_address; ?></td>
                    </tr>
                </thead>
            </table>
            <table style="width: 100%; font-size: 10px;">
                <thead>
                    <tr>
                        <td style="border: 1px solid black; text-align: center;">Name & Price</td>
                        <td style="border: 1px solid black; text-align: center;">Quantity</td>
                        <td style="border: 1px solid black; text-align: center;">Net</td>
                        <td style="border: 1px solid black; text-align: center;">Total</td>
                        <td style="border: 1px solid black; text-align: center;">Discount</td>
                        <td style="border: 1px solid black; text-align: center;">Paid</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid black; text-align: center;"><?php echo $sale_detail->bricks_name; ?></td>
                        <td style="border: 1px solid black; text-align: center;"><?php echo $sale_detail->quantity; ?></td>
                        <td style="border: 1px solid black; text-align: center;"><?php echo $sale_detail->net_price; ?></td>
                        <td style="border: 1px solid black; text-align: center;"><?php echo $sale_detail->net_price + $sale_detail->discount; ?></td>
                        <td style="border: 1px solid black; text-align: center;"><?php echo $sale_detail->discount; ?></td>
                        <td style="border: 1px solid black; text-align: center;"><?php echo $sale_detail->paid; ?></td>
                    </tr>
                </tbody>
            </table>
            <?php
            if ($sale_detail->due != 0.00) {
                ?>
                <p><b>Total Due:</b> <?php echo $sale_detail->due; ?></p>
                <?php
            }
            ?>
            <?php
            if ($sale_detail->note != NULL) {
                ?>
                <p><b>Note:</b> <?php echo $sale_detail->note; ?></p>
                <?php
            }
            ?>
            <table style="width: 100%; font-size: 10px;">
                <thead>
                    <tr>
                        <td>Customer Signature</td>
                        <td>Manger Signature</td>
                    </tr>
                </thead>
            </table>
            <hr/>
            <table style="width: 100%; font-size: 10px; text-align: center;">
                <thead>
                    <tr>
                        <td>Thanks! Please Come Again</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="divToGate" >
        <div style="width: 250px; height: 800px; font-size: 10px; margin-left: 2px; font-weight: bold;">
            <div style="text-align: center;"><h3><b>Gate Pass</b></h3></div>
            <table>
                <thead>
                    <tr>
                        <td class="text-center" style="font-size: 10px;"><b>Invoice No:</b> # <?php echo $sale_detail->ref_no; ?><br/> Mobile: 01718 - 316677, <br/> 01718 - 245258</td>
                        <td class="text-center" style="font-size: 10px;">Time: <?php echo $sale_detail->time; ?><br/>Proprietor: Md Kawsar-ul-Gani <br/>Pirer Bazar, Cunarughat, Habijang</td>
                    </tr>
                </thead>
            </table>
            <table>
                <thead>
                    <tr>
                        <td class="text-center" style="font-size: 10px;">Customer Name:</b> <?php echo $sale_detail->customer_name; ?></td>
                    </tr>
                </thead>
            </table>
            <table>
                <thead>
                    <tr>
                        <td class="text-center" style="font-size: 10px;">Customer Address:</b> <?php echo $sale_detail->customer_address; ?></td>
                    </tr>
                </thead>
            </table>
            <table style="width: 100%; font-size: 10px;">
                <thead>
                    <tr>
                        <td style="border: 1px solid black; text-align: center;">Bricks Name</td>
                        <td style="border: 1px solid black; text-align: center;">Quantity</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid black; text-align: center;"><?php echo $sale_detail->bricks_name; ?></td>
                        <td style="border: 1px solid black; text-align: center;"><?php echo $sale_detail->quantity; ?></td>
                    </tr>
                </tbody>
            </table>
            <br/>
            <table>
                <thead>
                    <tr>
                        <td class="text-center" style="font-size: 10px;">Vehicle No:</b> <?php echo $sale_detail->vehicle_no; ?></td>
                    </tr>
                </thead>
            </table>
            <br/>
            <table style="width: 100%; font-size: 10px;">
                <thead>
                    <tr>
                        <td>Customer Signature</td>
                        <td>Manger Signature</td>
                    </tr>
                </thead>
            </table>
            <hr/>
            <table style="width: 100%; font-size: 10px; text-align: center;">
                <thead>
                    <tr>
                        <td>Thanks! Please Come Again</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>bricks/manage_sale" class="btn btn-success">Manage Sales</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sale Manager <small>Sale Management</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-6">
                        <hr/>
                        <div class="text-center"><h3><b>Messrs Onik Bricks</b></h3></div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><b>Invoice No:</b> # <?php echo $sale_detail->ref_no; ?></p>
                                <p>Mobile: 01718 - 316677, <br/> 01718 - 245258</p>
                            </div>
                            <div class="col-md-6">
                                <p>Time: <?php echo $sale_detail->time; ?></p>
                                <p>Proprietor: Md Kawsar-ul-Gani <br/>Pirer Bazar, Cunarughat, Habijang</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <b>Customer Name:</b> <?php echo $sale_detail->customer_name; ?> <br/>     
                                <b>Customer Address:</b> <?php echo $sale_detail->customer_address; ?>     
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-bordered text-center" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name & Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Net Price</th>
                                            <th class="text-center">Discount</th>
                                            <th class="text-center">Total Price</th>
                                            <th class="text-center">Paid Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $sale_detail->bricks_name; ?></td>
                                            <td><?php echo $sale_detail->quantity; ?></td>
                                            <td><?php echo $sale_detail->net_price; ?></td>
                                            <td><?php echo $sale_detail->discount; ?></td>
                                            <td><?php echo $sale_detail->net_price + $sale_detail->discount; ?></td>
                                            <td><?php echo $sale_detail->paid; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                                if ($sale_detail->due != 0.00) {
                                    ?>
                                    <br/>
                                    <p style="color:red;">Total Due: <?php echo $sale_detail->due; ?></p>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($sale_detail->note != NULL) {
                                    ?>
                                    <br/>
                                    <p style="color:red;">Note: <?php echo $sale_detail->note; ?></p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <hr/>
                                <b>Customer Signature</b>
                            </div>
                            <div class="col-md-4 text-center">
                                <br/>
                                <p>Thanks!<br/> Please Come Again</p>
                            </div>

                            <div class="col-md-4">
                                <hr/>
                                <b>Manger Signature</b>
                            </div>
                        </div>
                        <hr/>
                        <a href="" onclick="PrintDiv();" class="btn btn-danger" data-toggle="tooltip" title="Print Invoice"><i class="fa fa-calculator"></i> Print Invoice</a>
                    </div>
                    <div class="col-md-6">
                        <hr/>
                        <div class="text-center"><h3><strong>Gate Pass</strong></h3></div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><b>Invoice No:</b> # <?php echo $sale_detail->ref_no; ?></p>
                                <p>Mobile: 01718 - 316677, <br/> 01718 - 245258</p>
                            </div>
                            <div class="col-md-6">
                                <p>Time: <?php echo $sale_detail->time; ?></p>
                                <p>Proprietor: Md Kawsar-ul-Gani <br/>Pirer Bazar, Cunarughat, Habijang</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <b>Customer Name:</b> <?php echo $sale_detail->customer_name; ?><br/>     
                                <b>Customer Address:</b> <?php echo $sale_detail->customer_address; ?>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-bordered text-center" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Bricks Name</th>
                                            <th class="text-center">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $sale_detail->bricks_name; ?></td>
                                            <td><?php echo $sale_detail->quantity; ?></td>
                                        </tr>
                                    </tbody>
                                </table>  
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">  
                                <b>Vehicle No:</b> <?php echo $sale_detail->vehicle_no; ?>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-4">
                                <hr/>
                                <b>Customer Signature</b>
                            </div>
                            <div class="col-md-4 text-center">
                                <br/>
                                <p>Drive Safe</p>
                            </div>

                            <div class="col-md-4">
                                <hr/>
                                <b>Manger Signature</b>
                            </div>
                        </div>
                        <hr/>
                        <a href="" onclick="PrintGate();" class="btn btn-danger" data-toggle="tooltip" title="Gate Pass"><i class="fa fa-calculator"></i> Print Gate Pass</a>
                    </div>
                </div>
            </div>
        </div>
    </div>          
</div>
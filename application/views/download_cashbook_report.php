<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                height: 842px;
                width: 595px;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>

    <body>
        <div>
            <center>
                <h3 style="margin:0; text-align: center">Total Cashbook Report</h3>
                <p style="margin:0; text-align: center">Total Cashbook : <b><?php echo $total_cashbook->total; ?></b></p>
                <br/>
                <br/>
                <table align="center" style="width:595px;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black; width: 10%;">Transaction ID</th>
                            <th style="border:1px solid black;">Description</th>
                            <th style="border:1px solid black;">Transaction Time</th>
                            <th style="border:1px solid black;">Cashbook</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cashbook_report_info as $v_cashbook) {
                            ?>
                            <tr>
                                <td style="border:1px solid black; width: 10%;"># <?php echo $v_cashbook->cashbook_id; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_cashbook->cashbook_description; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_cashbook->transaction_time; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_cashbook->cashbook_cashbook; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </center>
        </div>       
    </body>
</html>
<div class="row">
    <div class="col-sm-12">
        <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?admin/income_statement_report" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-sm-5">
                    <div class = "col-sm-3">
                        <label for="" class="control-label pull-right">From:</label>
                    </div>
                    <div class = "col-sm-9">
                        <input name="from" type="text" class="form-control datepicker" value="<?php echo $from; ?>"></input>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class = "col-sm-3">
                        <label for="" class="control-label pull-right">to:</label>
                    </div>
                    <div class = "col-sm-9">
                        <input name="to" type="text" class="form-control datepicker" value="<?php echo $to; ?>"></input>
                    </div>
                </div>
                <div class="col-sm-2">
                    <input type="submit" value="View Income Statement" class="form-control btn btn-primary"></input>
                </div>
            </div>
        </form>
    </div>
   
    <div style="clear:both;"></div>
    <br>
    <div class="col-sm-12">
        <table class="table table-bordered table-striped datatable" id="table-2">
           
            <thead>
                <tr>
                    <th><?php echo get_phrase('Item');?></th>
                    <th><?php echo get_phrase('Kshs');?></th>
                    <th><?php echo get_phrase('Kshs');?></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($income_state_list as $item){ ?> 
                    <tr>
                        <td><?php echo $item['item'];?></td>
                        <td><?php echo $item['kshs1'];?></td>
                        <td><?php echo $item['kshs2'];?></td>
                    </tr>
                <?php } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th><?php echo get_phrase('Net Income');?></th>
                    <th><?php echo $total1;?></th>
                    <th><?php echo $total2;?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script type="text/javascript">
    jQuery(window).load(function ()
    {
        var $ = jQuery;

        $("#table-2").dataTable({
            "bPaginate": false,
            "bSort":false,
            buttons: [
                {
                    extend: 'pdfFlash',
                    message: 'PDF created by Buttons for DataTables.'
                }
            ],
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });

        // Highlighted rows
        $("#table-2 tbody input[type=checkbox]").each(function (i, el)
        {
            var $this = $(el),
                    $p = $this.closest('tr');

            $(el).on('change', function ()
            {
                var is_checked = $this.is(':checked');

                $p[is_checked ? 'addClass' : 'removeClass']('highlight');
            });
        });

        // Replace Checboxes
        $(".pagination a").click(function (ev)
        {
            replaceCheckboxes();
        });
    });
</script>
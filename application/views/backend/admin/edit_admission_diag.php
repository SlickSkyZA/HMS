<?php
    $patient_id = $param2;
    $diag_id=$param3;
    $row = $this->db->get_where("inpatient_admission_diag",array("diag_id"=>$diag_id))->result_array()[0];
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('add_admission_diagnosis'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?admin/inpatients/update/<?php echo $row['diag_id']; ?>/admission/diag" method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('diagnosis'); ?></label>

                        <div class="col-sm-9">
                            <textarea required name="diag_note" class="form-control" id="field-ta"><?php echo $row['diag_note']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>

                        <div class="col-sm-9">
                            <input required type="date" name="date" class="form-control datepicker" id="field-1" value="<?php echo $row['date']; ?>" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('type'); ?></label>

                        <div class="col-sm-9">
                            <input type="radio" name="type" value ="0" <?php if($row['type']==0) echo 'checked' ; ?>><?php echo get_phrase('admitted'); ?></input>
                            <input type="radio" name="type" value ="1"  <?php if($row['type']==1) echo 'checked' ; ?> style="margin-left:10px"><?php echo get_phrase('discharged'); ?></input>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('remark_on_discharge'); ?></label>

                        <div class="col-sm-9">
                            <textarea name="remark_note" class="form-control" id="field-ta" ><?php echo $row['remark_on_discharge']; ?></textarea>
                        </div>
                    </div>

                    <div class="col-sm-3 control-label col-sm-offset-1">
                        <input type="submit" class="btn btn-success" value="Submit"/>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>
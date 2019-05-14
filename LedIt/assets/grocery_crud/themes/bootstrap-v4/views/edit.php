<?php
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/bootstrap/bootstrap.min.css');
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/elusive-icons/css/elusive-icons.min.css');
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/common.css');
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/general.css');
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/add-edit-form.css');
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/main.css');

    if ($this->config->environment == 'production') {
        $this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);
        $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/build/js/global-libs.min.js');
        $this->set_js_config($this->default_theme_path.'/bootstrap-v4/js/form/edit.js');
    } else {
        $this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);
        $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/js/jquery-plugins/jquery.form.min.js');
        $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/js/common/common.min.js');
        $this->set_js_config($this->default_theme_path.'/bootstrap-v4/js/form/edit.js');
    }

include(__DIR__ . '/common_javascript_vars.php');
?>
<div class="crud-form" data-unique-hash="<?php echo $unique_hash; ?>">
    <div style="box-shadow: 0px 0px 10px -5px rgba(10,17,35,0.9); border-radius: 20px;" class="gc-container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div style="box-shadow: 0px 0px 10px -5px rgba(10,17,35,0.9); border-top-right-radius: 20px; border-top-left-radius: 20px; background-color: #0a1123;" class="table-label">
                    <div align="center">
                        <?php echo "<h3 style='color:#fff; font-size:30px;'>Actualizar Información</h3>" ;?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div style="border-bottom-right-radius: 20px; border-bottom-left-radius: 20px" class="form-container table-container">
                    <?php echo form_open( $update_url, 'method="post" id="crudForm"  enctype="multipart/form-data"'); ?>

                    <?php foreach($fields as $field) { ?>
                        <div style="color: #0a1123;" class="form-group <?php echo $field->field_name; ?>_form_group row">
                            <label class="col-sm-4 control-label">
                                <?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'> : </span> " : ":"?>
                            </label>
                            <div style="text-decoration-color: #000;" class="col-sm-6 col-xs-12 col-md-6 col-lg-6">
                                <?php echo $input_fields[$field->field_name]->input; ?>
                            </div>
                        </div>
                    <?php }?>

                    <?php if(!empty($hidden_fields)){?>
                        <!-- Start of hidden inputs -->
                        <?php
                        foreach($hidden_fields as $hidden_field){
                            echo $hidden_field->input;
                        }
                        ?>
                        <!-- End of hidden inputs -->
                    <?php } ?>
                    <?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
                    <div class="form-group gcrud-form-group">
                        
                    </div>
                    <hr>
                    <div class="form-group gcrud-form-group">
                        <div class="col-sm-offset-3 col-xs-10 col-lg-10 col-md-10">
                            <button class="btn btn-secondary btn-success b10" type="submit" id="form-button-save">
                                <i><img src="<?=base_url();?>assets/grocery_crud/themes/bootstrap-v4/css/images/success.png"></i>
                                <?php echo $this->l('form_update_changes'); ?>
                            </button>
                            <?php 	if(!$this->unset_back_to_list) { ?>
                                <button class="btn btn-info b10" type="button" id="save-and-go-back-button">
                                    <i><img src="<?=base_url();?>assets/grocery_crud/themes/bootstrap-v4/css/images/first.gif"></i>
                                    <?php echo $this->l('form_update_and_go_back'); ?>
                                </button>
                                <button class="btn btn-danger cancel-button b10" type="button" id="cancel-button">
                                    <i><img src="<?=base_url();?>assets/grocery_crud/themes/bootstrap-v4/css/images/close.png"></i>
                                    <?php echo $this->l('form_cancel'); ?>
                                </button>
                            <?php } ?>
                        </div>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var validation_url = '<?php echo $validation_url?>';
    var list_url = '<?php echo $list_url?>';

    var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
    var message_update_error = "<?php echo $this->l('update_error')?>";
</script>
<?php
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/bootstrap/bootstrap.min.css');
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/elusive-icons/css/elusive-icons.min.css');
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/common.css');
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/list.css');
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/general.css');
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/plugins/animate.min.css');
    $this->set_css($this->default_theme_path.'/bootstrap-v4/css/main.css');

    if ($this->config->environment == 'production') {
        $this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);
        $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/build/js/global-libs.min.js');
    } else {
        $this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);
        $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/js/jquery-plugins/jquery.form.js');
        $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/js/common/cache-library.js');
        $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/js/common/common.js');
    }

    //section libs
    $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/js/jquery-plugins/gc-dropdown.min.js');
    $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/js/jquery-plugins/gc-modal.min.js');
    $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/js/jquery-plugins/bootstrap-growl.min.js');
    $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/js/jquery-plugins/jquery.print-this.js');


    //page js
    $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/js/datagrid/gcrud.datagrid.js');
    $this->set_js_lib($this->default_theme_path.'/bootstrap-v4/js/datagrid/list.js');

    if (!empty($this->upload_fields)) {
        $this->load_js_fancybox();
    }



    $colspans = (count($columns) + 2);

    //Start counting the buttons that we have:
    $buttons_counter = 0;

    if (!$unset_edit) {
        $buttons_counter++;
    }

    if (!$unset_read) {
        $buttons_counter++;
    }

    if (!$unset_delete) {
        $buttons_counter++;
    }

    if (!empty($list[0]) && !empty($list[0]->action_urls)) {
        $buttons_counter = $buttons_counter +  count($list[0]->action_urls);
    }

    //The search column string exists only in version 1.5.6 or higher
    $search_column_string =
        preg_match('/1\.(5\.[6-9]|[6-9]\.[0-9])/', Grocery_CRUD::VERSION)
            ? $this->l('list_search_column') : 'Search {column_name}';

    $hasAlerti18n = preg_match('/1\.(5\.[8-9]|[6-9]\.[0-9])/', Grocery_CRUD::VERSION);

    $alert_multiple_delete = $hasAlerti18n
           ? $this->l('alert_delete_multiple') : 'Are you sure that you want to delete those {items_amount} items?';

    $alert_multiple_delete_one = $hasAlerti18n
            ? $this->l('alert_delete_multiple_one') : 'Are you sure that you want to delete this 1 item?';

    $list_displaying = str_replace(
        array(
            '{start}',
            '{end}',
            '{results}'
        ),
        array(
            '<span class="paging-starts">1</span>',
            '<span class="paging-ends">10</span>',
            '<span class="current-total-results">'. $this->get_total_results() . '</span>'
        ),
        $this->l('list_displaying'));

    include(__DIR__ . '/common_javascript_vars.php');
?>
<script type='text/javascript'>
    var base_url = '<?php echo base_url();?>';

    var subject = '<?php echo $subject?>';
    var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
    var ajax_list_url = '<?php echo $ajax_list_url;?>';
    var unique_hash = '<?php echo $unique_hash; ?>';

    var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";
    var THEME_VERSION = '1.4.4';
</script>
    <br/>
    <div class="container-fluid gc-container">
        <div class="success-message hidden"><?php
        if($success_message !== null){?>
           <?php echo $success_message; ?> &nbsp; &nbsp;
        <?php }
        ?></div>

        <div class="row">
            <div style="box-shadow: 0px 0px 10px -5px rgba(10,17,35,0.9); border-radius: 20px;" class="table-section">
                <div style="box-shadow: 0px 0px 10px -5px rgba(10,17,35,0.9); border-top-right-radius: 20px; border-top-left-radius: 20px; background-color: #0a1123;" class="table-label">
                    <div align="center">
                                <div style="box-shadow: 0px 0px 10px -5px rgba(10,17,35,0.9); border-radius: 20px; border-color: #0a1123;"  class="header-tools">
                            <?php if(!$unset_add){?>
                                <div class="floatL t5">
                                    <a id="a1" class="btn btn-success2 btn-outline-dark" href="<?php echo $add_url?>">
                                        <img src="<?=base_url();?>assets/grocery_crud/themes/bootstrap-v4/css/images/add.png"> &nbsp; <?php echo $this->l('list_add'); ?> <?php echo $subject?>
                                    </a>
                                </div>
                            <?php } ?>


                            <div class="floatR">
                                <?php if(!$unset_export) { ?>
                                    <a id="a2" class="btn btn-warning btn-outline-dark t5 gc-export" data-url="<?php echo $export_url; ?>" href="javascript:;">
                                        <span class="floatL l5">
                                            <img src="<?=base_url();?>assets/grocery_crud/themes/bootstrap-v4/css/images/clone.png">
                                            <?php echo $this->l('list_export');?>
                                        </span>
                                        <div class="clear"></div>
                                    </a>
                                <?php } ?>


                                <a class="btn btn-primary search-button t5" href="javascript:;">
                                    <img src="<?=base_url();?>assets/grocery_crud/themes/bootstrap-v4/css/images/magnifier.png">
                                    <input type="text" name="search" class="search-input" placeholder="Buscar" />
                                </a>
                            </div>



                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div style="border-bottom-right-radius: 20px; border-bottom-left-radius: 20px" class="table-container">
                    <?php echo form_open("", 'method="post" autocomplete="off" id="gcrud-search-form"'); ?>

                        <div class="scroll-if-required">
                            <table class="table table-responsive grocery-crud-table table-hover">
                            <thead>
                             <tr style="border-top: 1px solid ">
                                <th style="text-align: center; color: #0a1123;" colspan="2" <?php if ($buttons_counter === 0) {?>class="hidden"<?php }?>>
                                        <?php echo $this->l('list_actions'); ?>
                                    </th>

                                    <?php foreach($columns as $column){?>
                                        <th style="text-align: center; color: #0a1123;" class="column-with-ordering" data-order-by="<?php echo $column->field_name; ?>"><?php echo $column->display_as; ?></th>
                                    <?php }?>
                                </tr>
                                

                                <tr class="filter-row gc-search-row">
                                    <td class="no-border-right <?php if ($buttons_counter === 0) {?>hidden<?php }?>">
                                        <?php if (!$unset_delete) { ?>

                                             <div class="floatL t5 settings-button-container">
                                                <span>Múltiple</span>
                                                 <input title="Selección múltiple (Eliminar)" type="checkbox" class="select-all-none" />


                                             </div>
                                         <?php } ?>
                                     </td>



                                    <td class="no-border-left ">
                                        <div class="floatL">
                                            <a href="javascript:void(0);" title="<?php echo $this->l('list_delete')?>"
                                               class="hidden btn btn-outline-dark delete-selected-button settings-button-container">
                                                <i class="el el-trash text-danger"></i>
                                                <span style="font-size: 13px;" class="text-danger"><?php echo "Eliminar";?></span>
                                        
                                            </a>
                                        </div>

                                         <!-- Start of: Settings button -->
                                                <div class="btn-group floatR l5 settings-button-container">
                                                    <button title="Borrar filtro de búsqueda" type="button" class="btn btn-default  settings-button gc-bootstrap-dropdown dropdown-toggle">
                                                        <span class="caret"></span>
                                                    </button>

                                                    <div style="border: 1px solid #0a1123 ;" class="dropdown-menu dropdown-menu-right">
                                                        <a style="color:#0a1123 ; font-size: 14px;" href="javascript:void(0)" class="clear-filtering dropdown-item">
                                                            <i class="el el-refresh"></i> Borrar filtro de búsqueda
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- End of: Settings button -->

                                        <div class="clear"></div>
                                        </td>
                                         <?php foreach($columns as $column){?>
                                        <td>
                                            <input  type="text" class="form-control searchable-input floatL settings-button-container" placeholder='<?php echo str_replace('{column_name}', "por"." ".$column->display_as, $search_column_string); ?>'  name="<?php echo $column->field_name; ?>" />
                                        </td>
                                    <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include(__DIR__."/list_tbody.php"); ?>
                            </tbody>
                            </table>
                        </div>
                        <hr>
                            <!-- Table Footer -->
                            <div class="">

                                            <!-- "Show 10/25/50/100 entries" (dropdown per-page) -->
                                            <div class="floatL t20 l5">
                                                <div class="floatL t10">
                                                    <?php list($show_lang_string, $entries_lang_string) = explode('{paging}', $this->l('list_show_entries')); ?>
                                                    <?php echo $show_lang_string; ?>
                                                </div>
                                                <div class="floatL r5 l5">
                                                    <select name="per_page" class="per_page form-control">
                                                        <?php foreach($paging_options as $option){?>
                                                            <option value="<?php echo $option; ?>"
                                                                    <?php if($option == $default_per_page){?>selected="selected"<?php }?>>
                                                                        <?php echo $option; ?>&nbsp;&nbsp;
                                                            </option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="floatL t10">
                                                    <?php echo $entries_lang_string; ?>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <!-- End of "Show 10/25/50/100 entries" (dropdown per-page) -->


                                            <div class="floatR r5">

                                                <!-- Buttons - First,Previous,Next,Last Page -->
                                                <ul class="pagination">
                                                    <li class="disabled paging-first page-item">
                                                        <a href="javascript:;" class="page-link">
                                                            <i class="el el-step-backward"></i>
                                                        </a>
                                                    </li>
                                                    <li class="prev disabled paging-previous page-item">
                                                        <a href="javascript:;" class="page-link">
                                                            <i class="el el-chevron-left"></i>
                                                        </a>
                                                    </li>
                                                    <li class="page-item">
                                                        <span class="page-number-input-container page-link">
                                                            <input type="number" value="1" class="form-control page-number-input" />
                                                        </span>
                                                    </li>
                                                    <li class="next paging-next page-item">
                                                        <a href="#" class="page-link">
                                                            <i class="el el-chevron-right"></i>
                                                        </a>
                                                    </li>
                                                    <li class="paging-last page-item">
                                                        <a href="#" class="page-link">
                                                            <i class="el el-step-forward"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- End of Buttons - First,Previous,Next,Last Page -->

                                                <input type="hidden" name="page_number" class="page-number-hidden" value="1" />

                                              
                                            </div>


                                            <!-- "Displaying 1 to 10 of 116 items" -->
                                            <div class="floatR r10 displaying-paging-items">
                                                <?php echo $list_displaying; ?>
                                                <span class="full-total-container hidden">
                                                    <?php echo str_replace(
                                                                "{total_results}",
                                                                "<span class='full-total'>" . $this->get_total_results() . "</span>",
                                                                $this->l('list_filtered_from'));
                                                    ?>
                                                </span>
                                            </div>
                                            <!-- End of "Displaying 1 to 10 of 116 items" -->

                                            <div class="clear"></div>
                            </div>
                            <!-- End of: Table Footer -->

                    <?php echo form_close(); ?>
                </div>
            </div>

            <!-- Delete confirmation dialog -->
            <div style="margin-top: 12%; margin-left: 5%; border-top-right-radius: 5px; border-top-left-radius: 5px;" class="delete-confirmation modal fade">
                <div class="modal-dialog">
                    <div style="border-top-right-radius: 10px; border-top-left-radius: 10px;"class="modal-content">
                        <div style="background-color: #0a1123;  border-top-right-radius: 6px; border-top-left-radius: 6px;" class="modal-header">
                            <h3 style="color: #fff;" class="modal-title"><?php echo $this->l('list_delete'); ?></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p align="center" style="color: #000; font-size: 17px;"><?php echo $this->l('alert_delete'); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default2" data-dismiss="modal"><i class="el el-danger"></i>&nbsp;<?php echo $this->l('form_cancel'); ?></button>
                           
                            <button type="button" class="btn btn-danger delete-confirmation-button"><i class="el el-trash"></i>&nbsp;<?php echo $this->l('list_delete');?></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Delete confirmation dialog -->

            <!-- Delete Multiple confirmation dialog -->
            <div style="margin-top: 12%; margin-left: 5%;" class="delete-multiple-confirmation modal fade">
                <div class="modal-dialog">
                    <div style="border-top-right-radius: 10px; border-top-left-radius: 10px;" class="modal-content">
                        <div  style="background-color: #0a1123;  border-top-right-radius: 6px; border-top-left-radius: 6px;" class="modal-header">
                            <h3 style="color: #fff;" class="modal-title"><?php echo "Eliminar múltiple"; ?></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p align="center" style="color: #000; font-size: 17px;" class="alert-delete-multiple hidden">
                                <?php echo str_replace('{items_amount}', '<span class="delete-items-amount"></span>', $alert_multiple_delete); ?>
                            </p>
                            <p class="alert-delete-multiple-one hidden">
                                <?php echo $alert_multiple_delete_one; ?>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default2" data-dismiss="modal">
                                <?php echo $this->l('form_cancel'); ?>
                            </button>
                            <button type="button" class="btn btn-danger delete-multiple-confirmation-button"
                                    data-target="<?php echo $delete_multiple_url; ?>"><i class="el el-trash"></i>&nbsp;
                                <?php echo $this->l('list_delete'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Delete Multiple confirmation dialog -->

            </div>
        </div>
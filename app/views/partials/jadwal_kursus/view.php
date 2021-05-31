<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("jadwal_kursus/add");
$can_edit = ACL::is_allowed("jadwal_kursus/edit");
$can_view = ACL::is_allowed("jadwal_kursus/view");
$can_delete = ACL::is_allowed("jadwal_kursus/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Jadwal Kursus</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-user_nama">
                                        <th class="title"> Nama User: </th>
                                        <td class="value"> <?php echo $data['user_nama']; ?></td>
                                    </tr>
                                    <tr  class="td-user_foto">
                                        <th class="title"> Foto User: </th>
                                        <td class="value"><?php Html :: page_img($data['user_foto'],400,400,1); ?></td>
                                    </tr>
                                    <tr  class="td-paket_kursus_nama_paket">
                                        <th class="title"> Nama Paket Kursus: </th>
                                        <td class="value"> <?php echo $data['paket_kursus_nama_paket']; ?></td>
                                    </tr>
                                    <tr  class="td-paket_kursus_pertemuan">
                                        <th class="title"> Pertemuan Kursus: </th>
                                        <td class="value"> <?php echo $data['paket_kursus_pertemuan']; ?></td>
                                    </tr>
                                    <tr  class="td-pertemuan_1">
                                        <th class="title"> Pertemuan 1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['pertemuan_1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pertemuan_1" 
                                                data-title="Enter Pertemuan 1" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pertemuan_1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-act_pertemuan_1">
                                        <th class="title"> Keterangan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $act_pertemuan_1); ?>' 
                                                data-value="<?php echo $data['act_pertemuan_1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="act_pertemuan_1" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['act_pertemuan_1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-pertemuan_2">
                                        <th class="title"> Pertemuan 2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['pertemuan_2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pertemuan_2" 
                                                data-title="Enter Pertemuan 2" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pertemuan_2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-act_pertemuan_2">
                                        <th class="title"> Keterangan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $act_pertemuan_1); ?>' 
                                                data-value="<?php echo $data['act_pertemuan_2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="act_pertemuan_2" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['act_pertemuan_2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-pertemuan_3">
                                        <th class="title"> Pertemuan 3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['pertemuan_3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pertemuan_3" 
                                                data-title="Enter Pertemuan 3" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pertemuan_3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-act_pertemuan_3">
                                        <th class="title"> Keterangan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $act_pertemuan_1); ?>' 
                                                data-value="<?php echo $data['act_pertemuan_3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="act_pertemuan_3" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['act_pertemuan_3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-pertemuan_4">
                                        <th class="title"> Pertemuan 4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['pertemuan_4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pertemuan_4" 
                                                data-title="Enter Pertemuan 4" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pertemuan_4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-act_pertemuan_4">
                                        <th class="title"> Keterangan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $act_pertemuan_1); ?>' 
                                                data-value="<?php echo $data['act_pertemuan_4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="act_pertemuan_4" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['act_pertemuan_4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-pertemuan_5">
                                        <th class="title"> Pertemuan 5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['pertemuan_5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pertemuan_5" 
                                                data-title="Enter Pertemuan 5" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pertemuan_5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-act_pertemuan_5">
                                        <th class="title"> Keterangan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $act_pertemuan_1); ?>' 
                                                data-value="<?php echo $data['act_pertemuan_5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="act_pertemuan_5" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['act_pertemuan_5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-pertemuan_6">
                                        <th class="title"> Pertemuan 6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['pertemuan_6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pertemuan_6" 
                                                data-title="Enter Pertemuan 6" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pertemuan_6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-act_pertemuan_6">
                                        <th class="title"> Keterangan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $act_pertemuan_1); ?>' 
                                                data-value="<?php echo $data['act_pertemuan_6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="act_pertemuan_6" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['act_pertemuan_6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-pertemuan_7">
                                        <th class="title"> Pertemuan 7: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['pertemuan_7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pertemuan_7" 
                                                data-title="Enter Pertemuan 7" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pertemuan_7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-act_pertemuan_7">
                                        <th class="title"> Keterangan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $act_pertemuan_1); ?>' 
                                                data-value="<?php echo $data['act_pertemuan_7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("jadwal_kursus/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="act_pertemuan_7" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['act_pertemuan_7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                            </a>
                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                </a>
                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                    </a>
                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("jadwal_kursus/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("jadwal_kursus/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

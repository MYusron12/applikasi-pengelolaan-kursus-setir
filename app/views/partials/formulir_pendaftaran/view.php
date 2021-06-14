<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("formulir_pendaftaran/add");
$can_edit = ACL::is_allowed("formulir_pendaftaran/edit");
$can_view = ACL::is_allowed("formulir_pendaftaran/view");
$can_delete = ACL::is_allowed("formulir_pendaftaran/delete");
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
                    <h4 class="record-title">View  Formulir Pendaftaran</h4>
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
                                    <tr  class="td-user_foto">
                                        <th class="title"> User Foto: </th>
                                        <td class="value"><?php Html :: page_img($data['user_foto'],50,50,1); ?></td>
                                    </tr>
                                    <tr  class="td-user_nama">
                                        <th class="title"> Nama Akun User: </th>
                                        <td class="value"> <?php echo $data['user_nama']; ?></td>
                                    </tr>
                                    <tr  class="td-nama_lengkap">
                                        <th class="title"> Nama Lengkap: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_lengkap']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("formulir_pendaftaran/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="nama_lengkap" 
                                                data-title="Enter Nama Lengkap" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nama_lengkap']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-user_email">
                                        <th class="title"> User Email: </th>
                                        <td class="value"> <?php echo $data['user_email']; ?></td>
                                    </tr>
                                    <tr  class="td-alamat">
                                        <th class="title"> Alamat: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['alamat']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("formulir_pendaftaran/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="alamat" 
                                                data-title="Enter Alamat" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['alamat']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-pekerjaan">
                                        <th class="title"> Pekerjaan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['pekerjaan']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("formulir_pendaftaran/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pekerjaan" 
                                                data-title="Enter Pekerjaan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pekerjaan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-alasan_mengikuti_kursus">
                                        <th class="title"> Alasan Mengikuti Kursus: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['alasan_mengikuti_kursus']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("formulir_pendaftaran/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="alasan_mengikuti_kursus" 
                                                data-title="Enter Alasan Mengikuti Kursus" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['alasan_mengikuti_kursus']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-umur">
                                        <th class="title"> Umur: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['umur']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("formulir_pendaftaran/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="umur" 
                                                data-title="Enter Umur" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['umur']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-no_telpon">
                                        <th class="title"> No Telpon: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['no_telpon']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("formulir_pendaftaran/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="no_telpon" 
                                                data-title="Enter No Telpon" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['no_telpon']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-paket_kursus_nama_paket">
                                        <th class="title"> Nama Paket Kursus: </th>
                                        <td class="value"> <?php echo $data['paket_kursus_nama_paket']; ?></td>
                                    </tr>
                                    <tr  class="td-paket_kursus_durasi">
                                        <th class="title"> Durasi: </th>
                                        <td class="value"> <?php echo $data['paket_kursus_durasi']; ?></td>
                                    </tr>
                                    <tr  class="td-paket_kursus_pertemuan">
                                        <th class="title"> Pertemuan: </th>
                                        <td class="value"> <?php echo $data['paket_kursus_pertemuan']; ?></td>
                                    </tr>
                                    <tr  class="td-paket_kursus_harga">
                                        <th class="title"> Harga: </th>
                                        <td class="value"> <?php echo $data['paket_kursus_harga']; ?></td>
                                    </tr>
                                    <tr  class="td-harga_pendaftaran">
                                        <th class="title"> Harga Pendaftaran: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['harga_pendaftaran']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("formulir_pendaftaran/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="harga_pendaftaran" 
                                                data-title="Enter Harga Pendaftaran" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['harga_pendaftaran']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-bukti_pembayaran">
                                        <th class="title"> Bukti Pembayaran 50% + Pendaftaran 20000: </th>
                                        <td class="value"><?php Html :: page_img($data['bukti_pembayaran'],150,150,1); ?></td>
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("formulir_pendaftaran/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("formulir_pendaftaran/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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

<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    
                    <h4 >The Dashboard</h4>
                    <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("formulir_pendaftaran/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Formulir Pendaftaran 
                    </a>
                </div>
                </div>
            </div>
            
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/assets-carousel/cover.png" class="mw-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/assets-carousel/cover-1.png" class="mw-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/assets-carousel/cover-2.png" class="mw-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            
        </div>
    </div>
</div>

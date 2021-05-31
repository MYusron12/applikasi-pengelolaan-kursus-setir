        <?php
        $page_id = null;
        $comp_model = new SharedController;
        ?>
        <div class="mt-0">



            <div class="card bg-dark text-white">
                <img src="assets/images/car.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title col-lg-0">Selamat Datang Di Applikasi Kursus Setir Mobil</h5>
                    <div class="col-lg-4 animated fadeIn page-content">
                        <div>
                            <hr />
                            <h5><i class="fa fa-key"></i> User Login</h5>
                            <?php
                            $this::display_page_errors();
                            ?>
                            <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
                                <div class="input-group form-group">
                                    <input placeholder="Username Or Email" name="username" required="required" class="form-control" type="text" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="form-control-feedback fa fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="input-group form-group">
                                    <input placeholder="Password" required="required" v-model="user.password" name="password" class="form-control " type="password" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="form-control-feedback fa fa-key"></i></span>
                                    </div>
                                </div>
                                <div class="row clearfix mt-3 mb-3">
                                    <div class="col-6">
                                        <label class="">
                                            <input value="true" type="checkbox" name="rememberme" />
                                            Remember Me
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <a href="<?php print_link('passwordmanager') ?>" class="text-danger"> Reset Password?</a>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block btn-md" type="submit">
                                        <i class="load-indicator">
                                            <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader>
                                        </i>
                                        Login <i class="fa fa-key"></i>
                                    </button>
                                </div>
                                <hr />
                                <div class="text-center">
                                    Don't Have an Account? <a href="<?php print_link("index/register") ?>" class="btn btn-success">Daftar Sekarang Agar Bisa Kursus
                                        <i class="fa fa-user"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 comp-grid">
                        <?php $this::display_page_errors(); ?>

                    </div>
                </div>
            </div>
        </div>
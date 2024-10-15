<?php include(APPPATH . 'Views/common/header.php'); 
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><?= lang("User.title",[],$locale);?></h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><?= lang("common.customer",[],$locale);?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= lang("common.createCustomer",[],$locale);?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid container-fluid_new">
    <?php if (session()->has('errors')) : ?>
        <div class="alert alert-danger">
                <?php foreach (session('errors') as $error) : ?>
                    <div><?= esc($error) ?></div>
                <?php endforeach ?>
        </div>
    <?php endif ?>
    <?php if (session()->has('success')) : ?>
        <script>
            successToaster("<?= session('success')?>");
        </script>
    <?php endif ?>
        <?= form_open(route_to('saveAdmin'),['id' => 'createCustomerForm']); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?= lang('User.personalInfo',[],$locale)?></h4>
                            <div class="form-group row">
                                <label for="fname"
                                    class="col-sm-3 text-end control-label col-form-label"><?= lang('User.name',[],$locale)?><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <?= form_input('name', '', 'id="name"  class="form-control form-control-lg" placeholder="'.lang('User.name',[],$locale) .'" aria-label="name" aria-describedby="basic-addon1" required="required" autofocus="true"'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="userName" class="col-sm-3 text-end control-label col-form-label">
                                <?= lang('User.userName',[],$locale)?><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <?= form_input('userName', '', 'id="userName"  class="form-control form-control-lg" placeholder="'.lang('User.userName',[],$locale) .'" aria-label="userName" aria-describedby="basic-addon1" required="required"'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password"
                                    class="col-sm-3 text-end control-label col-form-label"><?= lang('User.password',[],$locale)?><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <?= form_password('password', '', 'id="password"  class="form-control form-control-lg" placeholder="'.lang('User.password',[],$locale) .'" aria-label="password" aria-describedby="basic-addon1" required="required"'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                    class="col-sm-3 text-end control-label col-form-label"><?= lang('User.email',[],$locale)?><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <?= form_input('email', '', 'type="email" id="email"  class="form-control form-control-lg" placeholder="'.lang('User.email',[],$locale) .'" aria-label="email" aria-describedby="basic-addon1" required="required"'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile"
                                    class="col-sm-3 text-end control-label col-form-label"><?= lang('User.mobile',[],$locale)?><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <?= form_input('mobile', '', 'id="mobile"  class="form-control form-control-lg" placeholder="'.lang('User.mobile',[],$locale) .'" aria-label="mobile" aria-describedby="basic-addon1" required="required"'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?= lang('User.businessInfo',[],$locale)?></h4>
                            <div class="form-group row">
                                <label for="fname"
                                    class="col-sm-3 text-end control-label col-form-label"><?= lang('User.businessname',[],$locale)?><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <?= form_input('businessname', '', 'id="businessname"  class="form-control form-control-lg" placeholder="'.lang('User.businessname',[],$locale) .'" aria-label="businessname" aria-describedby="basic-addon1" required="required"'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="businessemail"
                                    class="col-sm-3 text-end control-label col-form-label"><?= lang('User.businessemail',[],$locale)?> <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <?= form_input('businessemail', '', 'type="email" id="businessemail"  class="form-control form-control-lg" placeholder="'.lang('User.businessemail',[],$locale) .'" aria-label="businessemail" aria-describedby="basic-addon1" required="required"'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="businessmobile"
                                    class="col-sm-3 text-end control-label col-form-label"><?= lang('User.businessmobile',[],$locale)?><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <?= form_input('businessmobile', '', 'id="businessmobile"  class="form-control form-control-lg" placeholder="'.lang('User.businessmobile',[],$locale) .'" aria-label="businessmobile" aria-describedby="basic-addon1" required="required"'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="businessAddress"
                                    class="col-sm-3 text-end control-label col-form-label"><?= lang('User.businessAddress',[],$locale)?><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <?= form_textarea('businessAddress', '', 'id="businessAddress"  rows="1" class="form-control form-control-lg" placeholder="'.lang('User.businessAddress',[],$locale) .'" aria-label="businessAddress" aria-describedby="basic-addon1" required="required"'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?= form_submit('submit', lang('common.save',[],$locale), 'class="btn btn-success float-end text-white w-100"'); ?>
                </div>
            </div>
        <?= form_close(); ?>     
    </div>
</div>
<?php include(APPPATH . 'Views/common/footer.php'); ?>
<script>
    $(document).ready(function() {
        $('#createCustomerForm').validate({
            messages: {
                name: "<?= lang('User.nameError' , [], $locale)?>",
                email: "<?= lang('User.emailError' , [], $locale)?>",
                userName: "<?= lang('User.userNameError' , [], $locale)?>",
                password: "<?= lang('User.passwordError' , [], $locale)?>",
                mobile: "<?= lang('User.mobileError' , [], $locale)?>",
                businessname: "<?= lang('User.businessnameError' , [], $locale)?>",
                businessemail: "<?= lang('User.businessemailError' , [], $locale)?>",
                businessmobile: "<?= lang('User.businessmobileError' , [], $locale)?>",
                businessAddress: "<?= lang('User.businessAddressError' , [], $locale)?>",
            }
        });        
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    });
</script>
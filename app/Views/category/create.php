<?php include(APPPATH . 'Views/common/header.php'); 
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><?= lang("common.createCategory",[],$locale);?></h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><?= lang("common.category",[],$locale);?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= lang("common.createCategory",[],$locale);?></li>
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
        <?= form_open(route_to('saveCategory'),['id' => 'createCategoryForm']); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="fname"
                                    class="col-sm-3 text-end control-label col-form-label"><?= lang('category.name',[],$locale)?><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <?= form_input('name', '', 'id="name"  class="form-control form-control-lg" placeholder="'.lang('category.name',[],$locale) .'" aria-label="name" aria-describedby="basic-addon1" required="required" autofocus="true"'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="fname"
                                    class="col-sm-3 text-end control-label col-form-label"><?= lang('category.status',[],$locale)?><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" class="form-control form-control-lg" aria-label="status" aria-describedby="basic-addon1" required autofocus>
                                        <option value="1" <?= set_select('status', 'active'); ?>><?= lang('category.active', [], $locale); ?></option>
                                        <option value="2" <?= set_select('status', 'inactive'); ?>><?= lang('category.inactive', [], $locale); ?></option>
                                    </select>
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
        $('#createCategoryForm').validate({
            messages: {
                name: "<?= lang('category.nameError' , [], $locale)?>",
                status: "<?= lang('category.statusError' , [], $locale)?>",
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
<?php include(APPPATH . 'Views/common/header.php'); 
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><?= lang("Category.manageTitle",[],$locale);?></h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><?= lang("common.category",[],$locale);?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= lang("common.manageCategory",[],$locale);?></li>
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
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?= lang('Category.name',[],$locale) ?></th>
                                <th><?= lang('Category.status',[],$locale) ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($categoryList) > 0){ foreach($categoryList as $categoryListRow){?>
                            <tr>
                                <td><?= $categoryListRow['name'] ? $categoryListRow['name'] : "-"; ?></td>
                                <td>
                                    <?php 
                                        $status = $categoryListRow['status']; 
                                        if($status == 1){
                                            $statusMessage = lang('common.active',[],$locale);
                                        }else{
                                            $statusMessage = lang('common.inactive',[],$locale);
                                        }
                                    ?>
                                    <span class="text text-<?= ($status == 1)?'success':'warning'; ?>"><?= $statusMessage; ?></span>
                                </td>
                            </tr>
                            <?php } } else {?>
                                <tr  class="text-center text-danger">
                                    <td colspan="6"><?= lang('common.noRecord',[],$locale);?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include(APPPATH . 'Views/common/footer.php'); ?>
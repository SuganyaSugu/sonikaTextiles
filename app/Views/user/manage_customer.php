<?php include(APPPATH . 'Views/common/header.php'); 
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><?= lang("User.manageTitle",[],$locale);?></h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><?= lang("common.customer",[],$locale);?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= lang("common.manageCustomer",[],$locale);?></li>
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
                                <th><?= lang('User.name',[],$locale) ?></th>
                                <th><?= lang('User.userName',[],$locale) ?></th>
                                <th><?= lang('User.email',[],$locale) ?></th>
                                <th><?= lang('User.mobile',[],$locale) ?></th>
                                <th><?= lang('User.status',[],$locale) ?></th>
                                <th><?= lang('Common.action',[],$locale) ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($customerList) > 0){ foreach($customerList as $customerListRow){?>
                            <tr>
                                <td><?= $customerListRow['fullname'] ? $customerListRow['fullname'] : "-"; ?></td>
                                <td><?= $customerListRow['username'] ? $customerListRow['username'] : "-"; ?></td>
                                <td><?= $customerListRow['email'] ? $customerListRow['email'] : "-"; ?></td>
                                <td><?= $customerListRow['contact'] ? $customerListRow['contact'] : "-"; ?></td>
                                <td>
                                    <?php 
                                        $status = $customerListRow['status']; 
                                        if($status == 1){
                                            $statusMessage = lang('common.active',[],$locale);
                                        }else{
                                            $statusMessage = lang('common.inactive',[],$locale);
                                        }
                                    ?>
                                    <button onclick="status_change(this)" data-id="<?php echo $customerListRow['customer_id'];?>" data-status="<?php echo $status; ?>" class="btn btn-<?= ($status == 1)?'success':'warning'; ?>"><?= $statusMessage; ?></button>
                                </td>
                                <td></td>
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
<script>
    function status_change(data){
        let status = $(data).data('status');
        let id = $(data).data('id');
        $.ajax({
            url:"<?php echo base_url('changeCustomerStatus');?>",
            method:"POST",
            data:{
                "id":id,
                "status":status  == 1 ? "2" : "1"
            },
            success:function(res){
                console.log(res);
            },
            error:function(res){
                console.log(res);
            }
        });
    }
</script>
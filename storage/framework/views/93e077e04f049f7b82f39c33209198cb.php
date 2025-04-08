<?php $__env->startSection('tab' , 30); ?>
<?php $__env->startSection('content'); ?>
    <div class="allLearnDash">
        <div class="questions" id="customer">
            <div class="title">
                <i></i>
                ورژن فعلی شما
            </div>
            <div class="description">
                <ul>
                    <li>
                        ورژن شما:
                        <span>"<?php echo e(File::get($_SERVER['DOCUMENT_ROOT'].'/version.txt')); ?>"</span>
                    </li>
                </ul>
            </div>
        </div>
        <div id="update_notification" style="display:none;">
            <div class="toast-header">
                <strong class="me-auto"><?php echo e(trans("laraupdater.Update_Available")); ?></strong>
                <span id="update_version" class="badge rounded-pill bg-info text-dark"></span>
                <button type="button" class="btn-close" data-bs-dismiss="toast">
                    <i>
                        <svg class="icon">
                            <use xlink:href="#cancel"></use>
                        </svg>
                    </i>
                </button>
            </div>
            <div class="toast-body">
                <span id="update_description"></span>
                <hr>
                <button type="button" onclick="update();" class="btn btn-info btn-sm update_btn"><?php echo e(trans('laraupdater.Update_Now')); ?></button>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts3'); ?>
    <script>
        $(document).ready(function(){
            $.ajax({
                type: 'GET',
                url: '/updater.check',
                async: false,
                success: function(response) {
                    if(response != ''){
                        $('#update_version').text(response.version);
                        $('#update_description').text(response.description);
                        $('#update_notification').show();
                    }else{
                        $('#update_notification').remove();
                    }
                }
            });
        })
        function update() {
            $("#update_description").show();
            $(".update_btn").html('<?php echo e(trans("laraupdater.Updating")); ?>');
            $.ajax({
                type: 'GET',
                url: '/updater.update',
                success: function(response) {
                    if(response != ''){
                        $('#update_description').append(response);
                        $(".update_btn").html('<?php echo e(trans("laraupdater.Updated")); ?>');
                        $(".update_btn").attr("onclick","");
                        $('#update_notification').remove();
                        window.location.reload();
                    }
                },
                error: function(response) {
                    window.location.reload();
                    if(response != ''){
                        $('#update_description').append(response);
                        $(".update_btn").html('<?php echo e(trans("laraupdater.error_try_again")); ?>');
                    }
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myizonek/public_html/local/resources/views/admin/update.blade.php ENDPATH**/ ?>
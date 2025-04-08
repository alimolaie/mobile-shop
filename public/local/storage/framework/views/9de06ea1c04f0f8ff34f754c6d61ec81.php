<?php $__env->startSection('title' , __('messages.counseling') . ' - '); ?>
<?php $__env->startSection('content'); ?>
    <div class="allProfileIndex width">
        <?php echo $__env->make('home.profile.list' , ['tab' => 6], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="profileIndexTicket">
            <h1><?php echo e(__('messages.counseling')); ?></h1>
            <?php if(\Session::has('message')): ?>
                <div class="alert">
                    <?php echo \Session::get('message'); ?>

                </div>
            <?php endif; ?>
            <table>
                <tr>
                    <th><?php echo e(__('messages.counseling1')); ?></th>
                    <th><?php echo e(__('messages.status')); ?></th>
                    <th><?php echo e(__('messages.order_created')); ?></th>
                    <th><?php echo e(__('messages.action1')); ?></th>
                </tr>
                <?php $__currentLoopData = $counselings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <span><?php echo e($item->body); ?></span>
                        </td>
                        <td>
                            <?php if($item->answer): ?>
                                <span><?php echo e(__('messages.answered')); ?></span>
                            <?php else: ?>
                                <span><?php echo e(__('messages.order_status5')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span><?php echo e($item->created_at); ?></span>
                        </td>
                        <td>
                            <div class="buttons">
                                <input type="hidden" value="<?php echo e($item->body); ?>" name="body" id="<?php echo e($item->id); ?>">
                                <button id="<?php echo e($item->id); ?>" class="editButton"><?php echo e(__('messages.show_all')); ?></button>
                                <input type="hidden" value="<?php echo e($item->answer); ?>" name="answer" id="<?php echo e($item->id); ?>">
                                <button id="<?php echo e($item->id); ?>" class="deleteButton"><?php echo e(__('messages.delete')); ?></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <div class="popUp">
                <div class="popUpItem">
                    <div class="title"><?php echo e(__('messages.counsel_delete1')); ?></div>
                    <p><?php echo e(__('messages.counsel_delete2')); ?></p>
                    <div class="buttonsPop">
                        <form method="POST" action="" id="deletePost">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit"><?php echo e(__('messages.deleted')); ?></button>
                        </form>
                        <button id="cancelDelete"><?php echo e(__('messages.cancel')); ?></button>
                    </div>
                </div>
            </div>
            <div class="showTicket" style="display:none">
                <div class="ticketData">
                    <div class="itemsTicket">
                        <h4><?php echo e(__('messages.counseling1')); ?> :</h4>
                        <p></p>
                    </div>
                    <div class="itemsAnswer">
                        <h4><?php echo e(__('messages.answer')); ?> :</h4>
                        <p></p>
                    </div>
                    <div class="buttonsPop">
                        <button><?php echo e(__('messages.close')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script1'); ?>
    <script>
        $(document).ready(function(){
            var post = 0;
            $('.popUp').hide();
            $('#cancelDelete').click(function(){
                $('.popUp').hide();
                post = 0;
            })
            $('#deletePost').click(function(){
                $('.popUp').hide();
            });
            $('.buttons').on('click' , '.deleteButton' ,function(){
                post = this.id;
                $('.popUp').show();
                $('.buttonsPop form').attr('action' , '/profile/counseling/' + post+'/delete');
            })
            $('.buttons').on('click' , '.editButton' ,function(){
                $('.showTicket').show(100);
                $('.showTicket .itemsTicket p').text($(this.previousElementSibling).val())
                $('.showTicket .itemsAnswer p').text($(this.nextElementSibling).val())
            })
            $('.showTicket button').on('click' ,function(){
                $('.showTicket').hide(100);
                $('.showTicket .itemsTicket p').text('')
                $('.showTicket .itemsAnswer p').text('')
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myizonek/public_html/local/resources/views/home/profile/counseling.blade.php ENDPATH**/ ?>
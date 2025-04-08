<?php $__env->startSection('title' , __('messages.faq') . ' - '); ?>
<?php $__env->startSection('content'); ?>
    <main class="allFaqIndex width">
        <?php if(\Session::has('message')): ?>
            <div class="alert">
                <?php echo \Session::get('message'); ?>

            </div>
        <?php endif; ?>
        <?php if(\Session::has('success')): ?>
            <div class="success">
                <?php echo \Session::get('success'); ?>

            </div>
        <?php endif; ?>
        <section class="questions">
            <h1><?php echo e(__('messages.faq')); ?></h1>
            <?php $__currentLoopData = $asks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="questionIndex">
                    <div class="title">
                        <h3><?php echo e($item->title); ?></h3>
                        <i>
                            <svg class="icon">
                                <use xlink:href="#down"></use>
                            </svg>
                        </i>
                    </div>
                    <div class="description">
                        <p><?php echo $item->body; ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script1'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var req_field11 = <?php echo json_encode(__('messages.req_field'), JSON_HEX_TAG); ?>;
            var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity(req_field1);
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
            var elements2 = document.getElementsByTagName("TEXTAREA");
            for (i = 0; i < elements2.length; i++) {
                elements2[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity(req_field1);
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })
        $(document).ready(function(){
            $('.questions .questionIndex').on('click',function(){
                $.each($('.description') , function(){
                    $(this).hide();
                })
                $(this.lastElementChild).toggle();
            })
            $('.questions #buttonQuestion button').on('click',function(){
                $('.questions').toggle();
                $('.tickets').toggle();
            })
            $('.tickets .ticketButtons h4').on('click',function(){
                $('.questions').toggle();
                $('.tickets').toggle();
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/izoneka1/new.izonekala.com/local/resources/views/home/faq/index.blade.php ENDPATH**/ ?>
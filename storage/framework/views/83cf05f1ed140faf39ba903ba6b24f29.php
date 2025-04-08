<?php $__env->startSection('title' , __('messages.lucky_chance') . ' - '); ?>
<?php $__env->startSection('content'); ?>
    <main class="allLuckyIndex width">
        <?php if($shareText): ?>
            <div class="alert"><?php echo e($shareText); ?></div>
        <?php endif; ?>
        <div class="promo-wrapper">
            <h1><?php echo e(__('messages.lucky_chance')); ?></h1>
            <h3><?php echo e(__('messages.lucky_chance1')); ?></h3>
        </div>
        <div class="deal-wheel">
            <ul class="spinner"></ul>
            <div class="ticker"></div>
            <?php if(!$shareText): ?>
                <button class="btn-spin"><?php echo e(__('messages.start_lucky')); ?></button>
            <?php endif; ?>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script1'); ?>
    <script>
        $(document).ready(function(){
            var shareText = <?php echo json_encode($shareText, JSON_HEX_TAG); ?>;
            const prizes = <?php echo json_encode(\App\Models\Lucky::latest()->get(), JSON_HEX_TAG); ?>;
            const wheel = document.querySelector(".deal-wheel");
            const spinner = wheel.querySelector(".spinner");
            const trigger = wheel.querySelector(".btn-spin");
            const ticker = wheel.querySelector(".ticker");
            const prizeSlice = 360 / prizes.length;
            const prizeOffset = Math.floor(180 / prizes.length);
            const spinClass = "is-spinning";
            const selectedClass = "selected";
            const spinnerStyles = window.getComputedStyle(spinner);
            let tickerAnim;
            let rotation = 0;
            let currentSlice = 0;
            let prizeNodes;

            const createPrizeNodes = () => {
                prizes.forEach(({ name, color, reaction }, i) => {
                    const rotation = prizeSlice * i * -1 - prizeOffset;
                    spinner.insertAdjacentHTML(
                        "beforeend",
                        `<li class="prize" data-reaction=${reaction} style="--rotate: ${rotation}deg">
            <span class="text" style="color:${color}">${name}</span>
          </li>`
                    );
                });
            };

            const createConicGradient = () => {
                spinner.setAttribute(
                    "style",
                    `background: conic-gradient(
          from -90deg,
          ${prizes
                        .map(
                            ({ background }, i) =>
                                `${background} 0 ${(100 / prizes.length) * (prizes.length - i)}%`
                        )
                        .reverse()}
        );`
                );
            };

            const setupWheel = () => {
                createConicGradient();
                createPrizeNodes();
                prizeNodes = wheel.querySelectorAll(".prize");
            };

            const spinertia = (min, max) => {
                min = Math.ceil(min);
                max = Math.floor(max);
                return 380;
            };

            const runTickerAnimation = () => {
                const values = spinnerStyles.transform.split("(")[1].split(")")[0].split(",");
                const a = values[0];
                const b = values[1];
                let rad = Math.atan2(b, a);

                if (rad < 0) rad += 2 * Math.PI;

                const angle = Math.round(rad * (180 / Math.PI));
                const slice = Math.floor(angle / prizeSlice);

                if (currentSlice !== slice) {
                    ticker.style.animation = "none";
                    setTimeout(() => (ticker.style.animation = null), 10);
                    currentSlice = slice;
                }
                tickerAnim = requestAnimationFrame(runTickerAnimation);
            };

            var fail_luck1 = <?php echo json_encode(__('messages.fail_luck'), JSON_HEX_TAG); ?>;
            var empty1 = <?php echo json_encode(__('messages.empty'), JSON_HEX_TAG); ?>;
            const selectPrize = () => {
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                $('.btn-spin').remove();
            };
            if(!shareText){
                trigger.addEventListener("click", () => {
                    trigger.disabled = true;
                    rotation = 380;
                    prizeNodes.forEach((prize) => prize.classList.remove(selectedClass));
                    wheel.classList.add(spinClass);
                    spinner.style.setProperty("--rotate", rotation);
                    ticker.style.animation = "none";
                    runTickerAnimation();
                });
            }
            spinner.addEventListener("transitionend", () => {
                cancelAnimationFrame(tickerAnim);
                rotation %= 360;
                selectPrize();
                wheel.classList.remove(spinClass);
                spinner.style.setProperty("--rotate", rotation);
                trigger.disabled = false;
            });
            setupWheel();
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\NewSeo\seoshop\resources\views/home/lucky/index.blade.php ENDPATH**/ ?>
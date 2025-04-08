<div class="allLoanIndex width">
    <div class="loanTitle">
        <i>
            <svg class="icon">
                <use xlink:href="#box"></use>
            </svg>
        </i>
        <?php echo e($data['title']); ?>

    </div>
    <div class="loadContainer">
        <div class="loanItems">
            <div class="loanItem">
                <label for="amountLoan"><?php echo e(__('messages.loan1')); ?></label>
                <div class="inputs">
                    <span>0</span>
                    <input min="0" max="<?php echo e($maxPriceLoan); ?>" name="amount" step="1000000" type="range">
                    <span><?php echo e(number_format($maxPriceLoan)); ?> <?php echo e(__('messages.arz')); ?></span>
                </div>
            </div>
            <div class="loanItem">
                <label for="monthLoan"><?php echo e(__('messages.loan2')); ?></label>
                <div class="inputs">
                    <span>1</span>
                    <input min="1" max="<?php echo e($maxMonthLoan); ?>" name="month" type="range">
                    <span><?php echo e($maxMonthLoan); ?> <?php echo e(__('messages.month')); ?></span>
                </div>
            </div>
        </div>
        <div class="loanDetail">
            <div class="loanDetailItems">
                <div class="loanDetailItem">
                    <div class="price1"><?php echo e(__('messages.loan_price')); ?></div>
                    <p id="amountLoan1">0</p>
                </div>
                <div class="loanDetailItem">
                    <div class="price1"><?php echo e(__('messages.loan_month')); ?></div>
                    <p id="monthLoan1">1</p>
                </div>
                <div class="loanDetailItem">
                    <div class="price1"><?php echo e(__('messages.loan_install')); ?></div>
                    <p id="monthLoan2">1</p>
                </div>
                <div class="loanDetailItem">
                    <div class="price1"><?php echo e(__('messages.loan_profit')); ?></div>
                    <p id="profitLoan">0</p>
                </div>
                <div class="loanDetailItem">
                    <div class="price1"><?php echo e(__('messages.loan_amount')); ?></div>
                    <p id="refundLoan">0</p>
                </div>
            </div>
        </div>
        <div class="loanRecord">
            <div class="btn1"><?php echo e(__('messages.loan_body')); ?></div>
            <button><?php echo e(__('messages.loan_send')); ?></button>
        </div>
    </div>
</div>
<?php /**PATH /home/myizonek/public_html/local/resources/views/home/index/loanIndex.blade.php ENDPATH**/ ?>
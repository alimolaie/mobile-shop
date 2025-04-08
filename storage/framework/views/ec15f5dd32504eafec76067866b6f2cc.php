<div class="bestIndex width">
    <div class="bestTitle">
        <svg class="icon">
            <use xlink:href="#pay"></use>
        </svg>
        <div class="title1"><?php echo e($data['title']); ?></div>
    </div>
    <div class="slider-bestIndex owl-carousel owl-theme">
        <div class="bestItems">
            <?php if(!empty($data['post'][0])): ?>
            <a href="/product/<?php echo e($data['post'][0]->slug); ?>" title="<?php echo e($data['post'][0]->titleSeo); ?>" name="<?php echo e($data['post'][0]->title); ?>">
                <article>
                    <figure class="pic">
                        <?php if($data['post'][0]->image != '[]'): ?>
                            <img lazy="loading" class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][0]->image)[0]); ?>" alt="<?php echo e($data['post'][0]->imageAlt); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="articleCount">1</div>
                    <div class="title2"><?php echo e($data['post'][0]->title); ?></div>
                </article>
            </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][1])): ?>
            <a href="/product/<?php echo e($data['post'][1]->slug); ?>" title="<?php echo e($data['post'][1]->titleSeo); ?>" name="<?php echo e($data['post'][1]->title); ?>">
                <article>
                    <figure class="pic">
                        <?php if($data['post'][1]->image != '[]'): ?>
                            <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][1]->image)[0]); ?>" alt="<?php echo e($data['post'][1]->imageAlt); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="articleCount">2</div>
                    <div class="title2"><?php echo e($data['post'][1]->title); ?></div>
                </article>
            </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][2])): ?>
            <a href="/product/<?php echo e($data['post'][2]->slug); ?>" title="<?php echo e($data['post'][2]->titleSeo); ?>" name="<?php echo e($data['post'][2]->title); ?>">
                <article>
                    <figure class="pic">
                        <?php if($data['post'][2]->image != '[]'): ?>
                            <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][2]->image)[0]); ?>" alt="<?php echo e($data['post'][2]->imageAlt); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="articleCount">3</div>
                    <div class="title2"><?php echo e($data['post'][2]->title); ?></div>
                </article>
            </a>
            <?php endif; ?>
        </div>
        <div class="bestItems">
            <?php if(!empty($data['post'][3])): ?>
            <a href="/product/<?php echo e($data['post'][3]->slug); ?>" title="<?php echo e($data['post'][3]->titleSeo); ?>" name="<?php echo e($data['post'][3]->title); ?>">
                <article>
                    <figure class="pic">
                        <?php if($data['post'][3]->image != '[]'): ?>
                            <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][3]->image)[0]); ?>" alt="<?php echo e($data['post'][3]->imageAlt); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="articleCount">4</div>
                    <div class="title2"><?php echo e($data['post'][3]->title); ?></div>
                </article>
            </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][4])): ?>
            <a href="/product/<?php echo e($data['post'][4]->slug); ?>" title="<?php echo e($data['post'][4]->titleSeo); ?>" name="<?php echo e($data['post'][4]->title); ?>">
                <article>
                    <figure class="pic">
                        <?php if($data['post'][4]->image != '[]'): ?>
                            <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][4]->image)[0]); ?>" alt="<?php echo e($data['post'][4]->imageAlt); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="articleCount">5</div>
                    <div class="title2"><?php echo e($data['post'][4]->title); ?></div>
                </article>
            </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][5])): ?>
            <a href="/product/<?php echo e($data['post'][5]->slug); ?>" title="<?php echo e($data['post'][5]->titleSeo); ?>" name="<?php echo e($data['post'][5]->title); ?>">
                <article>
                    <figure class="pic">
                        <?php if($data['post'][5]->image != '[]'): ?>
                            <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][5]->image)[0]); ?>" alt="<?php echo e($data['post'][5]->imageAlt); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="articleCount">6</div>
                    <div class="title2"><?php echo e($data['post'][5]->title); ?></div>
                </article>
            </a>
            <?php endif; ?>
        </div>
        <div class="bestItems">
            <?php if(!empty($data['post'][6])): ?>
            <a href="/product/<?php echo e($data['post'][6]->slug); ?>" title="<?php echo e($data['post'][6]->titleSeo); ?>" name="<?php echo e($data['post'][6]->title); ?>">
            <article>
                <figure class="pic">
                    <?php if($data['post'][6]->image != '[]'): ?>
                        <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][6]->image)[0]); ?>" alt="<?php echo e($data['post'][6]->imageAlt); ?>">
                    <?php endif; ?>
                </figure>
                <div class="articleCount">7</div>
                <div class="title2"><?php echo e($data['post'][6]->title); ?></div>
            </article>
        </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][7])): ?>
            <a href="/product/<?php echo e($data['post'][7]->slug); ?>" title="<?php echo e($data['post'][7]->titleSeo); ?>" name="<?php echo e($data['post'][7]->title); ?>">
        <article>
            <figure class="pic">
                <?php if($data['post'][7]->image != '[]'): ?>
                    <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][7]->image)[0]); ?>" alt="<?php echo e($data['post'][7]->imageAlt); ?>">
                <?php endif; ?>
            </figure>
            <div class="articleCount">8</div>
            <div class="title2"><?php echo e($data['post'][7]->title); ?></div>
        </article>
    </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][8])): ?>
            <a href="/product/<?php echo e($data['post'][8]->slug); ?>" title="<?php echo e($data['post'][8]->titleSeo); ?>" name="<?php echo e($data['post'][8]->title); ?>">
                <article>
                    <figure class="pic">
                        <?php if($data['post'][8]->image != '[]'): ?>
                            <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][8]->image)[0]); ?>" alt="<?php echo e($data['post'][8]->imageAlt); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="articleCount">9</div>
                    <div class="title2"><?php echo e($data['post'][8]->title); ?></div>
                </article>
            </a>
            <?php endif; ?>
        </div>
        <div class="bestItems">
            <?php if(!empty($data['post'][9])): ?>
                <a href="/product/<?php echo e($data['post'][9]->slug); ?>" title="<?php echo e($data['post'][9]->titleSeo); ?>" name="<?php echo e($data['post'][9]->title); ?>">
                    <article>
                        <figure class="pic">
                            <?php if($data['post'][9]->image != '[]'): ?>
                                <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][9]->image)[0]); ?>" alt="<?php echo e($data['post'][9]->imageAlt); ?>">
                            <?php endif; ?>
                        </figure>
                        <div class="articleCount">10</div>
                        <div class="title2"><?php echo e($data['post'][9]->title); ?></div>
                    </article>
                </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][10])): ?>
            <a href="/product/<?php echo e($data['post'][10]->slug); ?>" title="<?php echo e($data['post'][10]->titleSeo); ?>" name="<?php echo e($data['post'][10]->title); ?>">
                <article>
                    <figure class="pic">
                        <?php if($data['post'][10]->image != '[]'): ?>
                            <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][10]->image)[0]); ?>" alt="<?php echo e($data['post'][10]->imageAlt); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="articleCount">11</div>
                    <div class="title2"><?php echo e($data['post'][10]->title); ?></div>
                </article>
            </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][11])): ?>
            <a href="/product/<?php echo e($data['post'][11]->slug); ?>" title="<?php echo e($data['post'][11]->titleSeo); ?>" name="<?php echo e($data['post'][11]->title); ?>">
                <article>
                    <figure class="pic">
                        <?php if($data['post'][11]->image != '[]'): ?>
                            <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][11]->image)[0]); ?>" alt="<?php echo e($data['post'][11]->imageAlt); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="articleCount">12</div>
                    <div class="title2"><?php echo e($data['post'][11]->title); ?></div>
                </article>
            </a>
            <?php endif; ?>
        </div>
        <div class="bestItems">
            <?php if(!empty($data['post'][12])): ?>
            <a href="/product/<?php echo e($data['post'][12]->slug); ?>" title="<?php echo e($data['post'][12]->titleSeo); ?>" name="<?php echo e($data['post'][12]->title); ?>">
            <article>
                <figure class="pic">
                    <?php if($data['post'][12]->image != '[]'): ?>
                        <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][12]->image)[0]); ?>" alt="<?php echo e($data['post'][12]->imageAlt); ?>">
                    <?php endif; ?>
                </figure>
                <div class="articleCount">13</div>
                <div class="title2"><?php echo e($data['post'][12]->title); ?></div>
            </article>
        </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][13])): ?>
            <a href="/product/<?php echo e($data['post'][13]->slug); ?>" title="<?php echo e($data['post'][13]->titleSeo); ?>" name="<?php echo e($data['post'][13]->title); ?>">
        <article>
            <figure class="pic">
                <?php if($data['post'][13]->image != '[]'): ?>
                    <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][13]->image)[0]); ?>" alt="<?php echo e($data['post'][13]->imageAlt); ?>">
                <?php endif; ?>
            </figure>
            <div class="articleCount">14</div>
            <div class="title2"><?php echo e($data['post'][13]->title); ?></div>
        </article>
    </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][14])): ?>
            <a href="/product/<?php echo e($data['post'][14]->slug); ?>" title="<?php echo e($data['post'][14]->titleSeo); ?>" name="<?php echo e($data['post'][14]->title); ?>">
                <article>
                    <figure class="pic">
                        <?php if($data['post'][14]->image != '[]'): ?>
                            <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][14]->image)[0]); ?>" alt="<?php echo e($data['post'][14]->imageAlt); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="articleCount">15</div>
                    <div class="title2"><?php echo e($data['post'][14]->title); ?></div>
                </article>
            </a>
            <?php endif; ?>
        </div>
        <div class="bestItems">
            <?php if(!empty($data['post'][15])): ?>
            <a href="/product/<?php echo e($data['post'][15]->slug); ?>" title="<?php echo e($data['post'][15]->titleSeo); ?>" name="<?php echo e($data['post'][15]->title); ?>">
            <article>
                <figure class="pic">
                    <?php if($data['post'][15]->image != '[]'): ?>
                        <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][15]->image)[0]); ?>" alt="<?php echo e($data['post'][15]->imageAlt); ?>">
                    <?php endif; ?>
                </figure>
                <div class="articleCount">16</div>
                <div class="title2"><?php echo e($data['post'][15]->title); ?></div>
            </article>
        </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][16])): ?>
            <a href="/product/<?php echo e($data['post'][16]->slug); ?>" title="<?php echo e($data['post'][16]->titleSeo); ?>" name="<?php echo e($data['post'][16]->title); ?>">
        <article>
            <figure class="pic">
                <?php if($data['post'][16]->image != '[]'): ?>
                    <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][16]->image)[0]); ?>" alt="<?php echo e($data['post'][16]->imageAlt); ?>">
                <?php endif; ?>
            </figure>
            <div class="articleCount">17</div>
            <div class="title2"><?php echo e($data['post'][16]->title); ?></div>
        </article>
    </a>
            <?php endif; ?>
            <?php if(!empty($data['post'][17])): ?>
            <a href="/product/<?php echo e($data['post'][17]->slug); ?>" title="<?php echo e($data['post'][17]->titleSeo); ?>" name="<?php echo e($data['post'][17]->title); ?>">
                <article>
                    <figure class="pic">
                        <?php if($data['post'][17]->image != '[]'): ?>
                            <img class="lazyload" src="/img/404Image.png" data-src="<?php echo e(json_decode($data['post'][17]->image)[0]); ?>" alt="<?php echo e($data['post'][17]->imageAlt); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="articleCount">18</div>
                    <div class="title2"><?php echo e($data['post'][17]->title); ?></div>
                </article>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH D:\Laravel\NewSeo\seoshop\resources\views/home/index/bestIndex.blade.php ENDPATH**/ ?>
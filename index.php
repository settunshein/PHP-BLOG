<?php
include('include/header.php');
$categories = get_all_categories();
$posts      = get_all_posts();
?>

<section class="section-light sec-tpadding-2 sec-content-blk">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    
                    <?php foreach($posts as $post): ?>
                    <div class="col-md-6 post-blk">
                        <div class="blog1-post-holder">
                            <div class="image-holder">
                                <div class="post-info"> 
                                    <span>
                                        <?php
                                            $category = get_category($post->category_id);
                                            echo $category ? $category->title : '';
                                        ?>
                                    </span> 
                                </div>
                                <?php if($post->image): ?>
                                    <img src="admin/uploads/post/<?=$post->image?>" class="img-responsive" />
                                <?php else: ?>
                                    <img src="assets/img/post_01.jpg" class="img-responsive" />
                                <?php endif; ?>
                            </div>
                            <div class="text-box-inner post-txt-blk">
                                <h4 class="uppercase post-ttl">
                                    <a href="#"><?= $post->title ?></a>
                                </h4>

                                <div class="blog-post-info"> 
                                    <?php $user = get_user($post->user_id); ?>
                                    <?php $comments = get_all_comments($post->id); ?>
                                    <span class="custom-mr-10"><i class="ri ri-shield-user-line"></i> By <?= ucwords(strtolower($user->name)) ?></span> 
                                    <span>
                                    <i class="ri ri-question-answer-line"></i> 
                                    <?= count($comments) > 0 ? count($comments) : 0 ?> Comments
                                </span> 
                                </div>
                                <br>

                                <p class="post-content">
                                    <?= substr($post->content, 0, 300) ?>
                                </p>
                                <a href="details.php?post_slug=<?= $post->slug ?>" 
                                class="btn btn-border yellow-green">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <?php include('include/sidebar.php'); ?>
        </div>
    </div>
</section>
<div class="clearfix"></div>

<?php include('include/footer.php'); ?>
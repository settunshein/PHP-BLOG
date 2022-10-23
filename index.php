<?php
include('include/header.php');
$categories = get_all_categories();
//$posts      = get_all_posts();
$data  = get_data_by_page('posts', null);
$posts = $data[0];
$page  = $data[1];
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
                                    <?= substr($post->content, 0, 240) ?>
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

                <div class="row">
                    <?php $total_page = get_paginator('posts', null); ?>
                    <?php if( $total_page > 1 ): ?>
                    <div class="col-md-12">
                        <nav>
                            <ul class="pagination justify-content-end">
                                <li class="page-item <?= $page > 1 ? '' : 'disabled'; ?>">
                                    <a class="page-link" 
                                    <?php if($page > 1): ?> href="index.php?page=<?= $page - 1 ?>" <?php endif; ?>>
                                        <span>&xlarr;</span>
                                    </a>
                                </li>
                                <?php for($i=1; $i<=$total_page; $i++): ?>
                                <?php $active = $i == $page ? 'active' : ''; ?>
                                <li class="page-item <?= $active ?>">
                                    <a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                                <?php endfor; ?>
                                <li class="page-item <?= $total_page > $page ? '' : 'disabled'; ?>">
                                    <a class="page-link" 
                                    <?php if($total_page > $page): ?> href="index.php?page=<?= $page + 1 ?>" <?php endif; ?>>
                                        <span>&xrarr;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <?php endif; ?>
                </div>
            </div><!-- /.col-md-8 -->

            <?php include('include/sidebar.php'); ?>
           
        </div><!-- /.row -->
    </div>
</section>
<div class="clearfix"></div>

<?php include('include/footer.php'); ?>
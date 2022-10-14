<?php
include('include/header.php');

$categories = get_all_categories();
$post       = get_post($_GET['post_slug']);
$comments   = get_all_comments($post->id);

?>

<section class="sec-tpadding-2 section-light sec-content-blk">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-12 nopadding">
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
                        <div class="text-box-inner">
                            <h4 class="uppercase post-ttl custom-fs-20">
                                <a href="#"><?= $post->title ?></a>
                            </h4>

                            <div class="blog-post-info"> 
                                <?php $user = get_user($post->user_id); ?>
                                <span class="custom-mr-10"><i class="ri ri-shield-user-line"></i> By <?= ucwords(strtolower($user->name)) ?></span> 
                                <span class="custom-mr-10">
                                    <i class="ri ri-question-answer-line"></i> 
                                    <?= count($comments) > 0 ? count($comments) : 0 ?> Comments
                                </span> 
                                <span><i class="ri ri-calendar-2-line"></i> <?= date("M d, Y", strtotime($post->created_at)) ?> </span> 
                            </div>
                            <br>

                            <p class="post-content">
                                <?= substr($post->content, 0, 300) ?>
                            </p>
                            <br>

                            <h4 class="custom-fs-18 fs-700 uppercase custom-mb-20">
                                <?= count($comments) > 0 ? count($comments) . ' Comments' : 'No Comment'; ?> 
                            </h4>
                            
                            <?php foreach($comments as $comment): ?>
                            <div class="blog1-post-info-box">
                                <div class="text-box border padding-3"> 
                                    <div class="iconbox-medium left round overflow-hidden" style="margin-top: 10px;">
                                        <img src="https://ui-avatars.com/api/?background=006699&color=fff&name=<?= $comment->name ?>" 
                                        class="img-responsive" width="110" height="110" />
                                    </div>
                                    
                                    <div class="text-box-right more-padding-2">
                                        <h5 class="uppercase custom-fs-16 custom-mb-10"><?= $comment->name ?></h5>
                                        <div class="blog1-post-info custom-mb-10 custom-fs-13">
                                            <span>
                                                <?= date("M d, Y", strtotime($comment->created_at)) ?> 
                                                at <?= date("H:i:A") ?>
                                            </span>
                                        </div>
                                        <p class="no-mb custom-fs-12">
                                            <?= $comment->comment ?>
                                        </p>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <?php endforeach; ?>

                            <div class="smart-forms custom-mt-20">
                                <h4 class="custom-fs-18 fs-700 uppercase custom-mb-20">Post a Comment</h4>

                                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <input type="hidden" name="post_id" value="<?= $post->id ?>">
                                    <div>
                                        <div class="section">
                                            <input type="text" name="name"
                                            class="comment-input" placeholder="Username">
                                        </div>

                                        <div class="section">
                                            <input type="email" name="email" 
                                            class="comment-input" placeholder="Email Address">
                                        </div>

                                        <div class="section">
                                            <textarea name="comment" placeholder="Leave Your Message" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-border yellow-green" name="insert_comment"> 
                                            Comment 
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('include/sidebar.php'); ?>
        </div>
    </div>
</section>
<?php include('include/footer.php'); ?>
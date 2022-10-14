<?php
include('include/header.php');
$categories = get_all_categories();
?>

<section class="sec-tpadding-2 section-light sec-content-blk">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-12 nopadding">
                    <div class="blog1-post-holder">
                        <div class="text-box-inner">

                            <div class="smart-forms">
                                <h4 class="custom-fs-24 fs-700 uppercase custom-mb-22">Login</h4>

                                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <div>
                                        <div class="section">
                                            <input type="email" name="email" 
                                            class="comment-input" placeholder="Enter Your Email Address">
                                        </div>

                                        <div class="section">
                                            <input type="password" name="password"
                                            class="comment-input" placeholder="Enter Your Password">
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-border yellow-green" name="login"> LOGIN </button>
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
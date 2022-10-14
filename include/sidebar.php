<div class="col-md-4">
    <div class="col-md-12 nopadding sidebar-blk">
        <div class="blog1-sidebar-box">
            <div class="text-box-inner">
                <h5 class="uppercase fw-600">Search</h5>
                <div class="clearfix"></div>
                <form action="" class="post-search-form">
                    <input class="post-search-input" type="search" placeholder="Search by Post . . .">
                    <button type="submit" class="post-search-btn">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 nopadding sidebar-blk">
        <div class="blog1-sidebar-box">
            <div class="text-box-inner">
                <h5 class="uppercase fw-600">Categories</h5>
                <div class="clearfix"></div>
                <ul class="category-links">
                    <?php foreach($categories as $category): ?>
                    <li>
                        <a class="category-link" href="category_posts.php?category=<?= $category->slug ?>">
                            <i class="<?= $category->logo ?> category-logo"></i>
                            <?= $category->title ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

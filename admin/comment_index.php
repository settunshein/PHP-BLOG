<?php 
$title = 'Comment | Index'; 
$comment_active = 'active';

include('include_admin/header.php');
include('include_admin/nav.php');

if( $auth_user->role != 'admin' ){
    redirect_back();
}

$comments = get_all_comments();
?>

<div class="container-fluid">
    <div class="row">
        
        <?php include('include_admin/sidebar.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h5">Comment Management</h1>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="table-title">Comment List Table</span>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" style="vertical-align: baseline;">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="35%">Comment Info</th>
                                <th width="35%">Post Info</th>
                                <th width="8%">Action</th>
                            </tr>
                        </thead>
                            

                        <tbody>
                            <?php if(count($comments) > 0): ?>
                            <?php foreach($comments as $key => $comment): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td class="text-left align-top custom-py-22">
                                    <div class="media">
                                        <img src="https://ui-avatars.com/api/?background=006699&color=fff&name=<?= $comment->name ?>" 
                                        class="img-fluid rounded-circle mr-3" width="60" height="60">
                                        
                                        <div class="media-body">
                                            <p class="media-heading text-danger d-flex justify-content-between custom-fs-12 border-bottom mb-2">
                                                <span><?= $comment->name ?></span>
                                                <span><?=$comment->created_at ?></span>
                                            </p>
                                            <p class="text-black-50 text-justify mb-0 custom-fs-12">
                                                <?= $comment->comment ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-left align-top custom-py-22">
                                    <?php $post = get_post($comment->post_id); ?>
                                    <p class="media-heading mb-2">
                                        <a href="../details.php?post_slug=<?= $post->slug ?>">
                                            <?= $post->title ?>
                                        </a>
                                    </p>
                                    <p class="text-black-50 text-justify mb-0 custom-fs-12">
                                        <?= substr($post->content, 0, 150) ?>
                                    </p>
                                </td>
                                <td>
                                    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" 
                                    data-toggle="modal" data-target="#showDeleteCommentModal<?=$comment->id?>">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                    <?php include('comment_delete.php'); ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="4">
                                    <span class="text-danger">No Category Found</span>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
            <!-- End of card -->

        </main>

    </div>
</div>

<?php include('include_admin/footer.php'); ?>

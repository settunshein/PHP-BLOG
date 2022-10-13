<?php 
$title  = 'Post | Index'; 
$post_active = 'active';

include('include_admin/header.php');
include('include_admin/nav.php');

$data  = get_data_by_page('posts', $auth_user);
$posts = $data[0];
$page  = $data[1];
?>

<div class="container-fluid mb-5">
    <div class="row">
        
        <?php include('include_admin/sidebar.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h5">Post Management</h1>
                <a href="post_create.php" class="btn btn-sm btn-outline-dark rounded-0">
                    <i class="fa fa-plus"></i>&nbsp;
                    Create
                </a>
            </div>

            <div class="row">
                <?php if(count($data[0]) > 0): ?>
                <?php foreach($posts as $key => $post): ?>
                <div class="col-md-6 mb-2">
                    <div class="card custom-mb-22 shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center" style="color: #1e1c1f; font-weight: 500;">
                            <span>
                                <?= substr($post->title, 0, 60) ?>  
                                <?= strlen($post->title) > 60 ? ' . . . ' : '' ?>
                            </span>

                            <?php if($post->status == 0): ?>
                                <span class="badge badge-danger px-3 py-2 rounded-0">PENDING</span>
                            <?php else: ?>
                                <span class="badge badge-success px-3 py-2 rounded-0">PUBLISHED</span>
                            <?php endif; ?>
                        </div>
                        <div class="card-body text-justify">
                            <p class="mb-0 custom-fs-12">
                                <?= substr($post->content, 0, 280) ?>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div>
                                <p class="custom-fs-12 mb-0">
                                    Post on <?= date("M d, Y", strtotime($post->created_at)) ?>
                                </p>
                            </div>
                            <div>
                                <a href="post_details.php?id=<? $post->id ?>" class="btn btn-sm btn-outline-dark rounded-0">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="post_edit.php?edit_post_id=<?= $post->id ?>" class="btn btn-sm btn-outline-dark rounded-0">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" 
                                data-toggle="modal" data-target="#showDeletePostModal<?=$post->id?>">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                                <?php include('post_delete.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <span class="text-danger">No Posts Found</span>
                        </div>
                   </div>
                </div>
                <?php endif; ?>
                                
                <?php $total_page = get_paginator('posts', $auth_user); ?>
                <?php if( $total_page > 1 ): ?>
                <div class="col-md-12">
                    <nav>
                        
                        <ul class="pagination justify-content-end">
                            <li class="page-item <?= $page > 1 ? '' : 'disabled'; ?>">
                                <a class="page-link disabled" href="post_index.php?page=<?= $page - 1 ?>">
                                    <span>&larr;</span>
                                </a>
                            </li>
                            <?php for($i=1; $i<=$total_page; $i++): ?>
                            <?php $active = $i == $page ? 'active' : ''; ?>
                            <li class="page-item <?= $active ?>">
                                <a class="page-link" href="post_index.php?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                            <?php endfor; ?>
                            <li class="page-item <?= $total_page > $page ? '' : 'disabled'; ?>">
                                <a class="page-link" href="post_index.php?page=<?= $page + 1 ?>">
                                    <span>&rarr;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php endif; ?>
            </div>

        </main>

    </div>
</div>

<?php include('include_admin/footer.php'); ?>


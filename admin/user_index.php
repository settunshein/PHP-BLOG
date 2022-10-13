<?php 
$title = 'User | Index'; 
$user_active = 'active';

include('include_admin/header.php');
include('include_admin/nav.php');

if( $auth_user->role != 'admin' ){
    redirect_back();
}

$data  = get_data_by_page('users');
$users = $data[0];
$page  = $data[1];

$page == 1 ? $i = 0 : $i = ($page - 1) * 4;
?>

<div class="container-fluid mb-5">
    <div class="row">
        
        <?php include('include_admin/sidebar.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h5">User Management</h1>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="table-title">User List Table</span>
                    <a href="user_create.php" class="btn btn-sm btn-outline-dark rounded-0">
                        Create&nbsp;
                        <i class="fa fa-plus"></i>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered text-center v-middle mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th width="10%">Address</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        

                        <tbody>
                            <?php if(count($users) > 0): ?>
                            <?php foreach($users as $key => $user): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td>
                                    <?php if($user->image): ?>
                                        <img src="uploads/user/<?=$user->image?>" alt="<?= ucwords($user->name); ?>"
                                        class="rounded-circle img-fluid" width="65">
                                    <?php else: ?>
                                        <img src="https://ui-avatars.com/api/?background=006699&color=fff&name=<?= $user->name ?>" 
                                        class="img-fluid rounded-circle align-self-center mr-3" width="65" height="65">
                                    <?php endif; ?>
                                </td>
                                <td><?= $user->name ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= ucwords($user->role) ?></td>
                                <td><?= $user->address ?></td>
                                <td><?= date("M d, Y", strtotime($user->created_at)) ?></td>
                                <td>
                                    <a href="user_edit.php?edit_user_id=<?=$user->id?>" 
                        			      class="btn-sm btn btn-outline-dark rounded-0">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" 
                                    data-toggle="modal" data-target="#showDeleteUserModal<?=$user->id?>">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                    <?php include('user_delete.php'); ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                                        
                <?php $total_page = get_paginator('users'); ?>
                <?php if( $total_page > 1 ): ?>
                <div class="card-footer">
                    <nav> 
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item <?= $page > 1 ? '' : 'disabled'; ?>">
                                <a class="page-link disabled" href="user_index.php?page=<?= $page - 1 ?>">
                                    <span>&larr;</span>
                                </a>
                            </li>
                            <?php for($i=1; $i<=$total_page; $i++): ?>
                            <?php $active = $i == $page ? 'active' : ''; ?>
                            <li class="page-item <?= $active ?>">
                                <a class="page-link" href="user_index.php?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                            <?php endfor; ?>
                            <li class="page-item <?= $total_page > $page ? '' : 'disabled'; ?>">
                                <a class="page-link" href="user_index.php?page=<?= $page + 1 ?>">
                                    <span>&rarr;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php endif; ?>
            </div>
            <!-- End of card -->

        </main>

    </div>
</div>

<?php include('include_admin/footer.php'); ?>


<?php 
$title = 'Profile | Index'; 
$profile_active ='active';

include('include_admin/header.php');
include('include_admin/nav.php');

$user = get_user($auth_user->id);
?>

<div class="container-fluid">
    <div class="row">

        <?php include('include_admin/sidebar.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h6>User Profile</h6>
            </div>

            <div class="row">
                <div class="col-md-12 mb-5">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <p class="mb-0 py-1 card-ttl">
                                    Personal Info
                                </p>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-row align-items-center">
                                <div class="col-3">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                        <?php if($user->image): ?>
                                            <img src="uploads/user/<?=$user->image?>" alt="<?= ucwords($user->name); ?>"
                                            class="rounded-circle img-fluid" width="150">
                                        <?php else: ?>
                                            <img src="https://ui-avatars.com/api/?background=006699&color=fff&name=<?= $user->name ?>" 
                                            class="img-fluid rounded-circle align-self-center mr-3" width="150" height="150">
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-9 border-left">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <table class="table table-borderless personal-info-tbl">
                                                <tr>
                                                    <td>
                                                        <span class="text-center"><i class="far fa-user"></i></span>
                                                        Username
                                                    </td>
                                                    <td>
                                                        : <span><?= $user->name ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="text-center"><i class="far fa-envelope"></i></span>
                                                        Email Address
                                                    </td>
                                                    <td>
                                                        : <span><?= $user->email ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="text-center"><i class="far fa-map"></i></span>
                                                        Address
                                                    </td>
                                                    <td>
                                                        : <span><?= $user->address ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="text-center"><i class="fas fa-history"></i></span>
                                                        Joined Date
                                                    </td>
                                                    <td>
                                                        : <span><?= date("M d, Y", strtotime($user->created_at)) ?></span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="profile_edit.php?edit_profile_id=<?=$user->id?>" class="btn btn-sm btn-outline-dark float-right rounded-0">
                                <i class="fa fa-edit"></i>&nbsp;
                                Edit Profile
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </main>

    </div>
</div>

<?php include('include_admin/footer.php'); ?>
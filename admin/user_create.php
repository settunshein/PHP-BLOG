<?php 
$title = 'User | Create';
$user_active = 'active'; 

include('include_admin/header.php');
include('include_admin/nav.php');

if( $auth_user->role != 'admin' ){
    redirect_back();
}

insert_user();
?>

<div class="container-fluid">
    <div class="row">
        
        <?php include('include_admin/sidebar.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h5">User Management</h1>
            </div>

            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" id="createUserForm"> 
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="card-custom-title">Create User Form</span>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            Username <span class="font-weight-bold text-danger">*</span>
                                        </label>
                                        <input name="name" id="name" type="text" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">
                                            Email Address <span class="font-weight-bold text-danger">*</span>
                                        </label>
                                        <input name="email" id="email" type="email" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">
                                            Password <span class="font-weight-bold text-danger">*</span>
                                        </label>
                                        <input name="password" id="password" type="password" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="role" for="role">
                                            User Role <span class="font-weight-bold text-danger">*</span>
                                        </label>
                                        <select class="custom-select custom-select-sm" id="role" name="role">
                                            <option selected disabled class="text-muted">Select User Role</option>
                                            <?php $roles = ['admin', 'author']; ?>
                                            <?php foreach($roles as $key => $role): ?>
                                            <option value="<?= $role ?>"> 
                                                <?= ucwords($role) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="address">
                                            Address
                                        </label>
                                        <textarea name="address" id="address" cols="30" rows="5" class="form-control form-control-sm"></textarea>
                                    </div>
                                </div>
                            </div><!-- End of card-body -->
                        </div>
                    </div><!-- End of col-md-8 -->

                    <div class="col-md-4">
                        <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="table-title">User Image</span>
                                        <a href="user_index.php" class="btn btn-sm btn-outline-dark rounded-0">
                                            <i class="fas fa-arrow-circle-left"></i>&nbsp;
                                            B A C K
                                        </a>
                                    </div>
                                </div><!-- End of card-header -->

                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input type="file" class="dropify" name="image" id="image">
                                        </div>
                                    </div>
                                </div><!-- End of card-body -->

                                <div class="card-footer">
                                    <button class="btn btn-sm btn-outline-dark rounded-0 float-right" type="submit" name="insert_user">
                                        <i class="fa fa-edit"></i>&nbsp;
                                        Create
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of col-md-4 -->
                </div><!-- End of row -->
            </form>
            <!-- End of card -->
        </main>

    </div>
</div>
<?php include('include_admin/footer.php'); ?>

<script>
    $(document).ready(function () {
    	$('#createUserForm').validate({
			rules: {
                "name"     : "required",
				"email"    : "required",
                "password" : "required",
                "role"     : "required",
                "address"  : "required"
			},

			messages: {
                "name"     : "Please Fill Username Field",
				"email"    : "Please Fill Email Address Field",
                "password" : "Please Fill Password Field",
                "role"     : "Please Fill Role Field",
                "address"  : "Please Fill Address Field",
			},

			errorElement: 'span',
			errorPlacement: function (error, element) {
	    		error.addClass('invalid-feedback');
	    		element.closest('.form-group').append(error);
			},

		    highlight: function (element, errorClass, validClass) {
		        $(element).addClass('is-invalid');
		    },
		    
		    unhighlight: function (element, errorClass, validClass) {
		        $(element).removeClass('is-invalid');
		    }
		});
	});
</script>
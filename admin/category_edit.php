<?php 
$title = 'Category | Edit'; 
$category_active ='active';

include('include_admin/header.php');
include('include_admin/nav.php');

if( $auth_user->role != 'admin' ){
    redirect_back();
}

if( isset($_GET['edit_category_id']) ){
    $id = $_GET['edit_category_id'];
    $category = get_category($id);
}

edit_category();
?>

<div class="container-fluid">
    <div class="row">
        
        <?php include('include_admin/sidebar.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h5">Category Management</h1>
            </div>

            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" id="editCategoryForm"> 
                <input type="hidden" name="id" value="<?= $category->id ?>">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="table-title">Edit Category Form</span>
                        <a href="category_index.php" class="btn btn-sm btn-outline-dark rounded-0">
                            <i class="fas fa-arrow-circle-left"></i>&nbsp;
                            B A C K
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">
                                    Category Title <span class="font-weight-bold text-danger">*</span>
                                </label>
                                <input name="title" id="title" type="text" class="form-control form-control-sm" value="<?= $category->title ?>">
                            </div> 

                            <div class="form-group col-md-6">
                                <label for="logo">
                                    Category Logo <span class="font-weight-bold text-danger">*</span>
                                </label>
                                <input name="logo" id="logo" type="text" class="form-control form-control-sm" value="<?= $category->logo ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="desc">
                                    Category Description
                                </label>
                                <textarea name="description" id="desc" cols="30" rows="5" class="form-control form-control-sm"><?= $category->description ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-sm btn-outline-dark rounded-0 float-right" type="submit" name="edit_category">
                            <i class="fa fa-edit"></i>&nbsp;
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </main>

    </div>
</div>
<?php include('include_admin/footer.php'); ?>


<script>
    $(document).ready(function () {
    	$('#editCategoryForm').validate({
			rules: {
				"title": "required",
			},

			messages: {
				"title": "Please Enter Category Title",
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
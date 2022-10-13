<?php 
$title = 'Post | Create'; 
$post_active = 'active';

include('include_admin/header.php');
include('include_admin/nav.php');

if( isset($_GET['edit_post_id']) ){
    $id   = $_GET['edit_post_id'];
    $post = get_post($id);
}

edit_post();
?>

<div class="container-fluid">
    <div class="row">
        
        <?php include_once('include_admin/sidebar.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h5">Post Management</h1>
            </div>

            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" id="editPostForm">
                <input type="hidden" name="user_id" value="<?= $auth_user->id ?>"> 
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="card-custom-title">Edit Post Form</span>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-row">
                                    <input type="hidden" name="id" value="<?= $post->id ?>">
                                    <input type="hidden" name="old_image" value="<?= $post->image ?>">
                                    <div class="form-group col-md-6">
                                        <label for="category_id" style="font-size: 12.5px;">
                                            Category Name <span class="font-weight-bold text-danger">*</span>
                                        </label>
                                        <select class="custom-select custom-select-sm" id="category_id" name="category_id">
                                            <option selected disabled class="text-muted">Select Post Category</option>
                                            <?php $categories = get_all_categories(); ?>
                                            <?php foreach($categories as $category): ?>
                                            <option value="<?= $category->id ?>"
                                            <?= $category->id == $post->category_id ? 'selected' : '' ; ?>>
                                                <?= $category->title ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="title">
                                            Post Title <span class="font-weight-bold text-danger">*</span>
                                        </label>
                                        <input name="title" id="title" type="text" class="form-control form-control-sm" value="<?= $post->title ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="status" for="status">
                                            Post Status <span class="font-weight-bold text-danger">*</span>
                                        </label>
                                        <select class="custom-select custom-select-sm" id="status" name="status">
                                            <option selected disabled class="text-muted">Select Post Status</option>
                                            <option value="0" <?= $post->status == 0 ? 'selected' : '' ?>>Pending</option>
                                            <option value="1" <?= $post->status == 1 ? 'selected' : '' ?>>Published</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="post_tag">
                                            Post Tag <span class="font-weight-bold text-danger">*</span>
                                        </label>
                                        <input name="post_tag" id="post_tag" type="text" class="form-control form-control-sm" value="<?= $post->post_tag ?>">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="content">
                                            Post Content <span class="font-weight-bold text-danger">*</span>
                                        </label>
                                        <textarea name="content" id="content" cols="30" rows="10" class="form-control form-control-sm"><?= $post->content ?></textarea>
                                    </div>
                                </div>
                            </div><!-- End of card-body -->
                        </div>
                    </div><!-- End of col-md-8 -->

                    <div class="col-md-4">
                        <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="table-title">Post Image</span>
                                        <a href="post_index.php" class="btn btn-sm btn-outline-dark rounded-0">
                                            <i class="fas fa-arrow-circle-left"></i>&nbsp;
                                            B A C K
                                        </a>
                                    </div>
                                </div><!-- End of card-header -->

                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input type="file" class="dropify" name="image" id="image"
                                            data-default-file="<?= isset($post->image) ? 'uploads/post/'.$post->image : '' ?>">
                                        </div>
                                    </div>
                                </div><!-- End of card-body -->

                                <div class="card-footer">
                                    <button class="btn btn-sm btn-outline-dark rounded-0 float-right" type="submit" name="edit_post">
                                        <i class="fa fa-edit"></i>&nbsp;
                                        Update
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
    	$('#editPostForm').validate({
			rules: {
                "category_id": "required",
				"title"      : "required",
                "status"     : "required",
                "post_tag"   : "required",
                "content"    : "required",
			},

			messages: {
                "category_id" : "Please Fill Category Name Field",
				"title"       : "Please Fill Post Title Field",
                "status"      : "Please Select Post Status Option",
                "post_tag"    : "Please Fill Tag Field",
                "content"     : "Please Fill Post Content Field",
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
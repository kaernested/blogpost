<?php

function get_checked($field_name)
{
    global $blog_categories;
    if (in_array($field_name, $blog_categories)) {
        echo 'checked';
    }
}

// Initialize field value variables
$blog_title = $blog_text = $blog_status = '';
$blog_categories = array();

// Initialize error variables
$title_error = $text_error = $categories_error = '';

// Initialize error count
$error_count = 0;

// Initialize success indicator
$success = false;

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $blog_title = $_POST['blog_title'];
    $blog_text = $_POST['blog_text'];
    $blog_status = $_POST['blog_status'];
    if (isset($_POST['blog_categories'])) {
        $blog_categories = $_POST['blog_categories'];
    } else {
        $blog_categories = array();
    }

    // Do some validation
    $title_max_length = 50;
    if (empty($_POST['blog_title'])) {
        $title_error = 'The job title cannot be empty';
        // $error_count = $error_count + 1;
        $error_count++;
    } else if (strlen($_POST['blog_title']) < 7) {
        $title_error = 'The title is too short';
        $error_count++;
    } else if (strlen($_POST['blog_title']) > $title_max_length) {
        $characters_over_limit = strlen($_POST['blog_title']) - $title_max_length;
        $title_error = "The title is $characters_over_limit characters too long.";
        $error_count++;
    }

    if (empty($_POST['blog_text'])) {
        $text_error = 'The job description cannot be empty';
        $error_count++;
    }

    if (!isset($_POST['blog_categories'])) {
        $categoriess_error = 'Pick at least one perk';
        $error_count++;
    }

    // If there are no errors reset field values
    if ($error_count === 0) {
        $blog_title = $blog_text = $job_salary = $blog_status = '';
        $blog_categories = array();


        // Get jobs file
        $blogs_str_in = @file_get_contents('blogposts.json'); // Returns false if file does not exist
        if (!$blogs_str_in) {
            $blogs = [];
        } else {
            $blogs = json_decode($blogs_str_in, true);
        }

        // Add new job to jobs array
        array_push($blogs, $_POST);

        // Convert job to JSON format
        $blogs_str_out = json_encode($blogs, true);

        // Save the job JSON string to jobs.json
        file_put_contents('blogposts.json', $blogs_str_out);

        // Indicate that the job got added successfully
        $success = true;
    }
}

$page_title = 'Add a blog post';
$page_id = 'add_blog';
include('header.php');
?>

<div id="addPost" class="addPost">
    <h1 class="">Add a blog post</h1>

    <?php if ($success) : ?>
        <div class="alertSuccess" role="alert">
            <div class="alertText">
                Blog posted!
            </div>
            <img src="images/undraw_confirmation_2uy0.svg">
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo uniqid(); ?>">

        <div class="form-group mb-4">
            <label>Blog title</label>
            <br>
            <input type="text" name="blog_title" class="inputCustom" placeholder="title of the job..." value="<?php echo $blog_title; ?>">
            <?php if (!empty($title_error)) : ?>
                <div class="alert alert-danger mt-2"><?php echo $title_error; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group mb-4">
            <label>Post</label>
            <br>
            <textarea name="blog_text" class="textareaCustom" placeholder="Describe the position..."><?php echo $blog_text; ?></textarea>
            <?php if (!empty($text_error)) : ?>
                <div class="alert alert-danger mt-2"><?php echo $text_error; ?></div>
            <?php endif; ?>
        </div>

        <div class="">
            <label>Status</label>
            <br>
            <div class="custom-select">

                <select name="blog_status" value="<?php echo $blog_status; ?>">
                    <option value="Publish">Publish</option>
                    <option value="Draft">Draft</option>
                </select>
            </div>
        </div>

        <div class="form-group mb-4">
            <label>categories</label>
            <div class="form-check">
                <input type="checkbox" name="blog_categories[]" value="Design" class="form-check-input" <?php get_checked('Design'); ?>> Design <br>
                <input type="checkbox" name="blog_categories[]" value="Programming" class="form-check-input" <?php get_checked('Programming '); ?>> Programming <br>
            </div>
            <?php if (!empty($categoriess_error)) : ?>
                <div class="alert alert-danger mt-2"><?php echo $categoriess_error; ?></div>
            <?php endif; ?>
        </div>

        <button type="submit" name="submit" class="submitBtn">Add post</button>
    </form>
</div>
</div>

<?php include('footer.php'); ?>
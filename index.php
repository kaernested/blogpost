<?php
$file_str = @file_get_contents('blogposts.json');
if (!$file_str) {
    $blogs = [];
} else {
    $blogs = json_decode($file_str, true);
}

function deletePost($blog)
{
    if (isset($_GET['id']))
        $id = (int) $_GET['id'];
}

$page_title = 'Blog Posts';
include('header.php');
?>

<div class=" ">
    <h1 class="">All blog posts</h1>

    <?php if (empty($blogs)) : ?>
        <div class="alertWarning" role="alert">
            <div class="alertText">
                Time to add some jobs.
            </div>
            <img src="images/undraw_a_moment_to_relax_bbpa.svg">
        </div>
    <?php endif; ?>

    <?php if (!empty($blogs)) : ?>
        <div class="blogWrapper">
            <?php foreach ($blogs as $blog) : ?>
                <div class="blog">
                    <button class="deleteBtn" value="delete" onclick="deletePost()">X</button>
                    <h3><?php echo $blog['blog_title']; ?></h3>
                    <p><?php echo $blog['blog_text']; ?></p>
                    <div class="extra-info">
                        <span><strong>Monthly salary:</strong> <?php echo number_format((int) $job['job_salary'], 0, ',', '.'); ?> ISK</span>
                        <span><strong>Status:</strong> <?php echo $blog['blog_status']; ?></span>
                        <span><strong>categories:</strong> <?php echo join(', ', $blog['blog_categories']); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>
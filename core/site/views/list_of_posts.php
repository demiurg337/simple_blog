<div class="posts-list-block">
    <?php foreach ($posts as $post): ?>
        <div class="post-block">
            <h1>
                <?php echo $post->title; ?>
            </h1>
            <div class="post-teaser">
                <?php echo $post->teaser; ?>
            </div>
            <a href="#">
                Количество комментариев: <?php echo $post->count_comments ?>
            </a>
        </div>
    <?php endforeach; ?>

</div>



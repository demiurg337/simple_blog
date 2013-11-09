<p>
    Список постов:
</p>
<table class="content-table">
    <?php foreach($posts as $post) : ?>
        <tr>
            <td>
                <?php echo $post->id; ?>
            </td>
            <td>
                <?php echo $post->title; ?>
            </td>
            <td>
                <?php echo substr($post->content, 0, 700).'...'; ?>
            </td>
            <td>
                <?php echo  $post->count_comments; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

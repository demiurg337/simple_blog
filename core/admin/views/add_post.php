<form action="<?php echo $this->getUrl('post/add'); ?>" method="post">
    <input type="text" name="title">
    <br>
    <textarea name="content">
    </textarea>
    <br>
    <input type="submit" value="Send"/>
</form>

<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">

tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

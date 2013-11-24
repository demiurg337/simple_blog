<h1>
    Добавить статью    
</h1>


<?php if(isset($successMsg)): ?>
    <div class="success-message-container">
        <?php echo $successMsg; ?>
    </div>
<?php endif; ?>
<?php if(isset($errorMsg)): ?>
    <div class="error-message-container">
        <?php echo $errorMsg; ?>
    </div>
<?php endif; ?>

<form action="<?php echo $this->getUrl('post','add'); ?>" method="post">
    <p>
    Заголовок<span class="red">*</span>:
        <br/>
        <input type="text" name="title">
    </p>
    
    <p>
        Текст статьи<span class="red">*</span>:
        <br>
        <textarea name="content">
        </textarea>
    </p>
    <br>
    <input type="submit" value="Сохранить"/>
</form>

<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">

tinymce.init({
    selector: "textarea",
    plugins: [        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

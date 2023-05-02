<h2>Content</h2>
<form method="POST">
    <div>
        <label for="content-title">Title:</label>
        <input type="text" id="content-title" name="content_title"
            value="<?php echo esc_attr(get_option('sendgrid_content_title')) ?>">
    </div>
    <div>
        <label for="content-description">Description:</label>
        <textarea rows="4" cols="60" id="content-description"
            name="content_description"><?php echo esc_attr(get_option('sendgrid_content_description')) ?>'</textarea>
    </div>
    <button type="submit" class="button">Save Content</button>
</form>
<hr>
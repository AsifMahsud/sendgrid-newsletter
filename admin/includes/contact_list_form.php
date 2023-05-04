<h2>Contact Lists</h2>
<form method="post">
    <div>
        <label for="contact-list">Select Contact List:</label>
        <select id="contact-list" name="contact_list" required>
            <option value="">Select Contact List</option>
            <?php foreach ($lists->result as $list): ?>
                <?php if ($list->id === $selected_list): ?>
                    <option value="<?= $list->id ?>" selected><?= $list->name ?></option>
                <?php else: ?>
                    <option value="<?= $list->id ?>"><?= $list->name ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="sg_newsletter_field">Select Newsletter Field:</label>
        <select id="sg_newsletter_field" name="sg_newsletter_field" required>
            <option value="">Select Newsletter Field</option>
            <?php foreach ($fields->custom_fields as $field): ?>
                <?php if ($field->id === get_option('sg_newsletter_field')): ?>
                    <option value="<?= $field->id ?>" selected><?= $field->name ?></option>
                <?php else: ?>
                    <option value="<?= $field->id ?>"><?= $field->name ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="button">Save Contact List & Newsletter field</button>
    <div class="sg_newsletter_info">Select a Contact list and a custom text field from your Sendgrid account</div>
</form>
<hr>

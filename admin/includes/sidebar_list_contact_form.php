<h2>Contact Lists</h2>
<form method="post">
    <div>
        <label for="contact-list">Select Contact List:</label>
        <select id="contact-list" name="sidebar_list_contact_form" required>
            <option value="">Select Contact List</option>
            <?php foreach ($lists->result as $list): ?>
                <?php if ($list->id === $sidebar_selected_list): ?>
                    <option value="<?= $list->id ?>" selected><?= $list->name ?></option>
                <?php else: ?>
                    <option value="<?= $list->id ?>"><?= $list->name ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="button">Save Contact List</button>
    <div class="sg_newsletter_info">Select a Contact list from your Sendgrid account</div>
</form>
<hr>

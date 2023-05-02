<h2>SendGrid API Key</h2>
<form method="post">
    <label for="api_key">API Key:</label>
    <input type="text" id="api_key" name="api_key" placeholder="**************************" required>
    <button type="submit" class="button">
        <?php echo $api_key ? 'Update' : 'Save'; ?> API Key
    </button>
    <?php echo $api_key ? '<p>Your API key is successfully saved</p>' : '<p>Please add a valid sendgrid API key</p>'; ?>
</form>
<hr>
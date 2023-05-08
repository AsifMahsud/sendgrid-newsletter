<?php
$options = $wpdb->get_results(
    "SELECT * FROM $table_name"
);
?>
<h3>Newsletter Options</h3>
<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Frequency</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($options) {
            foreach ($options as $option) {
                echo '<tr>';
                echo '<td><img src="' . esc_attr($option->image) . '" width="200"></td>';
                echo '<td>' . wp_kses_post($option->title) . '</td>';
                echo '<td>' . wp_kses_post($option->description) . '</td>';
                echo '<td>' . esc_html($option->frequency) . '</td>';
                echo '<td>
                <form method="POST">
                    <input type="hidden" name="delete_option" value="' . esc_attr($option->id) . '">
                    <button type="submit" class="delete-option">Delete</button>
                </form>
            </td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>
<hr>
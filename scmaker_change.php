
<?php
/*
$url = $_SERVER['REQUEST_URI'];
$parsed = parse_url($url);
$query = $parsed['query'];

parse_str($query, $params);

unset($params['page_number']);
$string = http_build_query($params);
$stuff = explode( '=', $string);
echo $stuff[1];
*/
$name;
$url;

if ( ! empty( $_POST['name'] && !empty($_POST['content']) ) ) {

  $name = $scmaker->stringSafe($_POST['name']);
  $content = $scmaker->stringSafe($_POST['content']);
  $scmaker->add_Item($name, $content);
}
else if (!empty($_POST['delete']))
{
  $scmaker->delete_Item($_POST['delete']);
}
else if (!empty($_POST['name_update']) && !empty($_POST['content_update']))
{
  $name = $scmaker->stringSafe($_POST['name_update']);
  $content = $scmaker->stringSafe($_POST['content_update']);
  $scmaker->update_Item($_POST['update'], $name, $content);
}

?>
<div class="input-box">
  <form method="post" action="">

      <h4>Update Shortcode</h4>
      <label>Shortcode</label>
      <input type="text" name="name_update" />
      <label>Content</label>
      <input type="text" name="content_update" />
      <select name="update">
        <option value="default">Default</option>
        <?php $stuff = $scmaker->read_DB(); ?>
        <?php foreach ($stuff as $row): ?>
        <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
          <?php endforeach; ?>
    </select>
  </br>

    <?php submit_button('Change shortcode') ?>

  </form>
</div>

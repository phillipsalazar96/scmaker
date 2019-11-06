<?php
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
 <div class="header-box">
  <h2>Short Code Maker!</h2>
</div>

<div class="input-area">
<div class="input-box">
<form method="post" action="">
    <h4>Add short code</h4>
    <label>Shortcode</label>
    <input type="text" name="name" />
    <label>Content</label>
    <input type="text" name="content" />
    <br/>
 <?php submit_button('Add shortcode') ?>

</form>
</div>
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
</div>
</br>
<br/>
<div class="link-box">
  <?php $stuff = $scmaker->read_DB(); ?>
  <?php foreach ($stuff as $row): ?>
    <Div class="link-row">
    <span class="input-row"><p>Shortcode: [<?php echo $row->name; ?>]</p></span>
    <span class="input-row"><p>content: <?php echo $row->content; ?></p></span>


    <form method="post" action="">
      <input type="hidden" name="delete" value="<?php echo $row->id ?>">
      <div class="delete-box">
      <?php submit_button('Delete shortcode') ?>
    </div>
  </form>

</div>
  <?php endforeach; ?>
</div>

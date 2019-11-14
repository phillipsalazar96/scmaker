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
 <h3>Make a Shortcode!</h3>
 <select name="update" onchange="FormSelecting()">
   <option value="Text">Text</option>
   <option value="Image">image</option>
   <option value="Link">Link</option>
   <option value="code">code</option>
   <option value="Link">Label</option>
   <option value="Button">Button</option>
   <option value="bar">Bar</option>
   <option value="video">video</option>
   <option value="audio">audio</option>
</select>

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

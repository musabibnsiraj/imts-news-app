<?php
require_once '../../models/Category.php';
$c = new Category();
$category = $c->getById($_GET['id']);
?>
<form action="save_category.php" method="post">
    <input type="hidden" name="id" value="<?php echo $category['id'];?>" />
    <input type="text" name="name" value="<?php echo $category['name'];?>" />
    <input type="text" name="mobile" value="<?php echo $category['mobile'];?>"/>
    <button>Save</button>
</form>
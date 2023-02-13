<?php
require_once '../../models/Category.php';
$c = new Category();
$categories = $c->getAll();
?>

<a href="../../index.php">Home</a> |
<a href="frm_new_category.php">Add new category</a><br><br>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Mobile</th>
        <th>Action</th>
    </tr>
    <?php
    foreach($categories as $c)
    {
        ?>
        <tr>
            <td><?php echo $c['name'];?></td>
            <td><?php echo $c['mobile'];?></td>
            <td>
                <a href="frm_edit_category.php?id=<?php echo $c['id'];?>">Edit</a> | 
                <a href="delete.php?id=<?php echo $c['id'];?>">Delete</a> 
            </td>
        </tr>
        <?php
    }
    ?>
</table>
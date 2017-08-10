<?php
require_once('../vendor/autoload.php');
$connection = new Vivid('localhost', 'root', 'password', 'phonebook');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phonebook</title>
</head>
<body>
    <table>
        <tr>
            <td><a href="add-contact.php">add contact</a></td>
        </tr>
        <tr>
            <td>LASTNAME</td>
            <td>FIRSTNAME</td>
            <td>MOBILE NUMBER</td>
        </tr>
        <?php
        $results = $connection->table('user')
            ->get();
        foreach($results as $result):
        ?>
        <tr>
            <td><?php echo $result->last_name ?></td>
            <td><?php echo $result->first_name ?></td>
            <td><?php echo $result->mobile_number ?></td>
            <td><a href="edit.php?id=<?php echo $result->user_id ?>">Edit</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
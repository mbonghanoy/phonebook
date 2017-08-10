<?php
require_once('../vendor/autoload.php');
$connection = new Vivid('localhost', 'root', 'password', 'phonebook');
$user_id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phonebook</title>
</head>
<body>
    <?php
        if(isset($_POST['save'])){
            $newInput = [
                'first_name' => $_POST['firstName'],
                'last_name' => $_POST['lastName'],
                'middle_name' => $_POST['middleName'],
                'birthdate' => $_POST['birthDate'],
                'address_line1' => $_POST['addressLineOne'],
                'address_line2' => $_POST['addressLineTwo'],
                'city' => $_POST['city'],
                'province' => $_POST['province'],
                'mobile_number' => $_POST['mobileNumber'],
                'home_number' => $_POST['homeNumber']
            ];
            $user = $connection->table('user')
                ->edit($newInput, $user_id);
                header('Location: index.php');
            }
    ?>
    <form action="" method="POST">
        <table>
            <?php
            $results = $connection->table('user')
                ->where('user_id', $user_id);
            foreach($results as $result):
            ?>
            <tr>
                <td>First Name</td>
                <td><input type="text" value="<?php echo $result->first_name ?>" name="firstName"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" value="<?php echo $result->last_name ?>" name="lastName"></td>
            </tr>
            <tr>
                <td>Middle Name</td>
                <td><input type="text" value="<?php echo $result->middle_name ?>" name="middleName"></td>
            </tr>
            <tr>
                <td>Birthdate</td>
                <td><input type="text" value="<?php echo $result->birthdate ?>" name="birthDate"></td>
            </tr>
            <tr>
                <td>Address Line 1</td>
                <td><input type="text" value="<?php echo $result->address_line1 ?>" name="addressLineOne"></td>
            </tr>
            <tr>
                <td>Address Line 2</td>
                <td><input type="text" value="<?php echo $result->address_line2 ?>" name="addressLineTwo"></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" value="<?php echo $result->city ?>" name="city"></td>
            </tr>
            <tr>
                <td>Province</td>
                <td><input type="text" value="<?php echo $result->province ?>" name="province"></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><input type="text" value="<?php echo $result->mobile_number ?>" name="mobileNumber"></td>
            </tr>
            <tr>
                <td>Home Number</td>
                <td><input type="text" value="<?php echo $result->home_number ?>" name="homeNumber"></td>
            </tr>
            <tr>
                <td><input type="submit" name="save" value="save"></td>
                <td><a href="index.php">back</a></td>
            </tr>
            <?php endforeach ?>
        </table>
    </form>
</body>
</html>
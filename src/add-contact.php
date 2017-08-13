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
    <?php
    if(isset($_POST['submit'])){
        $data = [
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
            ->insert($data);
    }
    ?>
    <form action="add-contact.php" method="POST">
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="firstName"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lastName"></td>
            </tr>
            <tr>
                <td>Middle Name:</td>
                <td><input type="text" name="middleName"></td>
            </tr>
            <tr>
                <td>Birthdate:</td>
                <td><input type="text" name="birthDate"></td>
            </tr>
            <tr>
                <td>Address Line 1:</td>
                <td><input type="text" name="addressLineOne"></td>
            </tr>
            <tr>
                <td>Address Line 2:</td>
                <td><input type="text" name="addressLineTwo"></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input type="text" name="city"></td>
            </tr>
            <tr>
                <td>Province:</td>
                <td><input type="text" name="province"></td>
            </tr>
            <tr>
                <td>Mobile Number:</td>
                <td><input type="text" name="mobileNumber"></td>
            </tr>
            <tr>
                <td>Home Number:</td>
                <td><input type="text" name="homeNumber"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit"></td>
                <td><a href="index.php">back</a></td>
            </tr>
        </table>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Add Country</h1>
    <form action="addcustomer.php" method="POST">
        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br><br>
        <input type="text" placeholder="Name" name="Name">
        <br><br>
        <input type="date" placeholder="Birthdate" name="Birthdate">
        <br><br>
        <input type="email" placeholder="Email" name="Email">
        <br><br>
        <input type="text" placeholder="Country Code" name="CountryCode">
        <br><br>
        <input type="number" placeholder="OutsStanding Debt" name="OutstandingDebt">
        <br><br>
        <input type="submit">
    </form>
</body>

</html>

<?php
// echo 'hello1' . $_POST['CountryCode'] . $_POST['CountryName'];

if (!empty($_POST['CustomerID']) && !empty($_POST['Name']) && !empty($_POST['Birthdate']) && !empty($_POST['Email']) && !empty($_POST['CountryCode']) && !empty($_POST['OutstandingDebt'])):

    require 'connect.php';
    // echo 'hello2';

    $sql_insert = "insert into customer
                                    values (:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :OutstandingDebt)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindParam(':Name', $_POST['Name']);
    $stmt->bindParam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(':OutstandingDebt', $_POST['OutstandingDebt']);

    if ($stmt->execute()):
        $message = 'Suscessfully and new Customer';
    else:
        $message = 'Fail to add Customer';
    endif;
    echo $message;
    $conn = null;
endif;
?>
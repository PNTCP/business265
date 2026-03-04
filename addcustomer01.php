<?php
// echo 'hello1' . $_POST['CountryCode'] . $_POST['CountryName'];
require 'connect.php';
$sql_select = "SELECT * FROM country ORDER BY CountryCode DESC";
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Add Country</h1>
    <form action="addcustomer01.php" method="POST">
        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br><br>
        <input type="text" placeholder="Name" name="Name">
        <br><br>
        <input type="date" placeholder="Birthdate" name="Birthdate">
        <br><br>
        <input type="email" placeholder="Email" name="Email">
        <br><br>
        <label>Select a country code</label>
        <select name="CountryCode">
            <?php
            require 'connect.php';
            while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)):;
            ?>
                <option value="<?php echo $cc['CountryCode']; ?>">
                    <?php echo $cc["CountryName"]; ?>
                </option>
            <?php
            endwhile;
            ?>
        </select>
        <br><br>
        <input type="number" placeholder="OutsStanding Debt" name="OutstandingDebt">
        <br><br>
        <input type="submit">
    </form>
</body>

</html>
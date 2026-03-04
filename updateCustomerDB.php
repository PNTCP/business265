<?php
if (isset($_POST['CustomerID'])) {

    require 'connect.php';


    // $CustomerID = $_POST['CustomerID'];
    // $Name = $_POST['Name'];
    // $Email = $_POST['Email'];

    // echo 'CustomerID = ' . $CustomerID;
    // echo 'Name = ' . $Name;
    // echo 'Email = ' . $Email;


    $stmt = $conn->prepare(
        'UPDATE customer
        SET Name=:Name, Email=:Email, Birthdate=:Birthdate, CountryCode=:CountryCode, OutstandingDebt=:OutstandingDebt  WHERE CustomerID=:CustomerID'
    );
    $stmt->bindparam(':Name', $_POST['Name']);
    $stmt->bindparam(':Email', $_POST['Email']);
    $stmt->bindparam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindparam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindparam(':OutstandingDebt', $_POST['OutstandingDebt']);
    $stmt->bindparam(':CustomerID', $_POST['CustomerID']);
    $stmt->execute();


    require 'icon_success.php';
    $conn = null;
}

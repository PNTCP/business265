<html>
<head>
<title>Show Customer Information</title>
</head>
<body>
<?php
try {
    require 'connect.php';
    $sql = "SELECT * FROM Customer";
    $stmt = $conn->prepare($sql);
    $stmt->execute();


    //แบบที่ 1
    while ($result = $stmt->fetch(PDO::FETCH_NUM)) {
        echo '<br>' .
            'รหัสลูกค้า : ' .
            $result[0] .
            ' วันเกิด : ' .
            $result[2] .
            ' ยอดหนี้ : ' .
            $result[5];
    }


} catch (PDOException $e) {
    echo 'ไม่สามารถประมวลผลข้อมูลได้ : ' . $e->getMessage();
}


$conn = null;
?>


</body>
</html>

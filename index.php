<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>รายชื่อลูกค้า <a href="addcustomer01.php" class="btn btn-info float-end">+เพิ่มข้อมูล</a></h3>
                <table class="table table-striped table-hover table-responsive table-boardered">
                    <thead align="center">
                        <tr>
                            <th width="10%">รหัสลูกค้า</th>
                            <th width="20%">ชื่อ-นามสกุล</th>
                            <th width="20%">วันเดือนปีเกิด</th>
                            <th width="25%">อีเมลลฺ</th>
                            <th width="10%">ประเทศ</th>
                            <th width="10%">ยอดหนี้</th>
                            <th width="5%">แก้ไข</th>
                            <th width="5%">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'connect.php';
                        $sql = "SELECT * 
                                FROM customer 
                                INNER JOIN country 
                                ON customer.CountryCode = country.CountryCode
                                ORDER BY CustomerID";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $r) { ?>
                            <tr>
                                <td><?= $r['CustomerID'] ?></td>
                                <td><?= $r['Name'] ?></td>
                                <td><?= $r['Birthdate'] ?></td>
                                <td><?= $r['Email'] ?></td>
                                <td><?= $r['CountryName'] ?></td>
                                <td><?= $r['OutstandingDebt'] ?></td>
                                <td><a href="updateCustomerForm.php?CustomerID=<?= $r['CustomerID'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="deleteCustomer.php?CustomerID=<?= $r['CustomerID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันข้อมูลการลบ !!');">ลบ</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
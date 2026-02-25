
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="select02.css">
</head>
<body>
    <?php
        require "connect.php";
        // ลองให้โชว์ข้อมูล customer
        $sql = "SELECT * FROM customer c INNER JOIN country co 
        ON c.CountryCode = co.CountryCode"; 
        $stmt = $conn->prepare($sql);
        $stmt->execute();


        // $result = $stmt->fetchAll();
        // print_r($result);

    ?>
      <table width="800" border="1" style="border:blue">
          <tr class = "headTr">
              <th width="90">
                  <div align="center">รหัสผู้ใช้ </div>
              </th>
              <!-- <th width="140">
                  <div align="center">ชื่อ </div>
              </th> -->
              <th width="120">
                  <div align="center">วันเกิด </div>
              </th>
                <th width="50">
                  <div align="center">ประเทศ </div>
              </th>
              <th width="100">
                  <div align="center">อีเมล์ </div>
              </th>

              <th width="70">
                  <div align="center">ยอดหนี้</div>
              </th>
          </tr>

          <?php
          while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>

              <tr class = "columnTr">
                  <td>

                     <a href="detail.php?CustomerID=<?php echo $result['CustomerID'];?>">
                        <?php echo $result['CustomerID']?>
                     </a>

                  </td>

                  <!-- <td>
                      <?php echo $result["Name"]; ?>
                  </td> -->

                  <td><?php echo $result["Birthdate"];  ?></div>
                  </td>
                  <td><?php echo $result["CountryName"]?></div>
                  <td><?php echo $result["Email"]  ?></td>

                  </td>
                  <td><?php echo $result["OutstandingDebt"]; ?></td>

              </tr>

          <?php
          }
          ?>

      </table>
    

</body>
</html>
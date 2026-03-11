<?php
    require 'connect.php';

    $cid = $_GET["CustomerID"];
    $sql = "SELECT * FROM customer c INNER JOIN country co
        ON c.CountryCode = co.CountryCode where CustomerID = :customerID";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':customerID', $cid);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // while ($row = $stmt->fetch()){
    //     echo $row['CustomerID'] . $row['Name'] . $row['OutstandingDebt'] 
    //     . $row['CountryName'] . $row['Email'] ."<br/>";
    // }

    $conn = null;
?>
      <table width="800" border="1" style="border:blue">
          <tr class = "headTr">
              <th width="90">
                  <div align="center">รหัสผู้ใช้ </div>
              </th>
              <th width="120">
                  <div align="center">ชื่อ </div>
              </th>
                <th width="50">
                  <div align="center">ยอดหนี้ </div>
              </th>
              <th width="100">
                  <div align="center">ประเทศ </div>
              </th>

              <th width="70">
                  <div align="center">อีเมล์</div>
              </th>
          </tr>

          <?php
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
            ?>
                    <tr class = "columnTr">
                  <td>
                     <a href="detail.php?CustomerID=<?php echo $row['CustomerID'];?>">
                        <?php echo $row['CustomerID']?>
                     </a>
                  </td>

                  <td>
                      <?php echo $row["Name"]; ?>
                  </td>

                    <td>
                        <?php echo $row["OutstandingDebt"]; ?>
                    </td>

                  <td>
                        <?php echo $row["CountryName"]?>
                    </td>

                  <td>
                        <?php echo $row["Email"]  ?>
                    </td>
              </tr>
    <?php
        }
    ?>
          
    </table>
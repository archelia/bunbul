<?php
/**
 * Created by PhpStorm.
 * User: lia
 * Date: 3/23/15
 * Time: 10:56 AM
 */

session_start();
if(!isset($_SESSION["user"])){
    header('Location: ./index.php');
}
include 'header.php';
include '../conn.php';

$batas = 20;
$halaman=$_GET['halaman'];
if (empty($halaman)) {
    $posisi = 0;
    $halaman = 1;
} else {
    $posisi = ($halaman - 1) * $batas;
}

if(isset($_GET['submit'])){
    $key = $_GET['key'];
    $sql = "select * from customer_subscribe where gender like '%$key%' or email like '%$key%'";
    $query = mysql_query($sql);
}
else
{
    $sql = "SELECT * FROM customer_subscribe";
    $query = mysql_query($sql);
}
$jumlah = mysql_num_rows($query);
$sql2 = $sql." limit $posisi,$batas";
$query2 = mysql_query($sql2);
?>
<div class="container subscribed">
        <h2>Subscribed Customers</h2>
        <div class="search">
            <form method="GET" action="">
                <ul class="form-list">
                    <li class="sp-search">
                        <input type=text name="key" id="key" placeholder="Search any content here">
                        <input type="submit" name="submit" id="submit" value="Search" class="button">
                    </li>
                </ul>
            </form>
        </div>
        <div class="list">
            <table width="100%" class="data-tabel customer-subscribe">
                <colgroup>
                    <col width=""/>
                    <col width=""/>
                    <col width=""/>
                    <col width=""/>
                </colgroup>
                <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $n = $posisi;
                    while ($row=mysql_fetch_array($query2)){
                        $n++;
                        echo "<tr>";
                        echo "<td>$n</td>";
                        echo "<td>$row[email]</td>";
                        echo "<td>$row[gender]</td>";
                        echo "<td>$row[date_subscribe]</td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <ul>
                <?php
                $jmlhalaman=ceil($jumlah/$batas);

                for($i=1;$i<=$jmlhalaman;$i++)
                    if ($i != $halaman)
                    {
                        echo "<li><a href=$file?halaman=$i&key=$key&submit=Search>$i</a></li>";
                    }
                    else
                    {
                        echo "<li><b>$i</b></li>";
                    }
                ?>

            </ul>
            <p>Page <?php echo $halaman; ?></p>
            <p>Showing <?php if($jumlah<$batas) {echo $jumlah;} else {echo $batas;} ?><?php echo " from total ".$jumlah." data";?></p>
        </div>
        <div class="control">
            <button class="button" onClick="location.href='download-subscribed.php'">Download to CSV</button>
        </div>
</div>
<?php
include 'footer.php';
?>
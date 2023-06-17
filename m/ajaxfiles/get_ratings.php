<?php 
$conn = mysqli_connect('localhost','sensejgz_salon1234','9AoGJ}E?I5Cg', 'sensejgz_salon_db');
    $sql = "SELECT `feed_id`, `feed_name`, `feed_mobile`, `feed_message`, `feed_rating`, `feed_date`, `feed_time` FROM `feedback` ORDER BY feed_id DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $output  =  "";
        $i = '1';
        while ($row = mysqli_fetch_assoc($result)) {
            $output  .=  "<tr>
                            <td>{$i}</td>
                            <td>{$row['feed_date']}</td>
                            <td>{$row['feed_name']}</td>
                            <td class='text-success'>{$row['feed_rating']} Star</td>
                            <td>{$row['feed_message']}</td>
                            <td>{$row['feed_mobile']}</td>
                            <td>{$row['feed_time']}</td
                          </tr>";
                        $i++; 
        }
        echo $output;
    } else {
        echo "No bookings are available";
    }
//SELECT `feed_id`, `feed_name`, `feed_mobile`, `feed_message`, `feed_rating`, `feed_date`, `feed_time` FROM `feedback` WHERE 1

?>
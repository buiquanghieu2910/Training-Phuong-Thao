<?php

$diem = 8;
if ($diem >= 8 && $diem <= 10) {
    echo "Học sinh giỏi";
} else {
    if ($diem >= 6.5 && $diem < 8) {
        echo "Học sinh khá";
    } else {
        if ($diem >= 5 && $diem < 6.5) {
            echo "Học sinh trung bình";
        } else {
            if ($diem >= 3.5 && $diem < 5) {
                echo "Học sinh yếu";
            } else {
                if ($diem < 3.5 && $diem >= 0) {
                    echo "Học sinh kém";
                } else {
                    echo "Điểm không hợp lệ";
                }
            }
        }
    }
}


// Bài 7
$day_so = array(1, 3, 5, 2, 6, 9, 10, 4, 8, 6, 7);
$max = $day_so[0];
foreach ($day_so as $so) {
    if ($so > $max) {
        $max = $so;
    }
}
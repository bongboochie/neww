<?php 
    session_start();
    $_SESSION['manv'] = $_GET['manv']; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <title>SỬA</title>
</head>

<body>
    <div class="container">
        <?php
        #bước 1 connect
            include('config.php');
        #bước 2 lấy mã nhân viên cần sửa
            if(isset($_GET['manv']))
            {
                $manv = $_GET['manv'];
        #buowsc 3 select bản ghi có manv trong database bằng với mã nhân viên cần thêm khi click vào button thêm             
           $sql = "SELECT * from db_nhanvien where manv = '$manv' ";
                $query = mysqli_query($conn, $sql);
                #echo mysqli_num_rows($query);
                $row = mysqli_fetch_assoc($query);
            }

        ?>
            <form action="luu.php">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên</label>
                    <input type="text" class="form-control" value="<?php echo $row['tennv']; ?>" name="ten">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Chức vụ</label>
                    <input type="text" class="form-control" value="<?php echo $row['chucvu']; ?>" name="cv">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" value="<?php echo $row['sodidong']; ?>" name="sdt">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email">
                </div>
                <label for="exampleFormControlInput1" class="form-label">Phòng ban</label>
                <select class="form-select" aria-label="Default select example" name='pb'>
                <?php
                            //kết nối server
                            require('config.php');

                            //truy ván đữ liệu
                            $sql = "SELECT * FROM db_donvi";
                            $result = mysqli_query($conn,$sql);

                            //xử lý kết quả
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<option value = "'.$row['madv'].'">'.$row['tendv'].'</option>';
                                }
                            }

                            //đóng kết nối
                            mysqli_close($conn);
                       ?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-info" name="submit">Submit</button>
            </form>
    </div>

</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <title>DanhbaDHTL</title>
</head>

<body>
    <div class="header top">
        <img src="images/logo.png" alt="not connect">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Administration</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Quản lý danh bạ người dùng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Quản lý danh bạ đơn vị</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Quản lý tài khoản</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phòng ban</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                        <th scope="col">thêm</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('config.php');
                    $sql = "SELECT nv.manv, nv.tennv, nv.chucvu, nv.sodidong, nv.email, dv.tendv from db_nhanvien nv , db_donvi dv 
                        where  nv.madv = dv.madv";
                    $query = mysqli_query($conn, $sql);
                    #echo mysqli_num_rows($query);
                    #mysqli_fetch_assoc()  để lấy ra 1 row
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $count; ?> </th>
                            <td><?php echo $row['tennv'] ?></td>
                            <td><?php echo $row['chucvu'] ?></td>
                            <td><?php echo $row['sodidong'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['tendv'] ?></td>
                            <td><a href="sua.php?manv=<?php echo $row['manv'] ?>">Sửa</a></td>
                            <td><a href="xoa.php?manv=<?php echo $row['manv'] ?>">xóa</a></td>
                            <td><a href="them.php?manv=<?php echo $row['manv'] ?>">thêm</a></td>

                        </tr>
                    <?php
                        $count++;
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
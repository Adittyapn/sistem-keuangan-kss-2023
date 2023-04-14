<!DOCTYPE html>

<title> BERHASIL </title>
</head>

<body>
    <center>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "keuangan");

        if ($conn === false) {
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        $nik = $_POST['nik'];
        $user = $_POST['username'];
        $nama_pengguna = $_POST['nama_pengguna'];
        $pass = $_POST['password'];

        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO login (nik,username,nama_pengguna,pass)
        VALUES ('$nik','$user','$nama_pengguna','$pass')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";

            echo nl2br("\n$nik\n $user\n "
                . "$nama_pengguna \n $pass");
        } else {
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>
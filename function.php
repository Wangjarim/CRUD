<?php 
    $connect = mysqli_connect("localhost", "root", "", "data_pegawai");

    function query($query) {
        global $connect;
        $result = mysqli_query($connect, $query);
        $row = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data) {
        global $connect;

        $nama = $data["nama"];
        $jabatan = $data["jabatan"];
        $umur = $data["umur"];

        $query = "INSERT INTO pegawai VALUES ('', '$nama' , '$jabatan', '$umur')";
        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    function ubah($data){
        global $connect;

        $id = $data["id"];
        $nama = $data["nama"];
        $jabatan = $data["jabatan"];
        $umur = $data["umur"];


        $query = "UPDATE pegawai SET
                    nama = '$nama',
                    jabatan    = '$jabatan',
                    umur       = '$umur'

                    WHERE id = $id 
        ";

        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    function hapus($id) {
        global $connect;
        mysqli_query($connect, "DELETE FROM pegawai WHERE id = $id");
    
        return mysqli_affected_rows($connect);
    }

    function cari($keyword) {
        $query = "SELECT * FROM pegawai 
                    WHERE 
                    nama LIKE '%$keyword%' OR
                    alamat LIKE '%$keyword%'
                ";
        return query($query);
    }
?>
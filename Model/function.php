<?php

// CLASS INI DIGUNAKAN UNTUK METODE MENGHUBUNGKAN KE DATABASE DAN TABEL TABEL TERTENTU
class Database
{
    private $host = 'localhost';
    private $db = '29_muchamad_syikha_akmal';
    private $user = 'root';
    private $password = '';

    public function connection()
    {
        return $conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);
    }
}

// CLASS INI DIGUNAKAN UNTUK METODE MENGIRIMKAN DATA KE DATABASE DAN TABEL TERTENTU
class FromToDatabase
{
    private $database;
    private $conn;
    private $table;

    public function __construct($table)
    {
        $this->database = new Database(); // Inisialisasi objek Database
        $this->table = $table;
    }

    public function imgFileHandler($paramName)
    {
        $targetDir = "../Uploads/"; // Direktori penyimpanan file
        $targetFile = $targetDir . basename($_FILES[$paramName]["name"]); // Path lengkap file yang diupload
        $uploadOk = 1; // Flag untuk memeriksa apakah file bisa diupload

        // Cek apakah file sudah ada
        if (file_exists($targetFile)) {
            echo "File sudah ada.";
            $uploadOk = 0;
        }

        // Batasan ukuran file (misalnya 2MB)
        if ($_FILES[$paramName]["size"] > 2000000) {
            echo "Ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        // Memeriksa jenis file (misalnya hanya gambar)
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedTypes)) {
            echo "Hanya file gambar yang diizinkan.";
            $uploadOk = 0;
        }

        // Jika tidak ada masalah, upload file
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES[$paramName]["tmp_name"], $targetFile)) {
                return $_FILES[$paramName]["name"] ;
            } else {
                return "Terjadi kesalahan saat mengunggah file.";
            }
        }
    }

    public function imgFilePath($id) {
        $result = $this->getTable_S($id) ;
        $data = $result["image_name"] ;
        return $filePath = '../Uploads/' . $data ;
    }

    public function newContent($desc, $headline, $imgName)
    {
        $this->conn = $this->database->connection();
        $query = "INSERT INTO {$this->table} (main_news, headline, image_name) VALUES ('$desc','$headline', '$imgName')";
        mysqli_query($this->conn, $query);
        return 'done';
    }

    public function editContent($desc, $headline, $id)
    {
        $this->conn = $this->database->connection();
        $query = "UPDATE {$this->table} SET main_news = '$desc', headline = '$headline' WHERE id = $id";
        mysqli_query($this->conn, $query);
        return header('Location: ../Views/admin.php');
    }

    public function editContentW_img($desc, $headline, $id, $imgName)
    {
        $file = $this->imgFilePath($id) ;
        if (file_exists($file)) {
            unlink($file) ;
        }
        $this->conn = $this->database->connection();
        $query = "UPDATE {$this->table} SET main_news = '$desc', headline = '$headline', image_name = '$imgName' WHERE id = $id";
        mysqli_query($this->conn, $query);
        return header('Location: ../Views/admin.php');
    }

    public function deleteBlog(int $id)
    {
        $this->conn = $this->database->connection();
        $file = $this->imgFilePath($id) ;
        if (file_exists($file)) {
            unlink($file) ;
        }
        $query = "DELETE FROM {$this->table} WHERE id = $id";
        mysqli_query($this->conn, $query);
        return header('Location: ../Views/admin.php');
    }

    public function getTable()
    {
        $this->conn = $this->database->connection();
        $query = "SELECT * FROM {$this->table} ORDER BY id DESC";
        return mysqli_query($this->conn, $query);
    }

    public function getTable_S(int $id)
    {
        $this->conn = $this->database->connection();
        $query = "SELECT * FROM {$this->table} WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

    public function getUser($email) {
        $this->conn = $this->database->connection();
        $email = mysqli_real_escape_string($this->conn, $email); // Melakukan sanitasi input email
        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) { // Memeriksa apakah hasil query ada
            return mysqli_fetch_assoc($result);
        } else {
            return 0; // Mengembalikan null jika tidak ada hasil yang ditemukan
        }
    }
    
}
<?php

# ----= KELAS USER =---- #

class User { // Kelas user yang mengatur data user
    public $username, $password, $email, $photo, $conn;

    public function __construct($username, $password, $email, $photo) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->photo = $photo;
        $this->conn = new mysqli("localhost", "root", "", "lets_colonize_db");
    }

    public function register() {
        $sql = "INSERT INTO users (username, password, email, photo) VALUES ('$this->username', '$this->password', '$this->email', '$this->photo')";
        $this->conn->query($sql);
        $this->conn->close();
    }

    public function login() {
        $sql = "SELECT * FROM users WHERE email = '$this->email' AND password = '$this->password'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->username = $row['username'];
            $this->photo = $row['photo'];
            $_SESSION['login'] = true;
            header("Location: index.php");

        } else {
            echo "<script>alert('Invalid Username or Password!')</script>";
            header("Refresh:0");
        }

        $this->conn->close();
        return $result;
    }

    public function update() {
        $sql = "UPDATE users SET username = '$this->username', password = '$this->password', email = '$this->email', photo = '$this->photo' WHERE username = '$this->username'";
        $this->conn->query($sql);
        $this->conn->close();
    }

    public function delete() {
        $sql = "DELETE FROM users WHERE username = '$this->username'";
        $this->conn->query($sql);
        $this->conn->close();
    }
}

# ----= KUMPULAN VARIABEL DAN FUNGSI =---- #

$conn;

function requestConnection() { // Membuka koneksi server ke database (Ini dipanggil di semua halaman)
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ob_start();

    global $conn;
    $conn = mysqli_connect("localhost", "root", "", "lets_colonize_db");
    if (!$conn) 
        die("Connection Failed: Please check your database connection! (lets_colonize_db)");
}

function writeData($data) {
    if (!empty($_POST["$data"]) && isset($_POST["$data"]))
        return $_POST["$data"];
    else 
        echo "<script>alert('Please fill all the fields!')</script>";
        header("Refresh:0");
        die;
}

function setButtons($conn) { // Membaca seluruh tombol dalam dokumen dan menyetel Fungsinya

    if (isset($_POST['edit'])) {
        $_SESSION['edit'] = 'edit';
        editData($_POST['edit'], $GLOBALS['conn']);
        
    } else if (isset($_POST['delete'])) {
        $_SESSION['confirm-delete'] = $_POST['delete'];
        echo "<script>
            document.getElementsByClassName('overlay')[0].style.display = 'block';
            animateBox('confirm-delete');
        </script>";  
    }

    if (isset($_POST['save'])) {
        $project_name = writeData('project_name');
        $head_staff = writeData('head_staff');
        $research_code = writeData('research_code');
        $status = writeData('status');
    
        $sql = ($_SESSION['edit'] == "add") ? 
        "INSERT INTO projects (project_name, head_staff, research_code, status) VALUES ('$project_name', '$head_staff', '$research_code', '$status')" :
        "UPDATE projects SET project_name = '$project_name', head_staff = '$head_staff', research_code = '$research_code', status = '$status' WHERE id = ".$_POST['save']."";
            
        if (mysqli_query($conn, $sql)) {  
            echo "<div class='alert alert-success m-3' role='alert'>Successfully ".$_SESSION['edit']."ed a data!</div>";
            unset($_POST['save'], $_POST['edit'], $_POST['project_name'], $_POST['head_staff'], $_POST['research_code'], $_POST['status']);
            $_SESSION['edit'] = "add";
            header("Refresh:2");
        }
    }

    if (isset($_POST['confirm-delete'])){
        deleteData($_SESSION['confirm-delete'], $GLOBALS['conn']);
    }

    if (isset($_POST['add-button'])) {
        $_SESSION['edit'] = 'add';
        echo "<script> addButton() </script>";
    }

    if (isset($_POST['login-button'])) {
        $_SESSION['user'] = new user('', hash('sha256', writeData('logpass')), writeData('logemail'), '');
        $_SESSION['user']->login();
    }

    if (isset($_POST['register-button'])) {
        $_SESSION['user'] = new user(writeData('regname'), hash('sha256', writeData('regpass')), writeData('regemail'), '');
        $_SESSION['user']->register();
    }

    if (isset($_POST['logout-button'])) {
        session_destroy();
        header("Location: index.php");
    }
}

function showData($result) { // Menampilkan record dalam tabel dengan format yang ditentukan
    if (mysqli_num_rows($result) > 0) {
        $num = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            echo "<tr id='kolom-" . $num . "'>" .
                "<th scope='row'>" . $num . "</th>" .
                "<td>" . $row['project_name'] . "</td>" .
                "<td>" . $row['head_staff'] . "</td>" .
                "<td>" . $row['research_code'] . "</td>" .
                "<td>" . $row['status'] . "</td>" .
                "<td><button class='btn btn-warning btn-edit' name='edit' value='$id'><i class='bi bi-pencil-fill'></i></button>" .
                "<button class='btn btn-danger ms-2 btn-delete' name='delete' value='$id'><i class='bi bi-trash'></i></button></td>\n</tr>";
            $num++;
        }
    } else
        echo "<tr><td colspan='6' class='display-7 m-auto text-center'><i><b>(No Data Found)</b></i></td></tr>";
}

function setInputValue() { // Menyetel nilai inputan, multi args
    for ($i = 1; $i < func_num_args(); $i++)
        echo "<script>document.getElementById('".func_get_arg($i)."').value = '".func_get_arg(0)[func_get_arg($i)]."';</script>";
}

function editData($id, $conn) { // Mengedit record berdasarkan ID
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM projects WHERE id = $id"));  

    setInputValue($row, 'project_name', 'head_staff', 'research_code', 'status'); 
    echo "<script>
        document.getElementsByClassName('overlay')[0].style.display = 'block';
        document.getElementById('save-button').innerHTML = 'Update Data';
        document.getElementById('save-button').className = 'btn btn-success';
        document.getElementById('save-button').value = '$id';
        animateBox('input-data');
    </script>";
}

function deleteData($id, $conn) { // Menghapus record sesuai ID
    if (mysqli_query($conn, "DELETE FROM projects WHERE id = $id")) {
        echo "<script>
            document.getElementsByClassName('confirm-delete')[0].style.display = 'none';
            document.getElementsByClassName('overlay')[0].style.display = 'none';
        </script>";
        echo "<div class='alert alert-success m-3' role='alert'>Successfully Deleted Data!</div>";
        unset($_POST['delete'], $_POST['confirm-delete']);
        header("Refresh:2");
    }
}

function listRecords($conn) { // Menampilkan database sesuai kondisi (pencarian/bukan)
    $sql = "SELECT * FROM projects";
    $result = mysqli_query($conn, $sql);

    if (isset($_POST['find'])) {
        $search = $_POST['search'];
        $sql = "SELECT * FROM projects WHERE project_name LIKE '%$search%' OR head_staff LIKE '%$search%' OR research_code LIKE '%$search%' OR status LIKE '%$search%' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        echo "<script>
            document.getElementsByTagName('tbody').innerHTML = '';
            document.getElementById('back-button').style.display = 'block';
            document.getElementById('search-button').style.display = 'none';
            document.getElementById('search-input').style.display = 'none';
        </script>";
        showData($result);
        unset($_POST['find'], $_POST['search']);

    } else if (isset($_POST['back'])) {
        echo "<script>
            document.getElementById('back-button').style.display = 'none';
            document.getElementById('search-button').style.display = 'block';
            document.getElementById('search-input').style.display = 'block';
        </script>";
        showData($result);
        unset($_POST['back']);

    } else
        showData($result);
}

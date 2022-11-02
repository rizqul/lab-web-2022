<?php

$_SESSION['edit'] = 'add';
session_start();

if (isset($_POST['edit'])) 
    $_SESSION['edit'] = 'edit';

function requestConnection() {
    ob_start();
    global $conn;
                
    $conn = mysqli_connect("localhost", "root", "", "lets_colonize_db");
    if (!$conn) 
        die("Connection Failed: Please check your database connection! (lets_colonize_db)");
}

function checkIsThere($data) {
    if (!empty($_POST["$data"]) && isset($_POST["$data"]))
        return $_POST["$data"];
    else 
        echo "<script>alert('Please fill all the fields!')</script>";
        header("Refresh:0");
        die;
}

function setButtons($conn) { // Menyetel fungsi tombol
    if (isset($_POST['edit'])) {
        editData($_POST['edit'], $GLOBALS['conn']);

    } else if (isset($_POST['delete'])) {
        deleteData($_POST['delete'], $GLOBALS['conn']);
        unset($_POST['delete']);
    }

    if (isset($_POST['save'])) {
        $project_name = checkIsThere('project_name');
        $head_staff = checkIsThere('head_staff');
        $research_code = checkIsThere('research_code');
        $status = checkIsThere('status');
    
        $sql = ($_SESSION['edit'] == "add") ? 
        "INSERT INTO projects (project_name, head_staff, research_code, status) VALUES ('$project_name', '$head_staff', '$research_code', '$status')" :
        "UPDATE projects SET project_name = '$project_name', head_staff = '$head_staff', research_code = '$research_code', status = '$status' WHERE id = ".$_POST['save']."";
            
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Successfully ".$_SESSION['edit']."ed a data! Please Wait...</div>";
            unset($_POST['save'], $_POST['edit'], $_POST['project_name'], $_POST['head_staff'], $_POST['research_code'], $_POST['status']);
            $_SESSION['edit'] = "add";
            header("Refresh:1");
        }
    }
}

function showData($result) { // Menampilkan record dalam tabel
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
                "<td><button class='btn btn-warning' name='edit' id='edit' value='$id'>Edit</button>" .
                "<button class='btn btn-danger ms-2' name='delete' value='$id'>Remove</button></td>\n</tr>";

            echo "<script>console.log('Fetched ID: $id')</script>";
            $num++;
        }
    } else
        echo "<tr><td colspan='6' class='display-7 m-auto text-center'><i><b>(No Data Found)</b></i></td></tr>";
}

function editData($id, $conn) { // Mengedit record berdasarkan ID
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM projects WHERE id = $id"));   
    echo "<script>
        document.getElementById('project_name').value = '".$row['project_name']."';
        document.getElementById('head_staff').value = '".$row['head_staff']."';
        document.getElementById('research_code').value = '".$row['research_code']."';
        document.getElementById('status').value = '".$row['status']."';
        document.getElementsByClassName('input-data')[0].style = 'display: block;';
        document.getElementsByClassName('overlay')[0].style.display = 'block';
        document.getElementById('save-button').innerHTML = 'Update Data';
        document.getElementById('save-button').value = '$id';
        document.getElementById('save-button').className = 'btn btn-success';
        </script>";
}

function deleteData($id, $conn) { // Menghapus record sesuai ID
    if (mysqli_query($conn, "DELETE FROM projects WHERE id = $id")) {
        echo "<div class='alert alert-success' role='alert'>Successfully Deleted Data!</div>";
        header("Refresh:1");
        unset($_POST['delete']);
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
?>
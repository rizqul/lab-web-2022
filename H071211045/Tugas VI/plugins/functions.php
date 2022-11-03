<?php

if (session_status() != PHP_SESSION_NONE) {
    $_SESSION['edit'] = 'add';

} else {
    session_start();
}

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
        $_SESSION['edit'] = 'edit';
        editData($_POST['edit'], $GLOBALS['conn']);

    } else if (isset($_POST['delete'])) {
        deleteData($_POST['delete'], $GLOBALS['conn']);
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
                "<td><button class='btn btn-warning' name='edit' id='edit' value='$id'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'><path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/></svg></button>" .
                "<button class='btn btn-danger ms-2' name='delete' value='$id'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></button></td>\n</tr>";

            echo "<script>console.log('Fetched ID: $id')</script>";
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
    echo "<script>
        document.getElementsByClassName('overlay')[0].style.display = 'block';
        animateBox('confirm-delete');
    </script>";
    if (isset($_POST['confirm-delete'])){
        echo "<script>console.log('arif')</script>";
        if (mysqli_query($conn, "DELETE FROM projects WHERE id = $id")) {
            echo "<script>
                document.getElementsByClassName('confirm-delete')[0].style.display = 'none';
                document.getElementsByClassName('overlay')[0].style.display = 'none';
            </script>";
            echo "<div class='alert alert-success' role='alert'>Successfully Deleted Data!</div>";
            unset($_POST['delete'], $_POST['confirm-delete']);
            header("Refresh:1");
        }
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
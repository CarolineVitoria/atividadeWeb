<?php
$email = $_POST['loginemail'];
$senha = $_POST['loginsenha'];
$entrar = $_POST['entrar'];

// Create connection
$conn = new mysqli('localhost', 'root', '123456', 'atividadeweb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($entrar)) {
    $query = "SELECT * FROM Usuario WHERE UsuEmail = ? AND UsuSenha = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows <= 0) {
        echo "<script>alert('Login e/ou senha incorretos'); window.location.href='login.html';</script>";
        die();
    } else {
        setcookie("login", $email, time() + (86400 * 30), "/");
        echo "<script>alert('Login realizado com sucesso!'); window.location.href='index.html';</script>";
        exit();
    }
}

$conn->close();
?>

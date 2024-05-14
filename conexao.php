<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

    $conn = new mysqli('localhost', 'root', '123456', 'atividadeweb');
    if($conn->connect_errno){
        echo "Erro";
    } else{
        $smtp = $conn->prepare("insert into usuario(UsuNome, UsuEmail, UsuMatricula, UsuSenha) values(?, ?, ?, ?)");
        $smtp->bind_param("ssss", $nome, $email, $matricula, $senha);
        $smtp->execute();
        echo "Registro realizado com sucesso... ";
        $smtp->close();
        $conn->close();
        echo "<script>window.location.href='login.html';</script>";
    }
?>

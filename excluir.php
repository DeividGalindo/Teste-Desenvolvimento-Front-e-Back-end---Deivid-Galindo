<?php
require_once 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM fornecedores WHERE id = :id");
        $stmt->execute([':id' => $id]);

        echo "<script>
                alert('Fornecedor excluído com sucesso!');
                window.location.href = 'listar.php';
              </script>";
    } catch(PDOException $e) {
        echo "<script>
                alert('Erro ao excluir: " . $e->getMessage() . "');
                window.location.href = 'listar.php';
              </script>";
    }
} else {
    header("Location: listar.php");
    exit;
}
?>
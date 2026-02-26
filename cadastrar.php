<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $fornecedor_de = isset($_POST['fornecedor_de']) ? implode(', ', $_POST['fornecedor_de']) : '';

        $sql = "INSERT INTO fornecedores (
            cnpj_empresa, razao_social, nome_fantasia, inscricao_estadual, icms, situacao, 
            telefone, email, endereco, numero, complemento, bairro, pais, estado, cep, 
            municipio, fornecedor_de, ramo_atuacao, cnpj_usuario, nome_usuario, senha
        ) VALUES (
            :cnpj_empresa, :razao_social, :nome_fantasia, :inscricao_estadual, :icms, :situacao, 
            :telefone, :email, :endereco, :numero, :complemento, :bairro, :pais, :estado, :cep, 
            :municipio, :fornecedor_de, :ramo_atuacao, :cnpj_usuario, :nome_usuario, :senha
        )";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':cnpj_empresa' => $_POST['cnpj_empresa'],
            ':razao_social' => $_POST['razao_social'],
            ':nome_fantasia' => $_POST['nome_fantasia'] ?? null,
            ':inscricao_estadual' => $_POST['inscricao_estadual'] ?? null,
            ':icms' => $_POST['icms'] ?? null,
            ':situacao' => $_POST['situacao'] ?? null,
            ':telefone' => $_POST['telefone'],
            ':email' => $_POST['email'],
            ':endereco' => $_POST['endereco'],
            ':numero' => $_POST['numero'],
            ':complemento' => $_POST['complemento'] ?? null,
            ':bairro' => $_POST['bairro'],
            ':pais' => $_POST['pais'] ?? 'Brasil',
            ':estado' => $_POST['estado'],
            ':cep' => $_POST['cep'],
            ':municipio' => $_POST['municipio'],
            ':fornecedor_de' => $fornecedor_de,
            ':ramo_atuacao' => $_POST['ramo_atuacao'] ?? null,
            ':cnpj_usuario' => $_POST['cnpj_usuario'],
            ':nome_usuario' => $_POST['nome_usuario'],
            ':senha' => $senha_hash
        ]);

        echo "<script>
                alert('Fornecedor cadastrado com sucesso!');
                window.location.href = 'index.php';
              </script>";

    } catch(PDOException $e) {
        echo "<script>
                alert('Erro ao cadastrar: " . $e->getMessage() . "');
                window.history.back();
              </script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
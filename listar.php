<?php
require_once 'conexao.php';

try {
    $stmt = $conn->query("SELECT * FROM fornecedores ORDER BY id DESC");
    $fornecedores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $erro = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal MSE - Lista de Fornecedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="form-container text-center pb-3 mb-4">
                <h3 class="m-0 fw-bold">⚡ Portal MSE</h3>
            </div>

            <div class="form-container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="m-0 text-muted fw-normal"><i class="bi bi-list-ul"></i> Fornecedores Cadastrados</h4>
                    <a href="index.php" class="btn btn-info text-white px-4"><i class="bi bi-plus-lg"></i> Novo Cadastro</a>
                </div>

                <?php if(isset($erro)): ?>
                    <div class="alert alert-danger"><?php echo $erro; ?></div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-hover align-middle border">
                        <thead class="table-light text-muted">
                            <tr>
                                <th>ID</th>
                                <th>CNPJ</th>
                                <th>Razão Social</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($fornecedores) > 0): ?>
                                <?php foreach($fornecedores as $f): ?>
                                    <tr>
                                        <td class="text-muted">#<?php echo $f['id']; ?></td>
                                        <td><?php echo $f['cnpj_empresa']; ?></td>
                                        <td class="fw-semibold text-secondary"><?php echo $f['razao_social']; ?></td>
                                        <td><?php echo $f['email']; ?></td>
                                        <td><?php echo $f['telefone']; ?></td>
                                        <td class="text-center">
                                            <a href="editar.php?id=<?php echo $f['id']; ?>" class="btn btn-sm btn-outline-secondary me-2"><i class="bi bi-pencil"></i></a>
                                            <a href="excluir.php?id=<?php echo $f['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja excluir este fornecedor?');"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">Nenhum fornecedor cadastrado ainda.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
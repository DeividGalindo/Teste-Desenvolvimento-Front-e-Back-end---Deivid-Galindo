<?php
require_once 'conexao.php';

if (!isset($_GET['id'])) {
    header("Location: listar.php");
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $fornecedor_de = isset($_POST['fornecedor_de']) ? implode(', ', $_POST['fornecedor_de']) : '';

        $sql = "UPDATE fornecedores SET 
            cnpj_empresa = :cnpj_empresa, razao_social = :razao_social, nome_fantasia = :nome_fantasia, 
            inscricao_estadual = :inscricao_estadual, icms = :icms, situacao = :situacao, 
            telefone = :telefone, email = :email, endereco = :endereco, numero = :numero, 
            complemento = :complemento, bairro = :bairro, pais = :pais, estado = :estado, 
            cep = :cep, municipio = :municipio, fornecedor_de = :fornecedor_de, 
            ramo_atuacao = :ramo_atuacao, cnpj_usuario = :cnpj_usuario, nome_usuario = :nome_usuario
            WHERE id = :id";

        $stmt = $conn->prepare($sql);
        
        $stmt->execute([
            ':cnpj_empresa' => $_POST['cnpj_empresa'],
            ':razao_social' => $_POST['razao_social'],
            ':nome_fantasia' => $_POST['nome_fantasia'],
            ':inscricao_estadual' => $_POST['inscricao_estadual'],
            ':icms' => $_POST['icms'],
            ':situacao' => $_POST['situacao'],
            ':telefone' => $_POST['telefone'],
            ':email' => $_POST['email'],
            ':endereco' => $_POST['endereco'],
            ':numero' => $_POST['numero'],
            ':complemento' => $_POST['complemento'],
            ':bairro' => $_POST['bairro'],
            ':pais' => $_POST['pais'],
            ':estado' => $_POST['estado'],
            ':cep' => $_POST['cep'],
            ':municipio' => $_POST['municipio'],
            ':fornecedor_de' => $fornecedor_de,
            ':ramo_atuacao' => $_POST['ramo_atuacao'],
            ':cnpj_usuario' => $_POST['cnpj_usuario'],
            ':nome_usuario' => $_POST['nome_usuario'],
            ':id' => $id
        ]);

        echo "<script>
                alert('Fornecedor atualizado com sucesso!');
                window.location.href = 'listar.php';
              </script>";
        exit;

    } catch(PDOException $e) {
        echo "<script>alert('Erro ao atualizar: " . $e->getMessage() . "');</script>";
    }
}

try {
    $stmt = $conn->prepare("SELECT * FROM fornecedores WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $f = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$f) {
        header("Location: listar.php");
        exit;
    }

    $fornecedor_de_array = explode(', ', $f['fornecedor_de']);

} catch(PDOException $e) {
    die("Erro: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal MSE - Editar Fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="form-container text-center pb-3">
                <h3 class="m-0 fw-bold">⚡ Portal MSE</h3>
            </div>

            <div class="form-container">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h4 class="m-0 text-muted fw-normal"><i class="bi bi-pencil-square"></i> Editar Fornecedor</h4>
                    <a href="listar.php" class="btn btn-outline-secondary px-4">Voltar</a>
                </div>

                <form id="formFornecedor" action="" method="POST">
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="cnpj_empresa" name="cnpj_empresa" placeholder="CNPJ" value="<?php echo htmlspecialchars($f['cnpj_empresa']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="razao_social" name="razao_social" placeholder="Razão Social" value="<?php echo htmlspecialchars($f['razao_social']); ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="nome_fantasia" name="nome_fantasia" placeholder="Nome Fantasia" value="<?php echo htmlspecialchars($f['nome_fantasia']); ?>">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="inscricao_estadual" name="inscricao_estadual" placeholder="Inscrição Estadual/Isento" value="<?php echo htmlspecialchars($f['inscricao_estadual']); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted small mb-1">ICMS:</label>
                            <input type="text" class="form-control input-mse" id="icms" name="icms" placeholder="ICMS" value="<?php echo htmlspecialchars($f['icms']); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small mb-1">Situação:</label>
                            <input type="text" class="form-control input-mse" id="situacao" name="situacao" placeholder="Situação" value="<?php echo htmlspecialchars($f['situacao']); ?>">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="telefone" name="telefone" placeholder="Telefone" value="<?php echo htmlspecialchars($f['telefone']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control input-mse" id="email" name="email" placeholder="E-mail" value="<?php echo htmlspecialchars($f['email']); ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="endereco" name="endereco" placeholder="Endereço" value="<?php echo htmlspecialchars($f['endereco']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="numero" name="numero" placeholder="Número" value="<?php echo htmlspecialchars($f['numero']); ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="complemento" name="complemento" placeholder="Complemento" value="<?php echo htmlspecialchars($f['complemento']); ?>">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="bairro" name="bairro" placeholder="Bairro" value="<?php echo htmlspecialchars($f['bairro']); ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select class="form-select input-mse text-muted" id="pais" name="pais">
                                <option value="Brasil" <?php echo ($f['pais'] == 'Brasil') ? 'selected' : ''; ?>>Brasil</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select input-mse text-muted" id="estado" name="estado" required>
                                <option value="" disabled>Selecione o Estado</option>
                                <option value="PR" <?php echo ($f['estado'] == 'PR') ? 'selected' : ''; ?>>Paraná</option>
                                <option value="SP" <?php echo ($f['estado'] == 'SP') ? 'selected' : ''; ?>>São Paulo</option>
                                <option value="RJ" <?php echo ($f['estado'] == 'RJ') ? 'selected' : ''; ?>>Rio de Janeiro</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="cep" name="cep" placeholder="CEP" value="<?php echo htmlspecialchars($f['cep']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select input-mse text-muted" id="municipio" name="municipio" required>
                                <option value="" disabled>Município</option>
                                <option value="Londrina" <?php echo ($f['municipio'] == 'Londrina') ? 'selected' : ''; ?>>Londrina</option>
                                <option value="São Paulo" <?php echo ($f['municipio'] == 'São Paulo') ? 'selected' : ''; ?>>São Paulo</option>
                                <option value="Rio de Janeiro" <?php echo ($f['municipio'] == 'Rio de Janeiro') ? 'selected' : ''; ?>>Rio de Janeiro</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-center mb-4">
                        <h5 class="text-muted fw-normal">Fornecedor de:</h5>
                        <div class="d-flex justify-content-center gap-4 mt-3 text-muted small">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fornecedor_de[]" value="Servicos" id="checkServicos" <?php echo in_array('Servicos', $fornecedor_de_array) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="checkServicos">Serviços</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fornecedor_de[]" value="Materiais" id="checkMateriais" <?php echo in_array('Materiais', $fornecedor_de_array) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="checkMateriais">Materiais</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fornecedor_de[]" value="Locacao" id="checkLocacao" <?php echo in_array('Locacao', $fornecedor_de_array) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="checkLocacao">Locação</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-5">
                        <h5 class="text-muted fw-normal mb-3">Ramo de Atuação:</h5>
                        <div class="d-flex justify-content-center">
                            <div class="input-group" style="max-width: 500px;">
                                <select class="form-select input-mse text-muted" id="ramo_atuacao" name="ramo_atuacao">
                                    <option value="Construcao" <?php echo ($f['ramo_atuacao'] == 'Construcao') ? 'selected' : ''; ?>>Construção Civil</option>
                                    <option value="Tecnologia" <?php echo ($f['ramo_atuacao'] == 'Tecnologia') ? 'selected' : ''; ?>>Tecnologia</option>
                                    <option value="Transporte" <?php echo ($f['ramo_atuacao'] == 'Transporte') ? 'selected' : ''; ?>>Transporte</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 mt-5">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse text-center" id="cnpj_usuario" name="cnpj_usuario" placeholder="CNPJ" value="<?php echo htmlspecialchars($f['cnpj_usuario']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse text-center" id="nome_usuario" name="nome_usuario" placeholder="Nome" value="<?php echo htmlspecialchars($f['nome_usuario']); ?>" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-4">
                        <button type="submit" class="btn btn-success text-white px-4 py-2">Salvar Alterações <i class="bi bi-check-lg"></i></button>
                    </div>

                </form>
            </div>

            <div class="text-center my-4">
                <small class="text-muted">2026 © Portal MSE 3.5.3</small>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>
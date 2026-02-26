<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal MSE - Cadastro de Fornecedor</title>
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
                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="titulo-faixa">Pessoa Jurídica</div>
                    </div>
                    <div class="col-md-6">
                        <div class="titulo-faixa">Fornecedor</div>
                    </div>
                </div>

                <form id="formFornecedor" action="cadastrar.php" method="POST">
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="cnpj_empresa" name="cnpj_empresa" placeholder="CNPJ" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="razao_social" name="razao_social" placeholder="Razão Social" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="nome_fantasia" name="nome_fantasia" placeholder="Nome Fantasia">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="inscricao_estadual" name="inscricao_estadual" placeholder="Inscrição Estadual/Isento">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted small mb-1">ICMS:</label>
                            <input type="text" class="form-control input-mse" id="icms" name="icms" placeholder="ICMS">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small mb-1">Situação:</label>
                            <input type="text" class="form-control input-mse" id="situacao" name="situacao" placeholder="Situação">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="telefone" name="telefone" placeholder="Telefone" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control input-mse" id="email" name="email" placeholder="E-mail" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="endereco" name="endereco" placeholder="Endereço" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="numero" name="numero" placeholder="Número" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="complemento" name="complemento" placeholder="Complemento">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="bairro" name="bairro" placeholder="Bairro" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select class="form-select input-mse text-muted" id="pais" name="pais">
                                <option value="Brasil" selected>Brasil</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select input-mse text-muted" id="estado" name="estado" required>
                                <option value="" disabled selected>Selecione o Estado</option>
                                <option value="PR">Paraná</option>
                                <option value="SP">São Paulo</option>
                                <option value="RJ">Rio de Janeiro</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse" id="cep" name="cep" placeholder="CEP" required>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select input-mse text-muted" id="municipio" name="municipio" required>
                                <option value="" disabled selected>Município</option>
                                <option value="Londrina">Londrina</option>
                                <option value="São Paulo">São Paulo</option>
                                <option value="Rio de Janeiro">Rio de Janeiro</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-center mb-4">
                        <h5 class="text-muted fw-normal">Fornecedor de:</h5>
                        <div class="d-flex justify-content-center gap-4 mt-3 text-muted small">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fornecedor_de[]" value="Servicos" id="checkServicos">
                                <label class="form-check-label" for="checkServicos">Serviços</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fornecedor_de[]" value="Materiais" id="checkMateriais">
                                <label class="form-check-label" for="checkMateriais">Materiais</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fornecedor_de[]" value="Locacao" id="checkLocacao">
                                <label class="form-check-label" for="checkLocacao">Locação</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-5">
                        <h5 class="text-muted fw-normal mb-3">Ramo de Atuação:</h5>
                        <div class="d-flex justify-content-center">
                            <div class="input-group" style="max-width: 500px;">
                                <select class="form-select input-mse text-muted" id="ramo_atuacao" name="ramo_atuacao">
                                    <option value="" selected></option>
                                    <option value="Construcao">Construção Civil</option>
                                    <option value="Tecnologia">Tecnologia</option>
                                    <option value="Transporte">Transporte</option>
                                </select>
                                <button class="btn btn-info text-white px-3" type="button"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 mt-5">
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse text-center" id="cnpj_usuario" name="cnpj_usuario" placeholder="CNPJ" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-mse text-center" id="nome_usuario" name="nome_usuario" placeholder="Nome" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="password" class="form-control input-mse border-end-0" id="senha" name="senha" placeholder="Senha" required>
                                <span class="input-group-text bg-white border-start-0" style="border-color: #dee2e6;"><i class="bi bi-eye-fill text-muted"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="password" class="form-control input-mse border-end-0" id="repetir_senha" name="repetir_senha" placeholder="Repetir Senha" required>
                                <span class="input-group-text bg-white border-start-0" style="border-color: #dee2e6;"><i class="bi bi-eye-fill text-muted"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-4">
                        <button type="submit" class="btn btn-info text-white px-4 py-2">Cadastrar ></button>
                    </div>

                    <div class="text-center mt-5 mb-2">
                        <span class="text-muted small">Já tem uma conta? <a href="#" class="text-info text-decoration-none">Faça Login</a></span>
                    </div>

                </form>
            </div>

            <div class="form-container text-center py-4">
                <h4 class="fw-normal mb-2"><i class="bi bi-building"></i> Para ser um Fornecedor MSE</h4>
                <p class="text-muted small m-0">Cadastre-se aqui</p>
            </div>

            <div class="form-container text-center py-4">
                <h4 class="fw-normal mb-4"><i class="bi bi-person-fill"></i> Você é colaborador da MSE?</h4>
                <button class="btn btn-outline-secondary px-4 py-2 text-dark bg-white">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google" width="18" class="me-2"> Fazer Login com o Google
                </button>
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
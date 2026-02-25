<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal MSE - Cadastro de Fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="form-container text-center">
                <h3 class="m-0">⚡ Portal MSE</h3>
            </div>

            <div class="form-container">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="titulo-faixa">Pessoa Jurídica</div>
                    </div>
                    <div class="col-md-6">
                        <div class="titulo-faixa">Fornecedor</div>
                    </div>
                </div>

                <form id="formFornecedor" action="" method="POST">
                    
                    <div class="row mb-3 mt-4">
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-light" id="cnpj_empresa" name="cnpj" placeholder="CNPJ" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-light" id="razao_social" name="razao_social" placeholder="Razão Social" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-light" id="nome_fantasia" name="nome_fantasia" placeholder="Nome Fantasia">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-light" id="inscricao_estadual" name="inscricao_estadual" placeholder="Inscrição Estadual/Isento">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted small mb-1">ICMS:</label>
                            <input type="text" class="form-control bg-light" id="icms" name="icms" placeholder="ICMS">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small mb-1">Situação:</label>
                            <input type="text" class="form-control bg-light" id="situacao" name="situacao" placeholder="Situação">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-light" id="telefone" name="telefone" placeholder="Telefone" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control bg-light" id="email" name="email" placeholder="E-mail" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-light" id="endereco" name="endereco" placeholder="Endereço" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-light" id="numero" name="numero" placeholder="Número" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-light" id="complemento" name="complemento" placeholder="Complemento">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-light" id="bairro" name="bairro" placeholder="Bairro" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select class="form-select bg-light" id="pais" name="pais">
                                <option value="Brasil" selected>Brasil</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select bg-light" id="estado" name="estado" required>
                                <option value="" disabled selected>Selecione o Estado</option>
                                <option value="PR">Paraná</option>
                                <option value="SP">São Paulo</option>
                                <option value="RJ">Rio de Janeiro</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-light" id="cep" name="cep" placeholder="CEP" required>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select bg-light" id="municipio" name="municipio" required>
                                <option value="" disabled selected>Município</option>
                                <option value="Londrina">Londrina</option>
                                <option value="São Paulo">São Paulo</option>
                                <option value="Rio de Janeiro">Rio de Janeiro</option>
                            </select>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
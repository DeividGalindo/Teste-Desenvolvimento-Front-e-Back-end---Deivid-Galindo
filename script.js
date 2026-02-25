$(document).ready(function() {
    $('#cnpj_empresa, #cnpj_usuario').mask('00.000.000/0000-00', {reverse: true});
    $('#telefone').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');

    function validarCNPJ(cnpj) {
        cnpj = cnpj.replace(/[^\d]+/g, '');
        if (cnpj == '') return false;
        if (cnpj.length != 14) return false;
        
        if (cnpj == "00000000000000" || cnpj == "11111111111111" || 
            cnpj == "22222222222222" || cnpj == "33333333333333" || 
            cnpj == "44444444444444" || cnpj == "55555555555555" || 
            cnpj == "66666666666666" || cnpj == "77777777777777" || 
            cnpj == "88888888888888" || cnpj == "99999999999999")
            return false;
            
        let tamanho = cnpj.length - 2;
        let numeros = cnpj.substring(0, tamanho);
        let digitos = cnpj.substring(tamanho);
        let soma = 0;
        let pos = tamanho - 7;
        
        for (let i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2) pos = 9;
        }
        
        let resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) return false;
        
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        
        for (let i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2) pos = 9;
        }
        
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1)) return false;
        
        return true;
    }

    $('#formFornecedor').on('submit', function(e) {
        e.preventDefault();

        let cnpjEmpresa = $('#cnpj_empresa').val();
        let cnpjUsuario = $('#cnpj_usuario').val();
        
        if (!validarCNPJ(cnpjEmpresa)) {
            alert("O CNPJ da empresa informado é inválido!");
            $('#cnpj_empresa').focus();
            return;
        }

        if (!validarCNPJ(cnpjUsuario)) {
            alert("O CNPJ do usuário informado é inválido!");
            $('#cnpj_usuario').focus();
            return;
        }

        let senha = $('#senha').val();
        let repetirSenha = $('#repetir_senha').val();

        if (senha !== repetirSenha) {
            alert("As senhas não coincidem!");
            $('#repetir_senha').focus();
            return;
        }

        let camposObrigatorios = $(this).find('[required]');
        let todosPreenchidos = true;

        camposObrigatorios.each(function() {
            if ($(this).val() === '' || $(this).val() === null) {
                todosPreenchidos = false;
                $(this).css('border-color', 'red');
            } else {
                $(this).css('border-color', '#dee2e6');
            }
        });

        if (!todosPreenchidos) {
            alert("Por favor, preencha todos os campos obrigatórios.");
            return;
        }

        this.submit();
    });
});
<?php
        function formatarNome($nome) {
            $palavras = explode(" ", $nome);
            $nomeFormatado = "";

            foreach ($palavras as $palavra) {
                $nomeFormatado .= ucfirst(strtolower($palavra)) . " ";

            }
            return trim($nomeFormatado);
        }


        function verificarSenha($senha){
            if (strlen($senha) < 6) {
                return "É recomendado uma senha com mais de 6 caracteres!";

            }else{
                return "";
            }
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario php</title>
</head>
<body>
<h2>Dados do Formulário</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Endereço</th>
            <th>Profissão</th>
            <th>Gênero</th>
            <th>Área de Interesse</th>
            <th>Fale Conosco</th>
            <th>Receber Promoções</th>
            <th>Senha</th>
            <th>Confirmação da Senha</th>
        </tr>
        <tr>
            <td><?php echo formatarNome($_POST['nome'] ?? 'vazio'); ?></td>
            <td><?php echo strtolower($_POST['email'] ?? 'vazio'); ?></td>
            <td><?php echo formatarNome($_POST['endereco'] ?? 'vazio'); ?></td>
            <td><?php echo $_POST['profissao'] ?? 'vazio'; ?></td>
            <td>
                <?php 
                    if ($_POST['genero'] == 'Outro') {
                        echo ($_POST['qual'] ?? 'vazio');
                    } else {
                        echo $_POST['genero'] ?? 'vazio';
                    }
                ?>
            </td>
            <td><?php echo implode(', ', $_POST['interesse'] ?? ['vazio']); ?></td>
            <td><?php echo $_POST['fale_conosco'] ?? 'vazio'; ?></td>
            <td><?php echo isset($_POST['promocoes']) ? 'Sim' : 'Não'; ?></td>
            <td>
                <?php 
                    $senha = $_POST['senha'] ?? '';
                    echo $senha;
                    echo "<br>" . verificarSenha($senha);
                ?>
            </td>
            <td><?php echo ($_POST['senha'] === $_POST['conf_senha']) ? 'Igual' : 'Diferente'; ?></td>
        </tr>
    </table>
    
</body>
</html>
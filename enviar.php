<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Protege e coleta os dados do formulário
    $nome = htmlspecialchars(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars(trim($_POST["mensagem"]));

    // Verificação básica
    if ($nome && $email && $mensagem) {
        $para = "mk_contato@mkdigitalinformatica.com.br"; // <-- troque pelo seu e-mail
        $assunto = "📩 Nova mensagem do site Pendura Aí";
        $corpo = "Nome: $nome\n";
        $corpo .= "E-mail: $email\n";
        $corpo .= "Mensagem:\n$mensagem\n";
        $headers = "From: $nome <$email>";

        if (mail($para, $assunto, $corpo, $headers)) {
            header("Location: obrigado.html"); // redireciona para uma página de agradecimento
            exit;
        } else {
            echo "Erro ao enviar o e-mail. Tente novamente.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    echo "Acesso inválido.";
}
?>
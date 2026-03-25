<?php
class SistemaLogin
{
    private string $usuarioCadastrado;
    private string $senhaCadastrada;
    private int $tentativas = 0;

    public function __construct(string $usuario, string $senha)
    {
        $this->usuarioCadastrado = $usuario;
        $this->senhaCadastrada = $senha;
    }

    public function validarSenha(string $senhaInformada): bool
    {
        if ($senhaInformada === $this->senhaCadastrada) {
            return true;
        }
        $this->tentativas++;
        return false;
    }

    public function verificarBloqueio(): string
    {
        if ($this->tentativas >= 3) {
            return "Conta Bloqueada";
        }
        return "Conta Ativa";
    }

    public function exibirStatus(string $usuarioInformado, string $senhaInformada): string
    {
        if ($this->tentativas >= 3) {
            return "Conta Bloqueada - Muitas tentativas falhas!";
        }

        if ($usuarioInformado !== $this->usuarioCadastrado) {
            return "Usuário Não Encontrado";
        }

        if ($this->validarSenha($senhaInformada)) {
            return "Autorizado";
        }

        return "Senha Incorreta (Tentativa {$this->tentativas} de 3)";
    }

    public function getTentativas(): int
    {
        return $this->tentativas;
    }
}
?>

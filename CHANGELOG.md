# Changelog

Todas as mudanças notáveis neste projeto serão documentadas neste arquivo.

O formato é baseado em [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), e este projeto adere ao [Versionamento Semântico](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2025-10-02

### Adicionado

-   **Lançamento inicial do pacote.**
-   Implementação do campo `NovaJqueryMask` para Laravel Nova.
-   Suporte para máscaras estáticas através do método `mask('000-000')`.
-   Suporte para opções do jQuery Mask Plugin através do método `options(['reverse' => true])`.
-   Implementação de atalhos para máscaras dinâmicas:
    -   `cpfCnpj()` para documentos CPF ou CNPJ.
    -   `telCel()` para números de telefone fixo ou celular.

# Campo de Máscara (jQuery Mask) para Laravel Nova

[![Latest Version on Packagist](https://img.shields.io/packagist/v/welkervinicius/nova-jquery-mask.svg?style=flat-square)](https://packagist.org/packages/welkervinicius/nova-jquery-mask)
[![Total Downloads](https://img.shields.io/packagist/dt/welkervinicius/nova-jquery-mask.svg?style=flat-square)](https://packagist.org/packages/welkervinicius/nova-jquery-mask)
[![License](https://img.shields.io/packagist/l/welkervinicius/nova-jquery-mask.svg?style=flat-square)](https://github.com/welkervinicius/nova-jquery-mask/blob/main/LICENSE.md)

Um campo de formulário para o Laravel Nova que integra a popular biblioteca [jQuery Mask Plugin](https://igorescobar.github.io/jQuery-Mask-Plugin/) de Igor Escobar. Permite aplicar máscaras de entrada de forma fácil e flexível em seus campos, incluindo máscaras dinâmicas para CPF/CNPJ e Telefone/Celular.

## Instalação

Você pode instalar o pacote via Composer:

```bash
composer require welkervinicius/nova-jquery-mask
```

## Uso

Depois de instalar, você pode usar o campo `NovaJqueryMask` nos seus Nova Resources.

### Exemplos de Uso

Aqui estão alguns exemplos de como utilizar os diferentes tipos de máscara disponíveis.

```php
// Em um Resource, ex: app/Nova/Client.php

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Welkervinicius\NovaJqueryMask\NovaJqueryMask;

class Client extends Resource
{
    // ...

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            // --- Máscaras Dinâmicas (Atalhos) ---

            // Muda automaticamente entre CPF e CNPJ enquanto o usuário digita.
            NovaJqueryMask::make('Documento', 'document')
                ->cpfCnpj()
                ->placeholder('CPF ou CNPJ'),

            // Muda automaticamente entre Telefone Fixo e Celular.
            NovaJqueryMask::make('Contato', 'phone_number')
                ->telCel()
                ->placeholder('Telefone ou Celular'),


            // --- Máscaras Estáticas ---

            // Uma máscara simples para CEP.
            NovaJqueryMask::make('CEP')
                ->mask('00000-000')
                ->placeholder('00000-000'),

            // Uma máscara para data.
            NovaJqueryMask::make('Data de Nascimento', 'birth_date')
                ->mask('00/00/0000'),


            // --- Máscara Estática com Opções ---

            // Usando a opção `reverse: true` para valores monetários.
            NovaJqueryMask::make('Valor', 'amount')
                ->mask('#.##0,00', ['reverse' => true])
                ->placeholder('R$ 1.234,56'),
        ];
    }
}
```

### Simplificando o Uso com um `alias`

Para um código mais limpo, você pode dar um "apelido" (alias) para a classe no momento da importação.

```php
// No topo do seu arquivo de Resource
use Welkervinicius\NovaJqueryMask\NovaJqueryMask as Mask;

// ...

// Agora você pode usar o nome curto
public function fields(Request $request)
{
    return [
        ID::make()->sortable(),

        Mask::make('Documento', 'document')->cpfCnpj(),

        Mask::make('Contato', 'phone_number')->telCel(),
    ];
}
```

## Changelog

Por favor, veja [CHANGELOG](CHANGELOG.md) para mais informações sobre o que mudou recentemente.

## Contribuições

Por favor, veja [CONTRIBUTING](CONTRIBUTING.md) para detalhes.

## Licença

The MIT License (MIT). Por favor, veja o [Arquivo de Licença](LICENSE.md) para mais informações.

<?php

namespace Welkervinicius\NovaJqueryMask;

use Laravel\Nova\Fields\Field;

class NovaJqueryMask extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-jquery-mask';

    /**
     * Define uma máscara estática a ser aplicada no input.
     *
     * @param  string  $mask
     * @return $this
     */
    public function mask(string $mask)
    {
        return $this->withMeta(['mask' => $mask]);
    }

    /**
     * Define as opções do jQuery Mask Plugin para máscaras estáticas.
     *
     * @param  array  $options
     * @return $this
     */
    public function options(array $options)
    {
        return $this->withMeta(['maskOptions' => $options]);
    }

    /**
     * Aplica a máscara dinâmica de CPF/CNPJ.
     *
     * @return $this
     */
    public function cpfCnpj()
    {
        // Envia um "sinal" para o componente Vue usar a lógica de CPF/CNPJ
        return $this->withMeta(['maskBehavior' => 'cpfCnpj']);
    }

    /**
     * Aplica a máscara dinâmica de Telefone Fixo/Celular.
     *
     * @return $this
     */
    public function telCel()
    {
        // Envia um "sinal" para o Vue usar a lógica de Telefone/Celular
        return $this->withMeta(['maskBehavior' => 'telCel']);
    }
}

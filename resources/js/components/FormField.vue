<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <input
        :id="field.attribute"
        type="text"
        class="w-full form-control form-input form-control-bordered"
        :class="errorClasses"
        :placeholder="field.name"
        v-model="value"
        ref="theInput"
      />
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import $ from 'jquery';
import 'jquery-mask-plugin';

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

  mounted() {
    const el = $(this.$refs.theInput);

    // --- LÓGICA DAS MÁSCARAS ---
    if (this.field.maskBehavior === 'cpfCnpj') {
      // LÓGICA CPF/CNPJ
      const CpfCnpjMaskBehavior = (val) => {
        var onlyDigits = val.replace(/\D/g, '');
        if (onlyDigits.length === 0) return '00.000.000/0000-00';
        if (onlyDigits.length > 11) return '00.000.000/0000-00';
        if (onlyDigits.length > 1) return '000.000.000-009';
      };
      const cpfCnpjOptions = {
        onKeyPress: function(val, e, field, options) {
          field.mask(CpfCnpjMaskBehavior(val), options);
        }
      };
      el.mask(CpfCnpjMaskBehavior, cpfCnpjOptions);

    } else if (this.field.maskBehavior === 'telCel') {
      // LÓGICA TELEFONE/CELULAR
      const TelCelMaskBehavior = (val) => {
        var onlyDigits = val.replace(/\D/g, '');
        if (onlyDigits.length === 0) return '(00) 00000-0000';
        if (onlyDigits.length > 10) return '(00) 00000-0000';
        if (onlyDigits.length > 1) return '(00) 0000-00009';
      };
      const telCelOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(TelCelMaskBehavior(val), options);
        }
      };
      el.mask(TelCelMaskBehavior, telCelOptions);

    } else if (this.field.mask) {
      // LÓGICA PADRÃO (MÁSCARA ESTÁTICA COM OPÇÕES)
      el.mask(this.field.mask, this.field.maskOptions || {});
    }
    // --- FIM DA LÓGICA ---

    // Atualiza o valor no Vue quando o jQuery o modifica
    el.on('change', () => {
      this.value = el.val();
    });
  },

  methods: {
    setInitialValue() {
      this.value = this.field.value || ''
    },

    fill(formData) {
      formData.append(this.fieldAttribute, this.value || '')
    },
  },
}
</script>

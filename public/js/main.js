import { InputMask } from "./helper/input-mask.js";

const cpfCnpjMask = new InputMask('[data-mask="cpf-cnpj"]', {
  mask: ['999.999.999-99', '99.999.999/9999-99'],
  keepStatic: true,
  removeMaskOnSubmit: true,
});

cpfCnpjMask.applyMask();



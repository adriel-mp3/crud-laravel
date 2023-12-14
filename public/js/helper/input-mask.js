/**
 * Classe para aplicar máscara de input utilizando jQuery Inputmask.
 * @class InputMask
 */
export class InputMask {
  /**
    * Cria uma instância da classe InputMask.
    * @constructor
    * @param {string} selector - Seletor jQuery.
    * @param {object} options - Opções de configuração para a máscara.
    */
  constructor(selector, options) {
    this.selector = selector;
    this.options = options;
  }
  /**
      * Aplica a máscara de input ao elemento selecionado.
      * @method
      * @returns {void}
      */
  applyMask() {
    $(document).ready(() => {
      $(this.selector).inputmask(this.options);
    });
  }
}
var instance = new Vue ({
  el: 'body',

  data: {
    codigo_barra: null,
    id_produto: null,
    quantidade: 0,
    produtos_venda: [],
    produto: []
  },

  methods: {
    add: function() {
        $.getJSON('/maraloja/venda/formVenda.php?barras=' + instance.codigo_barra,
          data => instance.produto = data
        );

        this.produtos_venda.push({
          quantidade: this.quantidade,
          produto: this.produto
        })
    },

    remover: function(produto_venda) {
      this.produtos_venda.forEach( function(el, i) {
        if(el == produto_venda)
          instance.produtos_venda.splice(i, 1);
      })
    }
  }

});

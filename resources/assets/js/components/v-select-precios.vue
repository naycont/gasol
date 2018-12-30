<template>

<v-select label="name" :filterable="false" :options="options" @search="onSearch">
  <template slot="no-options">
    Buscar Cliente..
  </template>
  <template slot="option" slot-scope="option">

      {{ option.nombre }}

  </template>
  <template slot="selected-option" slot-scope="option">

      {{ option.nombre }}
      <input type="hidden" name="cliente_id" v-model="option.id">
  </template>
</v-select>


</template>

<script>
    export default {
       props: ['options'],
        mounted() {
            console.log('Component mounted.');
        },
        methods:{
          onSearch: function(search, loading) {
            loading(true);
            let params = {
              token:search
              };

            axios.post('buscarSelect',params).then((response)=>{
              console.log(response.data);
              this.options=response.data;
               loading(false);
            });
          },

        }//methods
      }//default
</script>

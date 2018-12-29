<template>

</template>

<script>
    export default {
        data(){
          return {
            message :' hello'
          }
        },
        mounted() {
            console.log('Component mounted.');
             console.log('Upload component', this.message);
        }
    }
</script>

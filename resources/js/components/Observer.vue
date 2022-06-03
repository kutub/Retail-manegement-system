<template>
  <div class="observer"></div>
</template>

<script>
export default {
    name:'observer',
    data() {
        return {
            observer:null
        }
    },
    mounted() {
        this.observer = new IntersectionObserver(([entry]) => {
            alert(JSON.stringify(entry))
            if(entry && entry.isIntersecting){
                this.$emit('intersect');
            }
        })
        alert(JSON.stringify(this.observer));
        this.observer.observe(this.$el);
    },
}
</script>

<style>
.observer{
    height: 1px;
}
</style>
<template>
    <div>
        <SidebarComponent></SidebarComponent>
        <ClassdetailComponent></ClassdetailComponent>
    </div>
</template>

<script>
    import SidebarComponent from '../Nav/SidebarComponent.vue';
    import ClassdetailComponent from '../Class/ClassdetailComponent.vue';
    export default {
        name:'class',
        components:{
            SidebarComponent,
            ClassdetailComponent,

        }
    }
</script>

<style lang="stylus" scoped>

</style>

<template>
   <aside class="main-sidebar">
    <section class="sidebar">
      <!-- search form -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard">
            <router-link to="/products">
                <i class="fa fa-cube"></i> <span>Products</span>
                <span class="pull-right-container">
                </span>
            </router-link>
        </li>
        <li id="dashboard">
            <router-link to="/videos">
                <i class="fa fa-film"></i> <span>Videos</span>
                <span class="pull-right-container">
                </span>
            </router-link>
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
</template>
<script>
export default {
    name: 'Sidebar',
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
<style lang="scss">

</style>
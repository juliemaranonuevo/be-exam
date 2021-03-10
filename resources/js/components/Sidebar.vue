<template>
   <aside class="main-sidebar">
    <section class="sidebar">
      <!-- search form -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard">
            <router-link to="/products">
                <i class="fa fa-cube"></i> <span>Product List</span>
                <span class="pull-right-container">
                </span>
            </router-link>
        </li>
       
        <li v-for="(link, index) in url" :key="index" @click="passTheLink(link)">
            <router-link to="/videos" >
                {{ link }}
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
    data() {
        return {
            url: [
               '../../storage/videos/a.mp4',
               '../../storage/videos/b.mp4',
               '../../storage/videos/c.mp4',
               '../../storage/videos/d.mp4',
               '../../storage/videos/e.mp4',
            ],
        }
    },
    methods: {
        passTheLink(link) {
            this.$emit('videoLink', link)
        }
    }
}
</script>
<style lang="scss">

</style>
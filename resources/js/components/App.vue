<template>
    <div class="wrapper">
        <Header />
        <Sidebar />
        <div class="content-wrapper">
            <section class="content-header" style="margin-bottom: 50px;">
                <!-- <h1>
                Products
                <small>Create</small>
                </h1> -->
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active">Products</li>
                </ol>
            </section>
            <router-view></router-view>
        </div>
        <Footer />
    </div>
</template>

<script>
import Sidebar from './Sidebar';
import Header from './Header';
import Footer from './Footer';
export default {
    name: 'App',
     components: {
        Header,
        Sidebar,
        Footer
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
<style lang="scss">

</style>

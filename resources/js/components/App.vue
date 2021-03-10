<template>
    <div class="wrapper">
        <Header />
        <Sidebar @videoLink="loadTheVideo"/>
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
            <router-view :src="src"></router-view>
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
    data() {
        return {
            src: '../../storage/videos/a.mp4',
            response: ''
        }
    },
    components: {
        Header,
        Sidebar,
        Footer
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        loadTheVideo(link) {
            this.src = link;
        },
        getResponse(Res) {
            console.log('hahaha');
            // this.response = Res;
            // console.log(Res);
        }
    }
}
</script>
<style lang="scss">

</style>

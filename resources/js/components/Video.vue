<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
               <video
                    class="video-js vjs-big-play-centered"
                    controls 
                    preload="auto" 
                    width="640"
                    height="264"
                    ref="video-player"
                    autoplay 
                >
                    <source :src="src" type="video/mp4">
                </video>
                <br><br><br>
            </div>
        </div>
    </div>
</template>

<script>
import videojs from 'video.js';

export default {
    name: 'Video',
    props: [
        "src"
    ],
    
    mounted() {
        const element = this.$refs['video-player']
        videojs(element, {
            fluid: true
        }) 
    },

    updated(){
        
    },

    methods: {
    }
}
</script>
<style lang="scss">

</style>

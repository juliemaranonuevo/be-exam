<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <router-view @result="res" :displayResult="displayResult"/>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Product',
    data() {
        return {
            displayResult:''
        }
    },
    methods: {
        res(res) {
            this.displayResult = res;
        }
    }
}
</script>
<style lang="scss">

</style>

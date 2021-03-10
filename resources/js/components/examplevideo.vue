<template>
    <div class="container-fluid">
       examplevideo

       <select id="category" class="form-control" 
                                        name="type" parsley-trigger="change" 
                                        required
                                     
                                    >
                                        <option disabled selected>Select Category</option>
                                        <option 
                                         
                                        >
                                            s
                                        </option>
                                    </select>
    </div>
</template>

<script>

export default {
    name: 'examplevideo',

    mounted() {
        this.loadCategories();
    },
    methods: {
        // loadCategories() {
        //     const {categories} = axios.get(`api/v1/products/product-categories`);

        //     // const {data} = await axios.get(`api/v1/products`);
        //      console.log(data.categories);
        //     // this.categories = data.categories;
        //     // console.log(data.categories);
        // },

        loadCategories() {
            axios.get('api/v1/products')
            .then((res) => {
                console.log(res.data);
            })
            .catch((err) => {
                console.log(err);
            });
        }
    }
}
</script>
<style lang="scss">

</style>

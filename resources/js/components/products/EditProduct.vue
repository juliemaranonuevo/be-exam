<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div 
                    v-if="notification" 
                    :class="alertClass" 
                    role="alert"
                >
                    <div class="pull-right">
                        <button 
                            @click="notification = false" 
                            type="button" 
                            class="close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <ul 
                        v-if="errorMessage" 
                        class="mb-1">
                        <li v-for="msg in message" :key="msg">
                            {{ msg[0] }}
                        </li>
                    </ul>
                    <span v-else>
                        {{ message }}
                    </span>
                    
                </div>
                <router-link 
                    style="margin-top: 3px; margin-bottom: 5px;"
                    class="btn btn-success btn-md" 
                    to="/products"
                > 
                Back
                </router-link>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><strong>Update Product</strong></h3>
                    </div>
                    <div class="box-body">
                        <form @submit.prevent="submit">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label 
                                        for="name">
                                        Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        id="name" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Product name"
                                        required
                                        v-model="form.name"
                                    >
                                </div>
                                <div class="col-md-6 form-group">
                                    <label 
                                        for="category">
                                        Category
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        id="name" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Category name"
                                        required
                                        v-model="form.category"
                                    >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label 
                                        for="name">
                                        Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    
                                    <input 
                                        id="datepicker" 
                                        name="date_time" 
                                        type="date" 
                                        class="form-control" 
                                        placeholder="Enter Date and Time" 
                                        required
                                        v-model="form.date"
                                    >
                                </div>
                                <div class="col-md-6 form-group bootstrap-timepicker">
                                    <label 
                                        for="name">
                                        Time
                                        <span class="text-danger">*</span>
                                    </label>
                                    
                                    <input 
                                        type="time" 
                                        class="form-control" 
                                        required
                                        v-model="form.time"
                                    >
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label 
                                        for="category">
                                        Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="pad">
                                        <textarea 
                                            class="form-control"
                                            rows="10" 
                                            cols="115" 
                                            placeholder="Enter Description"
                                            v-model="form.description"
                                            required
                                        >
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <router-link 
                                        class="btn btn-default mr-2 text-danger" 
                                        to="/products"
                                    > 
                                    Cancel
                                    </router-link>
                                    <button 
                                        class="btn btn-success"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'EditProduct',
    data() {
        return {
            categories: [],
            imageCount: 0,
            imageFiles: '',
            form: {
               name: '',
               category: '',
               date: '',
               time: '',
               description: '',
            },
            ifAddingCategory: false,
            notification: false,
            errorMessage: false,
            message: [],
            alertClass: ''
        }
    },

    mounted() {
        this.getProductDetail();
        console.log(this.$route.params.productId);
    },

    methods: {  
        async getProductDetail() {
            const {data} = await axios.get(`/api/v1/products/${this.$route.params.productId}/edit`);
            console.log(data.data.name);

            this.form.name = data.data.name;
            this.form.category = data.data.category;
            this.form.date = data.date;
            this.form.time = data.time;
            this.form.description = data.data.description;

        },

        async submit() {
            const formData = new FormData();
            formData.append('name', this.form.name);
            formData.append('category', this.form.category);
            formData.append('date', this.form.date);
            formData.append('time', this.form.time);
            formData.append('description', this.form.description);

            await axios.post(`/api/v1/products/${this.$route.params.productId}/edit?_method=PUT`, formData, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            })
            .then((res) => {
                console.log(res.data.message);
                this.errorMessage = false;
                this.message = res.data.message;
                this.alertClass = 'alert alert-success alert-dismissible';
            })
            .catch((err) => {
                console.log(err);
                this.errorMessage = true;
                this.message = err.response.data.formErrors;
                this.alertClass = 'alert alert-danger alert-dismissible';
            });

            this.getProductDetail();
            this.notification = true;
        },

        resetForm() {
           this.form.name = '';
           this.form.category = '';
           this.form.date = '';
           this.form.time = '';
           this.form.description = '';
           this.imageCount = 0;
        },

        AddCategory() {
            this.ifAddingCategory = this.ifAddingCategory === true ? false : true;
        }
    },

    computed: {
        getId() {
            console.log(useRoute.params.productId);
        }
    }
}
</script>
<style>
.add-category {
cursor: pointer;
}

</style>
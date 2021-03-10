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
                        <h3 class="box-title"><strong>Add New Product</strong></h3>
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
                                    <div class="input-group">
                                        <input 
                                            id="name" 
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Category name"
                                            required
                                            v-model="form.category"
                                            v-if="ifAddingCategory"
                                        >
                                        <select v-else id="category" class="form-control" 
                                            name="type" parsley-trigger="change" 
                                            required
                                            v-model="form.category"
                                        >
                                            <option value="" disabled selected>Select Category</option>
                                            <option 
                                            v-for="(category, index) in categories"
                                                :key="index"
                                                :value="category.category"
                                            >
                                                {{ category.category }}
                                            </option>
                                        </select>
                                        <div class="input-group-addon">
                                            <span @click="AddCategory" class="add-category">
                                                <span v-if="ifAddingCategory">X</span>
                                                <span v-else title="To add new category">Add</span>
                                            </span>
                                        </div>
                                    </div>
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
                                <div class="col-md-12 form-group">
                                    <label 
                                        for="category">
                                        Upload Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        type="file" 
                                        multiple="multiple"
                                        class="form-control-file" 
                                        id="avatar"
                                        accept="image/*"
                                        style="display: none;"
                                        ref="selectedFile"
                                        @change="handleImageSelected"
                                        required
                                    >
                                    <br>
                                    <button 
                                        class="btn btn-secondary"
                                        @click.prevent="$refs.selectedFile.click()"
                                    >
                                        Click here! <strong v-if="imageCount !== 0">({{ imageCount }})</strong>
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button
                                        class="btn btn-light mr-2 text-danger" 
                                        @click.prevent="resetForm"
                                    >
                                        Cancel
                                    </button>
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
    name: 'AddProduct',
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
        this.loadCategories();
    },

    methods: {  
        async loadCategories() {
            const {data} = await axios.get(`/api/v1/products/product-categories`);
            this.categories = data.categories;
        },

        handleImageSelected(event) {
            event.target.files.value = null;
            this.imageCount = event.target.files.length;
            this.imageFiles = event.target.files;
        },

        async submit() {
            const formData = new FormData();
            
            for ( var i = 0; i < this.imageCount; i++ ) {
                let file = this.imageFiles[i];
                formData.append('images[' + i + ']', file);
            }
            
            formData.append('name', this.form.name);
            formData.append('category', this.form.category);
            formData.append('date', this.form.date);
            formData.append('time', this.form.time);
            formData.append('description', this.form.description);

            await axios.post(`/api/v1/products`, formData, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            })
            .then(() => {
                this.$router.push({ path: '/products' });
                this.resetForm();
            })
            .catch((err) => {
                console.log(err);
                this.errorMessage = true;
                this.message = err.response.data.formErrors;
                this.alertClass = 'alert alert-danger alert-dismissible';
            });

            
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
    }
}
</script>
<style>
.add-category {
cursor: pointer;
}

</style>
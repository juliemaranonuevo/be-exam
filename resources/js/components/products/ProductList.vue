<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-12">
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
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control type" 
                            name="type" parsley-trigger="change" 
                            required id="type"
                            style="margin-top: 10px;"
                            @change="selectCategory"
                            v-model="selectOptionValue"
                        >
                            <option value="All" selected>All Categories</option>
                            <option 
                                v-for="(category, index) in categories"
                                :key="index"
                                :value="category.category"
                            >
                                {{ category.category }}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-2">
                        <router-link 
                            to="/products/create"
                            class="btn btn-success btn-lg btn-block pull-right" 
                            style="margin-top: 3px; margin-bottom: 5px;"
                        >
                            Create
                        </router-link>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border mb-4">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="box-title"><strong>Product List</strong></h3>
                            </div>
                            <div class="col-md-3">
                                <div class="box-tools">
                                    <input 
                                        @input="search" 
                                        class="form-control mr-sm-2" 
                                        type="search" 
                                        placeholder="Search" 
                                        aria-label="Search"
                                        v-model="searchValue"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table style="overflow-x: auto; font-size: 15px;" class="table table-bordered
                            table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-justify" style="width: 30%;">Description</th>
                                    <th class="text-center">Date and Time</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr 
                                    v-if="items.total === 0"
                                >
                                    <td colspan="6" class="text-center">
                                        <strong>
                                            No Item Found
                                        </strong>
                                    </td>
                                </tr>
                                <tr 
                                    v-else 
                                    v-for="(item, index) in items.data"
                                    :key="index"
                                >
                                    <td>
                                        {{ index + 1 }}
                                    </td>
                                    <td>
                                        {{ item.name }}
                                    </td>
                                    <td>
                                        {{ item.category }}
                                    </td>
                                    <td>
                                        {{ item.description }}
                                    </td>
                                    <td>
                                        {{ item.dateTime }}
                                    </td>
                                    <td>
                                        <router-link 
                                            :to="'/products/' + item.id" 
                                            class="btn btn-warning"
                                        >   
                                            Edit
                                        </router-link>

                                        <button 
                                            class="btn btn-danger"
                                            @click="toDelete(item.id)"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div v-if="ifSearch" class="row" style="margin-top: -8px; margin-bottom: 25px;">
                    <div class="col-md-2">
                        <button 
                            class="btn btn-default btn-block p-3 mb-5"
                            @click="prev(items.page)"
                            :disabled="items.page === 1"
                        >
                            Prev
                        </button>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-2">
                        <button 
                            class="btn btn-default btn-block p-3 mb-5"
                            @click="next(items.page)"
                            :disabled="items.page === items.lastPage"
                        >
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'ProductList',
    props: [
        "res"
    ],
    data() {
        return {
            items: {
                data: [],
                total: '',
                page: '',
                lastPage: ''
            },
            ifSearch: true,
            categories: [],
            selectOptionValue: 'All',
            searchValue: '',
            ifAddingCategory: false,
            notification: false,
            errorMessage: false,
            message: [],
            alertClass: ''
        }
    },
    mounted() {
        this.loadItem();
        this.loadCategories();
    },
    methods: {
        async loadItem() {
            const {data} = await axios.get(`api/v1/products`);
            this.passTheData(data)
        },

        async loadCategories() {
            const {data} = await axios.get(`api/v1/products/product-categories`);
            this.categories = data.categories;
        },

        async next(page) {
            const {data} = await axios.get(`api/v1/products?page=${+page + 1}`);
            this.passTheData(data)
        },

        async prev(page) {
            const {data} = await axios.get(`api/v1/products?page=${+page - 1}`);
            this.passTheData(data)
        },

        async search(event) {
            let keyword = event.target.value;
        
            this.selectOptionValue = 'All';

            if (keyword != '') {
                const {data} = await axios.get(`/api/v1/products/search?query=${keyword}`);
                if (data.data != '') {

                    this.passTheData(data)

                } else {

                    this.items.total = 0;

                }

                this.ifSearch = false;

            } else {

                this.ifSearch = true;
                this.loadItem();
                
            }
        },

        async selectCategory(event) {
            let selectedOption = event.target.value;

            this.searchValue = '';

            if (selectedOption != 'All') {
                const {data} = await axios.get(`api/v1/products/filtered-by?query=${selectedOption}`);
                if (data.data != '') {

                    this.passTheData(data)

                } else {

                    this.items.total = 0;

                }

                this.ifSearch = false;

            } else {

                this.ifSearch = true;
                this.selectOptionValue ='All'
                this.loadItem();

            }
        },

        passTheData(data) {
            this.items.data = data.data;
            this.items.total = data.total;
            this.items.page = data.currentPage;
            this.items.lastPage = data.lastPage;
        },

        async toDelete(id) {
            if (confirm("Are you sure do you want to delete?")) {
                await axios.delete(`/api/v1/products/` + id, {
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
                    this.loadItem();
                    this.loadCategories();
                })
                .catch((err) => {
                    console.log(err);
                    this.errorMessage = true;
                    this.message = res.data.message;
                    this.alertClass = 'alert alert-danger alert-dismissible';
                });

                this.notification = true;

            } 
        }
    }
}
</script>
<style lang="scss">

</style>

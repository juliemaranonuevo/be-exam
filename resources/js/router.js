import Vue from 'vue';
import VueRouter from 'vue-router';
import Product from './pages/Product.vue';
import AddProduct from './components/products/AddProduct.vue';
import ProductList from './components/products/ProductList.vue';
import EditProduct from './components/products/EditProduct.vue';
import Video from './components/Video.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/',
            redirect: '/products'
        },
        {
            path: '/products',
            name: 'Product',
            component: Product,
            children: [
              {
                path: '',
                name: 'ProductList',
                component: ProductList
              },
              {
                path: 'create',
                name: 'AddProduct',
                component: AddProduct
              },
              {
                path: ':productId',
                name: 'EditProduct',
                component: EditProduct
              }
            ]
        },
        {
            path: '/videos',
            component: Video
        }
    ],
    mode: 'history'
});

import { createRouter, createWebHistory } from "vue-router";
import products from '../pages/products.vue';
import productCard from '../pages/productCard.vue';
import login from '../pages/login.vue';
import index from '../pages/index.vue';
import product_detail from '../pages/product_detail.vue';
import not_found from '../pages/not_found.vue';
import successPurchase from '../pages/successPurchase.vue';

const routes = [
    {
        path: '/',
        component: index,
        name: 'home' // Name for the home route
    },
    {
        path: '/products/shoes',
        component: products,
        name: 'shoes' // Name for the products route
    },
    {
        path: '/products/category/:id',
        component: products,
        name: 'shoesByCat' // Name for the products route
    },
    {
        path: '/products/bags',
        component: products,
        name: 'bags' // Name for the products route
    },
    {
        path: '/products/sunglasses',
        component: products,
        name: 'sunglasses' // Name for the products route
    },
    {
        path: '/products/jewellery',
        component: products,
        name: 'jewellery' // Name for the products route
    },
    {
        path: '/products/wallets',
        component: products,
        name: 'wallets' // Name for the products route
    },
    {
        path: '/product_detail/:id',
        component: product_detail ,
        name: 'product_detail'
        
    },
    {
        path: '/:pathMatch(.*)*', // Catch-all route for unknown paths
        component: not_found,
        name: 'not_found'
        
    },
    {
        path: '/user/login', // Catch-all route for unknown paths
        component: login,
        name: 'login'
        
    },
    {
        path: '/user/cart', // Catch-all route for unknown paths
        component: productCard,
        name: 'productCard'
    },
    {
        path: '/user/checkOut', // Catch-all route for unknown paths
        component: successPurchase,
        name: 'successPurchase'
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;

import { createRouter, createWebHistory } from "vue-router";
import products from '../pages/products.vue';
import productCard from '../pages/productCard.vue';
import login from '../pages/login.vue';
import index from '../pages/index.vue';
import product_detail from '../pages/product_detail.vue';
import not_found from '../pages/not_found.vue';
import successPurchase from '../pages/successPurchase.vue';
import formCheckOut from '../components/formCheckOut.vue';
import manageOrder from '../pages/manageOrder.vue';
import staff_orders from '../pages/staff_orders.vue';
import staff_shop from '../pages/staff_shop.vue';
import admin_staff from '../pages/admin_staff.vue';

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
        component: formCheckOut,
        name: 'formCheckOut'
    },
    {
        path: '/user/order', // Catch-all route for unknown paths
        component: manageOrder,
        name: 'manageOrder'
    },
    {
        path: '/user/successPurchase', // Catch-all route for unknown paths
        component: successPurchase,
        name: 'successPurchase'
    },
    {
        path: '/staff/orders', // Catch-all route for unknown paths
        component: staff_orders,
        name: 'staff_orders'
    },
    {
        path: '/staff/shop', // Catch-all route for unknown paths
        component: staff_shop,
        name: 'staff_shop'
    },
    {
        path: '/admin/staff', // Catch-all route for unknown paths
        component: admin_staff,
        name: 'admin_staff'
    },
  
    
    
      
]

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;

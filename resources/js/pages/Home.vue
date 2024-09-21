<template>
    <section class="w-full">
        <div>
            <tabs :list="tabs" :current_tab="current_tab" @handleChangeTab="changeCurrTab" />
            <div v-show="current_tab.toLowerCase() == 'products'" class="flex flex-wrap gap-4 justify-center p-5">
                <add-product-card @handleClick="showAddProductModal" />
                <product-card v-for="(product, index) in products" :key="index"
                    @handleToggleStatus="toggleProductStatus" :buttons="product_button(product)" v-bind="product" />
            </div>
            <div v-show="current_tab.toLowerCase() == 'orders'" class="w-full flex justify-center flex-col items-center">
                <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Product</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                    </thead>
                    <tbody>
                        <order v-for="(order, index)  in orders" :key="index" v-bind="order" />
                    </tbody>
                </table>
                <div class="w-full rounded-lg flex justify-between border-[1.5px] mt-4 h-[50px] items-center">
                    <div class="border-r-[1.5px] h-full flex items-center p-4">
                        <span class="font-semibold text-md">
                            Items :
                            <span>{{ orders.length }}</span>
                        </span>
                    </div>
                    <div class="p-4">
                        <span class="font-semibold text-md">Total : <span class="text-gray-800 font-bold">${{
                                ordersTotalAmount }}</span></span>
                    </div>
                </div>
            </div>
        </div>
        <modal :title="modal_title" :buttons="modal_buttons" :show="show_modal" @handleToggleModal="toggleModal"
            @handleModalSubmit="modal_submit">
            <template v-if="modal_type == 'add' || modal_type == 'update'" #modal-body>
                <form class="w-1/2 flex flex-col items-center">
                    <span v-if="product.id" class="w-full">
                        <label for="">ID</label>
                        <input type="text" disabled name="" :value="product.id" class="border rounded-lg p-2 w-full">
                    </span>
                    <span class="w-full">
                        <label for="">Name</label>
                        <input v-model="product.product_name" type="text" name="" id=""
                            class="border rounded-lg p-2 w-full">
                    </span>
                    <span class="w-full">
                        <label for="">Description</label>
                        <input v-model="product.product_description" type="text" name="" id=""
                            class="border rounded-lg p-2 w-full">
                    </span>
                    <span class="w-full">
                        <label for="">Price</label>
                        <input v-model="product.price" type="number" name="" id="" class="border rounded-lg p-2 w-full">
                    </span>
                    <span class="w-full">
                        <label for="">Quantity</label>
                        <input v-model="product.quantity" type="number" name="" id=""
                            class="border rounded-lg p-2 w-full">
                    </span>
                </form>
            </template>

            <template v-else-if="modal_type == 'delete'" #modal-body>
                <div>
                    <h2>Are your sure to delete this item ? <span class="italic font-semibold">`{{ product.product_name
                            }}` </span></h2>
                </div>
            </template>
        </modal>
    </section>
</template>

<script>
import AddProductCard from '../components/AddProductCard.vue';
import Modal from '../components/Modal.vue';
import Order from '../components/Order.vue';
import ProductCard from '../components/ProductCard.vue';
import Tabs from '../components/Tabs.vue';
import { Product } from '../data/product';
import { Order as Order_ } from '../data/order';

export default {
    components: {
        ProductCard,
        AddProductCard,
        Tabs,
        Modal,
        Order
    },
    data() {
        return {
            product: {
                id: null,
                product_name: null,
                product_description: null,
                price: null,
                quantity: null,
                status: true
            },
            modal_buttons: [],
            modal_title: null,
            modal_type: null,
            show_modal: false,
            current_tab: 'Products',
            tabs: ["Products", "Orders"],
            products: [],
            orders: []
        }
    },
    computed: {
        ordersTotalAmount() {
            console.log(this.orders.map(o => o.id))
            return this.orders.map(o => o.price).reduce((prevVal, currVal) => prevVal + currVal, 0)
        }
    },
    methods: {
        modal_submit() {
            switch (this.modal_type) {
                case "add":
                    return this.addProduct();
                case "update":
                    return this.updateProduct();
                case "delete":
                    return this.deleteProduct();
            }
        },
        toggleModal(val) {
            this.show_modal = val;
            if (!val) {
                this.product = {
                    id: null,
                    product_name: null,
                    product_description: null,
                    price: null,
                    quantity: null
                }
            }
        },
        showAddProductModal() {
            this.show_modal = true;
            this.modal_title = 'New Product';
            this.modal_buttons = ['Cancel', 'Submit'];
            this.modal_type = "add"
        },
        async addProduct() {
            const response = await Product.addProduct({ ...this.product });
            this.products = [...this.products, { ...response.data.product }];
            this.toggleModal(false);
        },
        async deleteProduct() {
            const response = await Product.deleteProduct(this.product.id);
            this.products = this.products.filter(p => p.id != this.product.id);
            this.toggleModal(false)
        },
        async updateProduct() {
            const response = await Product.updateProduct(this.product);
            this.toggleModal(false)
        },
        showUpdateModal() {
            this.toggleModal(true);
            this.modal_title = 'Update Product';
            this.modal_buttons = ['Close', 'Update'];
            this.modal_type = "update"
        },
        showDeleteModal() {
            this.toggleModal(true);
            this.modal_title = 'Delete Product';
            this.modal_buttons = ['Close', 'Delete'];
            this.modal_type = "delete"
        },
        product_button(product) {
            return [
                {
                    'type': 'Delete',
                    'onClick': () => {
                        this.showDeleteModal();
                        this.product = product;
                    }
                },
                {
                    'type': 'Edit',
                    'onClick': () => {
                        this.showUpdateModal();
                        console.log(product)
                        this.product = product;
                    }
                }
            ]
        },
        changeCurrTab(val) {
            this.current_tab = val;
        },
        async toggleProductStatus(id, status) {
            Product.updateStatus(id, status);
            this.products = this.products.map(p => {
                if (p.id === id) p.status = status
                return p
            })
        }
    },
    async beforeMount() {
        await Product.getAllProducts((products) => {
            const new_products = [...products]
            const new_product_last_id = new_products.length < 1 ? 1 : new_products[new_products.length - 1]['id'] + 1

            for (let i = new_product_last_id; i < new_product_last_id + 5; i++) {
                const product = {
                    id: i,
                    product_name: `Sample ${i}`,
                    product_description: `Sample ${i} Description`,
                    status: parseInt(Math.random() * 2),
                    price:  parseInt(Math.random() * 1000)
                }
                new_products.push(product)
            }
            
            this.products = [...new_products]
        })

        await Order_.get_all((orders) => {
            const new_orders = [...orders]

            const new_order_last_id = new_orders.length < 1 ? 1 : new_orders[new_orders.length - 1]['id'] + 1

            for (let i = new_order_last_id; i < new_order_last_id + 5; i++) {
                const order = {
                    id: i,
                    product_name: `sample ${i}`,
                    price: 1000
                }

                new_orders.push(order)
            }

            this.orders = [...new_orders]
        })
    }
}
</script>
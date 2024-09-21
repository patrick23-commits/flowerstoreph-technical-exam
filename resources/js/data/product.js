import axios from "axios";

export class Product {
    static async addProduct(product) {
        try {
            const response = await axios.post('http://127.0.0.1:8000/api/v1/product', product, {
                headers: {
                    'content-type': 'application/json'
                }
            });
            return response
        } catch {}
    }
    static async getAllProducts(callback) {
        try {
            const response = await axios.get('http://127.0.0.1:8000/api/v1/products');
            if(callback) callback(response.data)
        } catch {}
    }

    static async deleteProduct(id) {
        try {
            const response = await axios.delete(`http://127.0.0.1:8000/api/v1/product/${id}`);
            return response
        } catch {}
    }

    static async updateProduct(product) {
        const id = product.id;
        
        const columns_to_update = ['product_name', 'product_description', 'quantity', 'price'];

        const n_product_info = {}

        for(const key of columns_to_update) n_product_info[key] = product[key]

        try {
            const response = await axios.put(`http://127.0.0.1:8000/api/v1/product/${id}`, n_product_info);
            return response
        } catch {}
    }

    static async updateStatus(id, status) {
        try {
            const response = await axios.put(`http://127.0.0.1:8000/api/v1/product/${id}/status`, {status});
            return response
        } catch {}
    }
}
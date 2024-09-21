import axios from "axios";

export class Order {
    static async get_all(callback) {
        const response = await axios.get('http://127.0.0.1:8000/api/v1/orders');
        if(callback) callback(response.data)
    }
}
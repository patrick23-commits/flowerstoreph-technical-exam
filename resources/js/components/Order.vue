<script>
export default {
    props : {
        id : Number,
        product_name : String,
        price : Number
    }
}
</script>

<template>
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <td class="px-6 py-4">{{ id }}</td>
        <td class="px-6 py-4">{{ product_name }}</td>
        <td class="px-6 py-4">{{ price }}</td>
    </tr>
</template>

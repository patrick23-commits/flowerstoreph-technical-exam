<script>
export default {
    emits : ['handleToggleStatus'],
    props: {
        product_name: String,
        price: Number,
        product_description: String,
        status: Boolean,
        buttons: Array,
        id : Number
    },
    methods: {
        button_style(button) {
            button = button.toLowerCase();
            if (['delete'].indexOf(button) >= 0) return 'border-red-400 bg-red-300';
            else if (['update', 'edit'].indexOf(button) >= 0) return 'border-yellow-400 bg-yellow-300'
        }
    }
}
</script>

<template>
    <div
        class="flex border-[1.5px] py-3 px-5 min-h-fit h-[250px] flex-col gap-3 items-center min-w-[200px] w-[350px] max-w-[350px] flex-grow rounded-xl shadow-md">
        <div class="w-full flex justify-end">
            <div @click="() => $emit('handleToggleStatus', id, !status)" :class="status ? 'bg-green-500' : 'bg-gray-300'"
                class="relative inline-block w-8 h-4 transition duration-200 ease-linear rounded-full cursor-pointer">
                <!-- Toggle Knob -->
                <span :class="status ? 'translate-x-4' : 'translate-x-0'"
                    class="absolute left-0 w-4 h-4 transition duration-200 ease-linear transform bg-white rounded-full shadow"></span>
            </div>
        </div>
        <div class="flex-grow flex flex-col justify-center w-full">
            <span class="font-bold text-xl">{{ product_name }}</span>
            <span>{{ product_description }}</span>
            <span class="text-gray-400">$ {{ price }}</span>
        </div>
        <div class="flex w-full justify-between">
            <button :disabled="!status" v-for="(button, index) in buttons" :key="index" @click="button.onClick"
                :class="`disabled:bg-gray-300 disabled:border-none text-white rounded-lg py-2 px-3 border-2 ${button_style(button.type)}`">{{
                button.type }}</button>
        </div>
        <div class="flex items-center">
        </div>
    </div>
</template>
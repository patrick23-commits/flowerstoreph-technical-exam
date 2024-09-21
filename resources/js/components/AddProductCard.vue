<script>
export default {
    data() {
        return {}
    },
    emits : ['handleClick']
}
</script>

<template>
    <div
        @click="$emit('handleClick')"
        class="flex border-[1.5px] hover:cursor-pointer bg-gray-200 py-3 px-5 min-h-fit h-[250px] flex-col gap-3 items-center min-w-[200px] w-[350px] max-w-[350px] flex-grow rounded-xl shadow-md">
        <div class="flex-grow flex justify-center items-center">
            <span class="text-3xl text-gray-500 ">Add Product</span>
        </div>
    </div>
</template>
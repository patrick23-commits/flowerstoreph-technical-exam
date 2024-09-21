<script>

export default {
    props: ['list', 'current_tab'],
    emits : ['handleChangeTab']
}
</script>

<template>
    <div class="border flex gap-3 p-3">
        <span  v-for="(item, index) in list" :key="index" @click="() => $emit('handleChangeTab', item)"
            :class="` hover:cursor-pointer ${item == current_tab ? 'underline font-bold underline-offset-4' : ''}`">{{ item }}</span>
    </div>
</template>
<script>
export default {
    props : ['title', 'buttons', 'show'],
    data() {
        return {
        }
    },
    methods : {
        btn_style(btn_label) {
            btn_label = btn_label.toLowerCase();
            if(["submit", "ok", "login", 'update'].indexOf(btn_label) >= 0) return "bg-green-300 border-green-400 text-white";
            if(["delete"].indexOf(btn_label) >= 0) return "bg-red-300 border-red-400 text-white";
        }
    },
    emits : ['handleToggleModal', 'handleModalSubmit'],
    watch : {
        show(newVal, oldVal) {
            document.body.style.overflowY = newVal ? "hidden" : "auto"
        }
    }
}
</script>

<template>
    <section v-show="show" class="flex justify-center items-center fixed w-full h-full top-0 bg-[--blur]">
        <div id="modal-card" class="bg-white min-h-1/2 w-1/2 rounded-2xl flex flex-col">
            <div id="modal-header" class="flex items-center justify-between p-4 w-full">
                <span class="font-semibold text-xl w-full text-center uppercase">{{ title }}</span>
                <span @click="$emit('handleToggleModal', false)" class="hover:cursor-pointer text-red-400 border-2 border-red-500 rounded-full w-[20px] h-[20px] flex items-center justify-center">
                    <span class="translate-y-[-10%] font-bold">x</span>
                </span>
            </div>
            <div id="modal-body" class="w-full flex-grow flex justify-center">
                <slot name="modal-body"></slot>
            </div>
            <div id="modal-footer" class="w-full justify-between flex p-4">
                <button 
                    v-for="(button, index) in buttons" :key="index"
                    :class="`border-[1.5px] py-1.5 px-3 rounded-lg ${btn_style(button)}`"
                    @click="() => { ['cancel', 'close'].indexOf(button.toLowerCase()) >= 0 ? $emit('handleToggleModal', false) : $emit('handleModalSubmit') }"
                    >{{ button }}</button>
            </div>
        </div>
    </section>
</template>
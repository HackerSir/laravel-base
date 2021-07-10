<template>
    <div class="relative" @close.stop="open = false">
        <div @click="open = !open">
            <slot name="trigger"></slot>
        </div>
        <transition v-enter="['transition', 'ease-out', 'duration-200']"
                    v-enter-active="['transform', 'opacity-0', 'scale-95']"
                    v-enter-to="['transform', 'opacity-100', 'scale-100']"
                    v-leave="['transition', 'ease-in', 'duration-75']"
                    v-leave-active="['transform', 'opacity-100', 'scale-100']"
                    v-leave-to="['transform', 'opacity-0', 'scale-95']">
            <div v-show="open"
                 :class="['absolute', 'z-50', 'mt-2', 'rounded-md', 'shadow-lg', width, ...getAlignmentClasses()]"
                 style="display: none;"
                 @click="open = false">
                <div :class="['rounded-md', 'ring-1', 'ring-black', 'ring-opacity-5', 'py-1', 'bg-white']">
                    <slot name="content"></slot>
                </div>
             </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: "NavbarDropdown",
    props: {
        width: {
            type: String,
            required: false,
            default: 'w-48',
        },
        align: {
            type: String,
            required: false,
            default: 'right',
        },
    },
    data() {
        return {
            open: false,
        };
    },
    methods: {
        getAlignmentClasses() {
            if (this.align === 'left') {
                return ['origin-top-left', 'left-0'];
            } else if (this.align === 'top') {
                return ['origin-top'];
            } else {
                return ['origin-top-right', 'right-0'];
            }
        }
    }
}
</script>

<style scoped>

</style>

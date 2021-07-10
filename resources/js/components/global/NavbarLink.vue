<template>
    <a :class="getClasses()" :href="href">
        <slot></slot>
    </a>
</template>

<script>
export default {
    name: "NavbarLink",
    props: {
        active: {
            type: Boolean,
            required: false,
            default: false,
        },
        responsive: {
            type: Boolean,
            required: false,
            default: false,
        },
        href: {
            type: String,
            required: true,
        }
    },
    methods: {
        getClasses() {
            if (this.responsive) {
                if (this.active) {
                    return 'block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out';
                } else {
                    return 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
                }
            } else {
                if (this.active) {
                    return 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out';
                } else {
                    return 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
                }
            }
        }
    },
}
</script>

<style scoped>

</style>

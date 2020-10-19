<template>
    <InertiaLink :href="href" :class="classes">
        <slot></slot>
    </InertiaLink>
</template>
<script>
export default {
    props: ['href', 'active'],

    computed: {
        classes() {
            return this.active
                ? 'inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest focus:outline-none transition ease-in-out duration-150'
                : 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150'
        }
    }
}
</script>

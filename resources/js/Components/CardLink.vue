<template>
    <inertia-link :href="href" class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
        <slot></slot>
    </inertia-link>
</template>

<script>
export default {
    props: ['href'],
}
</script>

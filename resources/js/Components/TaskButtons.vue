<template>
    <div class="md:flex flex-wrap items-center justify-between mb-4">
        <div class="flex items-center space-x-2 flex-wrap">
            <ButtonLink :href="route('tasks.index')" :active="$page.currentRouteName == 'tasks.index'">All Tasks</ButtonLink>
            <ButtonLink :href="route('tasks.pending')" :active="$page.currentRouteName == 'tasks.pending'">Pending Tasks</ButtonLink>
            <ButtonLink :href="route('tasks.completed')" :active="$page.currentRouteName == 'tasks.completed'">Completed Tasks</ButtonLink>
        </div>
        <ButtonLink class="mt-2 md:mt-0" :href="route('tasks.create')" :active="$page.currentRouteName == 'tasks.create'">New Task</ButtonLink>
    </div>
</template>
<script>
import ButtonLink from "./ButtonLink";
export default {
    components:{
        ButtonLink
    }
}
</script>

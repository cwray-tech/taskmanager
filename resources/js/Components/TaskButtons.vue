<template>
    <div class="flex items-center justify-between mb-4">
        <div>
            <ButtonLink :href="route('tasks.index')" :active="$page.currentRouteName == 'tasks.index'">All Tasks</ButtonLink>
            <ButtonLink :href="route('tasks.pending')" :active="$page.currentRouteName == 'tasks.pending'">Pending Tasks</ButtonLink>
            <ButtonLink :href="route('tasks.completed')" :active="$page.currentRouteName == 'tasks.completed'">Completed Tasks</ButtonLink>
        </div>
        <ButtonLink :href="route('tasks.create')" :active="$page.currentRouteName == 'tasks.create'">New Task</ButtonLink>
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

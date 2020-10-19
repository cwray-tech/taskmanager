<template>
    <div class="flex items-center justify-between mb-4">
        <div>
            <ButtonLink :href="route('tasks.index')">All Tasks</ButtonLink>
            <ButtonLink :href="route('tasks.pending')">Pending Tasks</ButtonLink>
            <ButtonLink :href="route('tasks.completed')">Completed Tasks</ButtonLink>
        </div>
        <ButtonLink :href="route('tasks.create')">New Task</ButtonLink>
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

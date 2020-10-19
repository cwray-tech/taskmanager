<template>
    <div class="md:flex flex-wrap items-center justify-between mb-6">
        <div class="flex items-center flex-wrap">
            <ButtonLink class="mr-2" :href="route('tasks.index')" :active="$page.currentRouteName == 'tasks.index'">
                All
            </ButtonLink>

            <ButtonLink class="mr-2" :href="route('tasks.pending')" :active="$page.currentRouteName == 'tasks.pending'">
                Pending
            </ButtonLink>

            <ButtonLink class="mr-2"  :href="route('tasks.completed')" :active="$page.currentRouteName == 'tasks.completed'">
                Completed
            </ButtonLink>
        </div>
        <ButtonLink class="mt-2 md:mt-0" :href="route('tasks.create')" :active="$page.currentRouteName == 'tasks.create'">
            New Task
        </ButtonLink>
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

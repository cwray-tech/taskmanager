<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ user.current_team.name }} Tasks
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <TaskButtons></TaskButtons>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <TaskList :tasks="tasks"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from '../../Layouts/AppLayout'
import TaskList from '../../Components/TasksList'
import ButtonLink from '../../Components/ButtonLink'
import TaskButtons from "../../Components/TaskButtons";
export default {
    props:['tasks', 'user'],
    components: {
        TaskButtons,
        AppLayout,
        TaskList,
        ButtonLink
    },
}
</script>

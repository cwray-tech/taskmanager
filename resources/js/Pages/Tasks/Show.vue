<template>
    <app-layout>
        <template #header>
            <CardLink href="/tasks">Back to all Tasks</CardLink>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 flex justify-between py-5 border-b border-gray-200 sm:px-6">
                            <div class="w-3/4">
                                <h1 class="text-xl leading-6 font-medium text-gray-900">
                                    Task Details
                                </h1>
                                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                                    View more details about this task and who it is assigned to on the team.
                                </p>
                            </div>

                            <InertiaLink :href="route('tasks.edit', task.id)" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                                Edit Task
                            </InertiaLink>
                        </div>
                        <div class="px-4 py-5 sm:p-0">
                            <dl>
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                                    <dt class="text-sm leading-5 font-medium text-gray-500">
                                        Task Name
                                    </dt>
                                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ task.name }}
                                    </dd>
                                </div>
                                <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                                    <dt class="text-sm leading-5 font-medium text-gray-500">
                                        Assigned To
                                    </dt>
                                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ task.user ? task.user.name : 'This task has not yet been assigned.' }}
                                    </dd>
                                </div>
                                <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                                    <dt class="text-sm leading-5 font-medium text-gray-500">
                                        Additional Details
                                    </dt>
                                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ task.details }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from '../../Layouts/AppLayout'
import CardLink from "../../Components/CardLink";
export default {
    props:['task'],
    components: {
        AppLayout,
        CardLink
    },
}
</script>

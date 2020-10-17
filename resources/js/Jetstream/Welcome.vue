<template>
    <div>
        <div class="p-6  bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto"/>
            </div>

            <div class="mt-8 text-2xl">
                Get your tasks under control.
            </div>

            <div class="mt-6 text-gray-500">
                Task Manager is a simple app that makes it easy to manage and update your tasks.
            </div>
        </div>
        <div class="bg-gray-200 p-6 bg-opacity-25 grid gap-6 grid-cols-1 md:grid-cols-2">

            <div>
                <InertiaLink :href="route('projects.index')">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Projects
                    </h3>
                    <div class="mt-2 max-w-xl text-sm leading-5 text-gray-500">
                        <p>
                            View your teams projects and tasks you need to accomplish.
                        </p>
                    </div>
                </InertiaLink>
                <div class="mt-3 text-sm leading-5">
                    <CardLink :href="route('projects.index')">
                        View Projects
                    </CardLink>
                </div>
            </div>
            <div>
                <InertiaLink :href="route('tasks.index')">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Tasks
                    </h3>
                    <div class="mt-2 max-w-xl text-sm leading-5 text-gray-500">
                        <p>
                            View and complete your Tasks
                        </p>
                    </div>
                </InertiaLink>
                <div class="mt-3 text-sm leading-5">
                    <CardLink :href="route('tasks.index')">
                        View Tasks
                    </CardLink>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import JetApplicationLogo from './../Jetstream/ApplicationLogo'
import CardLink from "../Components/CardLink";

export default {
    components: {
        CardLink,
        JetApplicationLogo,
    },
}
</script>

<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a Task
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                        Saved.
                    </jet-action-message>
                    <form @submit.prevent="addTask">
                        <jet-label for="task_name" value="Task Name" />
                        <jet-input id="task_name" type="text" class="mt-1 block w-full" v-model="form.name" ref="task_name" />
                        <jet-input-error :message="form.error('name')" class="mt-2" />
                        <jet-label for="details" value="Additional Details" class="mt-4"/>
                        <textarea name="details"  class="form-input mb-4 mt-1 p-4 block w-full" v-model="form.details"></textarea>
                        <jet-input-error :message="form.error('details')" class="mt-2" />
                        <jet-button type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Add Task</jet-button>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from '../../Layouts/AppLayout'
import JetButton from "../../Jetstream/Button";
import JetInput from "../../Jetstream/Input";
import JetLabel from "../../Jetstream/Label";
import JetInputError from "../../Jetstream/InputError";
import JetActionMessage from "../../Jetstream/ActionMessage";
export default {
    components: {
        JetButton,
        AppLayout,
        JetInput,
        JetLabel,
        JetInputError,
        JetActionMessage
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                details: ''
            })
        }
    },
    methods: {
        addTask(){
            this.form.post(route('tasks.index'), {
                preserveScroll: true
            })
        },
    }
}
</script>

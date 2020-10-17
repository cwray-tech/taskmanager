<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit {{ task.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <form @submit.prevent="editTask">
                        <jet-label for="task_name" value="Task Name" />
                        <jet-input id="task_name" type="text" class="mt-1 block w-full" v-model="form.name" ref="task_name" />
                        <jet-input-error :message="form.error('name')" class="mt-2" />

                        <jet-label for="user_id" class="mt-4" value="Assigned To" />
                        <select id="user_id" name="user_id" v-model="form.user_id" class="form-select w-full rounded-md shadow-sm">
                            <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
                        </select>
                        <jet-input-error :message="form.error('user_id')" class="mt-2" />

                        <jet-label for="details" value="Additional Details" class="mt-4"/>
                        <textarea name="details"  class="form-input mb-4 mt-1 p-4 block w-full" v-model="form.details"></textarea>
                        <jet-input-error :message="form.error('details')" class="mt-2" />
                        <jet-button type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Save Changes</jet-button>
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
    props: ['users', 'task'],
    data() {
        return {
            form: this.$inertia.form({
                name: this.task.name,
                details: this.task.details,
                user_id: this.task.user_id,
                _method: 'PATCH'
            })
        }
    },
    methods: {
        editTask(){
            this.form.post(route('tasks.update', this.task.id), {
                preserveScroll: true
            })
        },
    }
}
</script>

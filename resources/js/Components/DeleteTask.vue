<template>
    <div>
        <div class="mt-5">
            <jet-danger-button @click.native="confirmTaskDeletion">
                Delete
            </jet-danger-button>
        </div>

        <!-- Delete Account Confirmation Modal -->
        <jet-dialog-modal :show="confirmingTaskDeletion" @close="confirmingTaskDeletion = false">
            <template #title>
                Delete Task
            </template>

            <template #content>
                Are you sure you want to delete this task?
            </template>

            <template #footer>
                <jet-secondary-button @click.native="confirmingTaskDeletion = false">
                    Nevermind
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click.native="deleteTask" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Delete Task
                </jet-danger-button>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
import JetButton from '../Jetstream/Button'
import JetDialogModal from '../Jetstream/DialogModal'
import JetDangerButton from '../Jetstream/DangerButton'
import JetInput from '../Jetstream/Input'
import JetInputError from '../Jetstream/InputError'
import JetSecondaryButton from '../Jetstream/SecondaryButton'

export default {
    components: {
        JetButton,
        JetDangerButton,
        JetDialogModal,
        JetInput,
        JetInputError,
        JetSecondaryButton,
    },
    props: [
      'task'
    ],
    data() {
        return {
            confirmingTaskDeletion: false,
            deleting: false,

            form: this.$inertia.form({
                '_method': 'DELETE',
            }, {
                bag: 'deleteTask'
            })
        }
    },

    methods: {
        confirmTaskDeletion() {
            this.confirmingTaskDeletion = true;
        },

        deleteTask() {
            this.form.post(route('tasks.destroy', this.task.id), {
                preserveScroll: true
            }).then(response => {
                if (! this.form.hasErrors()) {
                    this.confirmingTaskDeletion = false;
                }
            })
        },
    },
}
</script>

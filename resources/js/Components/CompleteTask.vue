<template>
    <!-- On: "bg-indigo-600", Off: "bg-gray-200" -->
    <span @click="toggle" :class="isComplete ? 'bg-indigo-600' : 'bg-gray-200'" role="checkbox" tabindex="0" aria-checked="false" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline">
    <!-- On: "translate-x-5", Off: "translate-x-0" -->
    <span aria-hidden="true" :class="isComplete ? 'translate-x-5' : 'translate-x-0'" class="translate-x-0 relative inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200">
    <!-- On: "opacity-0 ease-out duration-100", Off: "opacity-100 ease-in duration-200" -->
    <span :class="isComplete ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'" class="opacity-100 ease-in duration-200 absolute inset-0 h-full w-full flex items-center justify-center transition-opacity">
      <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
        <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </span>
      <!-- On: "opacity-100 ease-in duration-200", Off: "opacity-0 ease-out duration-100" -->
    <span class="opacity-0 ease-out duration-100 absolute inset-0 h-full w-full flex items-center justify-center transition-opacity">
      <svg class="h-3 w-3 text-indigo-600" fill="currentColor" viewBox="0 0 12 12">
        <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
      </svg>
    </span>
  </span>
</span>

</template>

<script>
export default {
    props: [
        'task'
    ],
    data() {
        return {
            loading: false,
            errored: false,
            isComplete: this.task.completed_at ? true : false
        }
    },
    methods: {
        toggle(){
            this.loading = true
            this.errored = false
            this.isComplete ? this.incomplete() : this.complete()
        },
        complete(){
            axios.post('/tasks/' + this.task.id + '/complete')
                .then(() => {
                this.isComplete = true
            })
            .catch((error)=>{
                this.errored = true
            })
        },
        incomplete(){

        }
    }
}
</script>

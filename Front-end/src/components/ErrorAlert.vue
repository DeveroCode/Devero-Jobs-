<script setup>
import { XMarkIcon, CheckCircleIcon } from '@heroicons/vue/24/outline'
import { useNotificationStore } from '@/stores/notification'

const notification = useNotificationStore();
</script>

<template>
    <div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6">
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
            <Transition enter-active-class="transform ease-out duration-300 transition"
                enter-from-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
                leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                leave-to-class="opacity-0">
                <div v-if="notification.mostrar"
                    class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white border-b-2"
                    :class="{ 'border-red-500': notification.error, 'border-icons': !notification.error }">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <XMarkIcon v-if="notification.error" class="h-6 w-6 text-red-400" aria-hidden="true" />
                                <CheckCircleIcon v-else class="h-6 w-6 text-green-400" aria-hidden="true" />
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5 font-popins">
                                <p class="text-sm font-medium text-gray-900 uppercase">
                                    {{ notification.texto }}
                                </p>
                                <div v-if="notification.errors.length > 0" class="list-disc text-sm text-gray-500">
                                    <p v-for="(error, index) in notification.errors" :key="index">{{
                    error
                }}
                                    </p>
                                </div>
                                <div v-else class="list-disc text-sm text-gray-500">
                                    <p>{{
                                        notification.success
                                        }}
                                    </p>
                                </div>
                            </div>
                            <!-- <div class="ml-4 flex flex-shrink-0">
                                <button type="button" @click="notification.show = false"
                                    class="inline-flex rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    :class="[notification.error ? 'bg-red-100' : 'bg-green-200']">
                                    <span class="sr-only">Close</span>
                                    <XMarkIcon class="h-5 w-5"
                                        :class="[notification.error ? 'text-red-400' : 'text-green-400']"
                                        aria-hidden="true" />
                                </button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </Transition>
        </div>
    </div>
</template>
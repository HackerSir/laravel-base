<template>
    <nav class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a :href="routes['dashboard']">
                            <application-logo></application-logo>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <navbar-link :href="routes['dashboard']" :active="routeIs('dashboard')">
                            Dashboard
                        </navbar-link>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <navbar-dropdown align="right" width="w-48">
                        <template #trigger>
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <span>{{ user['name'] }}</span>

                                <span class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                        </template>

                        <template #content>
                            <!-- Authentication -->
                            <button class="w-full text-left block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                    type="button" @click.prevent="$refs.logoutForm.submit()">
                                Logout
                            </button>
                        </template>
                    </navbar-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': !open}" class="sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <navbar-link :href="routes['dashboard']" :active="routeIs('dashboard')" :responsive="true">
                    Dashboard
                </navbar-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ user['name'] }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ user['email'] }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <button class="w-full text-left block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out"
                            type="button" @click.prevent="$refs.logoutForm.submit()">
                        Log Out
                    </button>
                </div>
            </div>
        </div>
        <form method="POST" :action="routes['logout']" ref="logoutForm">
            <input type="text" name="_token" :value="csrfToken" hidden>
        </form>
    </nav>
</template>

<script>
import ApplicationLogo from "./ApplicationLogo";
import NavbarDropdown from "./NavbarDropdown";
import NavbarLink from "./NavbarLink";
export default {
    name: "Navigation",
    components: {
        ApplicationLogo,
        NavbarDropdown,
        NavbarLink,
    },
    props: {
        routes: {
            type: Object,
            required: true,
        },
        user: {
            type: Object,
            required: true,
        },
        csrfToken: {
            type: String,
            required: true,
        },
        currentRoute: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            open: false,
        };
    },
    methods: {
        routeIs(targetRoute) {
            return this.currentRoute === targetRoute;
        },
    }
}
</script>

<style scoped>

</style>

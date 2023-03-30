<style scoped>
    .action-link {
        cursor: pointer;
    }
</style>

<template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        OAuth Clients
                    </span>

                    <a class="action-link" tabindex="-1" @click="showCreateClientForm">
                        Create New Client
                    </a>
                </div>
            </div>

            <div class="card-body">
                <!-- Current Clients -->
                <p class="mb-0" v-if="clients.length === 0">
                    You have not created any OAuth clients.
                </p>

                <table class="table table-borderless mb-0" v-if="clients.length > 0">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Name</th>
                            <th>Secret</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="client in clients">
                            <!-- ID -->
                            <td style="vertical-align: middle;">
                                {{ client.id }}
                            </td>

                            <!-- Name -->
                            <td style="vertical-align: middle;">
                                {{ client.name }}
                            </td>

                            <!-- Secret -->
                            <td style="vertical-align: middle;">
                                <code>{{ client.secret }}</code>
                            </td>

                            <!-- Edit Button -->
                            <td style="vertical-align: middle;">
                                <a class="action-link" tabindex="-1" @click="edit(client)">
                                    Edit
                                </a>
                            </td>

                            <!-- Delete Button -->
                            <td style="vertical-align: middle;">
                                <a class="action-link text-danger" @click="destroy(client)">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Create Client Modal -->
        <dialog ref="newClient" class="dialog rounded-2xl text-center" id="modal-create-client" tabindex="-1" aria-modal="true" aria-labelledby="label-modal-create-client">
            <header>
                <h4 id="label-modal-create-client">
                    Create Client
                </h4>
                <button type="button" class="rounded-full" onclick="this.closest('dialog').close('close')">
                    <i class="fa-solid fa-times" aria-hidden="true"></i>
                    <span class="sr-only">Close</span>
                </button>
            </header>
            <article class="text-left p-2">
                <div class="rounded p-2 text-white bg-red-500" v-if="createForm.errors.length > 0">
                    <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                    <ul>
                        <li v-for="error in createForm.errors">
                            {{ error }}
                        </li>
                    </ul>
                </div>

                <!-- Create Client Form -->
                <form role="form" class="w-full">
                    <!-- Name -->
                    <div class="form-group mb-2">
                        <label class="font-bold my-1 inline-block">Name</label>

                        <div class="">
                            <input id="create-client-name" type="text" class="rounded border w-full p-2"
                                   @keyup.enter="store" v-model="createForm.name">

                            <span class="form-text text-muted">
                                Something your users will recognize and trust.
                            </span>
                        </div>
                    </div>

                    <!-- Redirect URL -->
                    <div class="form-group mb-2">
                        <label class="font-bold my-1 inline-block">Redirect URL</label>

                        <div class="col-md-9">
                            <input type="text" class="rounded border w-full p-2" name="redirect"
                                   @keyup.enter="store" v-model="createForm.redirect">

                            <span class="form-text text-muted">
                                        Your application's authorization callback URL.
                                    </span>
                        </div>
                    </div>
                </form>

                <div class="block w-full grid grid-cols-2 gap-2">
                    <button type="button" class="rounded hover:bg-gray-700 hover:text-white p-2"  onclick="this.closest('dialog').close('close')">Close</button>

                    <button type="button" class="rounded p-2 bg-blue-600 text-white uppercase hover:bg-blue-800" @click="store">
                        Create
                    </button>
                </div>
            </article>
        </dialog>

        <!-- Edit Client Modal -->
        <dialog ref="editClient" class="dialog rounded-2xl text-center" id="modal-edit-client" tabindex="-1" aria-modal="true" aria-labelledby="label-modal-edit-client">
            <header>
                <h4 id="label-modal-edit-client">
                    Edit Client
                </h4>
                <button type="button" class="rounded-full" onclick="this.closest('dialog').close('close')">
                    <i class="fa-solid fa-times" aria-hidden="true"></i>
                    <span class="sr-only">Close</span>
                </button>
            </header>
            <article class="text-left p-2">
                <div class="rounded p-2 text-white bg-red-500" v-if="editForm.errors.length > 0">
                    <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                    <ul>
                        <li v-for="error in editForm.errors">
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <!-- Edit Client Form -->
                <form role="form" class="w-full">
                    <!-- Name -->
                    <div class="form-group mb-2">
                        <label class="font-bold inline-block my-1">Name</label>

                        <div class="">
                            <input id="edit-client-name" type="text" class="rounded border w-full p-2"
                                   @keyup.enter="update" v-model="editForm.name">

                            <span class="form-text text-muted">
                                        Something your users will recognize and trust.
                                    </span>
                        </div>
                    </div>

                    <!-- Redirect URL -->
                    <div class="form-group mb-2">
                        <label class="font-bold inline-block my-1">Redirect URL</label>

                        <div class="">
                            <input type="text" class="rounded border w-full p-2" name="redirect"
                                   @keyup.enter="update" v-model="editForm.redirect">

                            <span class="form-text text-muted">
                                        Your application's authorization callback URL.
                                    </span>
                        </div>
                    </div>

                    <div class="block w-full grid grid-cols-2 gap-2 mt-5">
                        <button type="button" class="rounded hover:bg-gray-700 hover:text-white p-2"  onclick="this.closest('dialog').close('close')">Close</button>

                        <button type="button" class="rounded p-2 bg-blue-600 text-white uppercase hover:bg-blue-800" @click="update">
                            Save Changes
                        </button>
                    </div>
                </form>
            </article>
        </dialog>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                clients: [],

                createForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                },

                editForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                }
            };
        },

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.getClients();

                $('#modal-create-client').on('shown.bs.modal', () => {
                    $('#create-client-name').focus();
                });

                $('#modal-edit-client').on('shown.bs.modal', () => {
                    $('#edit-client-name').focus();
                });
            },

            /**
             * Get all of the OAuth clients for the user.
             */
            getClients() {
                axios.get('/oauth/clients')
                        .then(response => {
                            this.clients = response.data;
                        });
            },

            /**
             * Show the form for creating new clients.
             */
            showCreateClientForm() {
                this.$refs.newClient.showModal();
            },

            /**
             * Create a new OAuth client for the user.
             */
            store() {
                this.persistClient(
                    'post', '/oauth/clients',
                    this.createForm, '#modal-create-client'
                );
            },

            /**
             * Edit the given client.
             */
            edit(client) {
                this.editForm.id = client.id;
                this.editForm.name = client.name;
                this.editForm.redirect = client.redirect;

                this.$refs.editClient.showModal();
            },

            /**
             * Update the client being edited.
             */
            update() {
                this.persistClient(
                    'put', '/oauth/clients/' + this.editForm.id,
                    this.editForm, '#modal-edit-client'
                );
            },

            /**
             * Persist the client to storage using the given form.
             */
            persistClient(method, uri, form, modal) {
                form.errors = [];

                axios[method](uri, form)
                    .then(response => {
                        this.getClients();

                        form.name = '';
                        form.redirect = '';
                        form.errors = [];

                        this.$refs.newClient.close('close');
                        this.$refs.editClient.close('close');
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            form.errors = _.flatten(_.toArray(error.response.data.errors));
                        } else {
                            form.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },

            /**
             * Destroy the given client.
             */
            destroy(client) {
                axios.delete('/oauth/clients/' + client.id)
                        .then(response => {
                            this.getClients();
                        });
            }
        }
    }
</script>

<style scoped>
    .action-link {
        cursor: pointer;
    }
</style>

<template>
    <div>
        <div>
            <div class="card card-default">
                <div class="card-header mb-2">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span>
                            Personal Access Tokens
                        </span>

                        <a class="cursor-pointer" tabindex="-1" @click="showCreateTokenForm">
                            Create New Token
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- No Tokens Notice -->
                    <p class="mb-0" v-if="tokens.length === 0">
                        You have not created any personal access tokens.
                    </p>

                    <!-- Personal Access Tokens -->
                    <table class="table table-borderless mb-0 w-full text-left" v-if="tokens.length > 0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="token in tokens" class="border-b border-slate-600">
                                <!-- Client Name -->
                                <td style="vertical-align: middle;" class="px-0 py-2">
                                    {{ token.name }}
                                </td>

                                <!-- Delete Button -->
                                <td style="vertical-align: middle;" class="px-0 py-2 text-right">
                                    <a class="cursor-pointer text-red-500" @click="revoke(token)">
                                        <i class="fa-solid fa-trash" aria-hidden="true"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Create Token Modal -->
        <dialog ref="newToken" class="dialog rounded-2xl text-center" id="modal-create-token" tabindex="-1" aria-modal="true" aria-labelledby="label-modal-create-token">
            <header>
                <h4 id="label-modal-create-token">
                    Create Token
                </h4>
                <button type="button" class="rounded-full" onclick="this.closest('dialog').close('close')">
                    <i class="fa-solid fa-times" aria-hidden="true"></i>
                    <span class="sr-only">Close</span>
                </button>
            </header>
            <article>
                <div class="rounded p-2 text-white bg-red-500" v-if="form.errors.length > 0">
                    <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                    <ul>
                        <li v-for="error in form.errors">
                            {{ error }}
                        </li>
                    </ul>
                </div>

                <!-- Create Token Form -->
                <form role="form" class="w-full text-left" @submit.prevent="store">
                    <!-- Name -->
                    <div class="mb-4">
                        <label class="font-bold">Name</label>

                        <div class="">
                            <input id="create-token-name" type="text" class="w-full rounded border p-2" name="name" v-model="form.name">
                        </div>
                    </div>

                    <!-- Scopes -->
                    <div class="mb-4" v-if="scopes.length > 0">
                        <label class="font-bold">Scopes</label>

                        <div v-for="scope in scopes">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           @click="toggleScope(scope.id)"
                                           :checked="scopeIsAssigned(scope.id)">

                                    {{ scope.id }}
                                </label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="block w-full grid grid-cols-2 gap-2">
                    <button type="button" class="rounded hover:bg-gray-700 hover:text-white p-2" onclick="this.closest('dialog').close('close')">Close</button>

                    <button type="button" class="rounded p-2 bg-blue-600 text-white uppercase hover:bg-blue-800" @click="store">
                        Create
                    </button>
                </div>
            </article>
        </dialog>

        <!-- Access Token Modal -->
        <dialog ref="accessToken" class="dialog rounded-2xl text-center" id="modal-access-token" tabindex="-1" aria-modal="true" aria-labelledby="label-modal-access-token">
            <header>
                <h4 id="label-modal-access-token">
                    Personal Access Token
                </h4>
                <button type="button" class="rounded hover:bg-gray-700 hover:text-white p-2" onclick="this.closest('dialog').close('close')">
                    <i class="fa-solid fa-times" aria-hidden="true"></i>
                    <span class="sr-only">Close</span>
                </button>
            </header>
            <article class="text-left p-2">
                <p>
                    Here is your new personal access token. This is the only time it will be shown so don't lose it!
                    You may now use this token to make API requests.
                </p>

                <textarea class="rounded border w-full p-2" rows="8">{{ accessToken }}</textarea>


                <button type="button" class="rounded hover:border p-2"  onclick="this.closest('dialog').close('close')">Close</button>
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
                accessToken: null,

                tokens: [],
                scopes: [],

                form: {
                    name: '',
                    scopes: [],
                    errors: []
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
                this.getTokens();
                this.getScopes();

                $('#modal-create-token').on('shown.bs.modal', () => {
                    $('#create-token-name').focus();
                });
            },

            /**
             * Get all of the personal access tokens for the user.
             */
            getTokens() {
                axios.get('/oauth/personal-access-tokens')
                        .then(response => {
                            this.tokens = response.data;
                        });
            },

            /**
             * Get all of the available scopes.
             */
            getScopes() {
                axios.get('/oauth/scopes')
                        .then(response => {
                            this.scopes = response.data;
                        });
            },

            /**
             * Show the form for creating new tokens.
             */
            showCreateTokenForm() {
                this.$refs.newToken.showModal();
            },

            /**
             * Create a new personal access token.
             */
            store() {
                this.accessToken = null;

                this.form.errors = [];

                axios.post('/oauth/personal-access-tokens', this.form)
                        .then(response => {
                            this.form.name = '';
                            this.form.scopes = [];
                            this.form.errors = [];

                            this.tokens.push(response.data.token);

                            this.showAccessToken(response.data.accessToken);


                        })
                        .catch(error => {
                            if (typeof error.response.data === 'object') {
                                this.form.errors = _.flatten(_.toArray(error.response.data.errors));
                            } else {
                                this.form.errors = ['Something went wrong. Please try again.'];
                            }
                        });
            },

            /**
             * Toggle the given scope in the list of assigned scopes.
             */
            toggleScope(scope) {
                if (this.scopeIsAssigned(scope)) {
                    this.form.scopes = _.reject(this.form.scopes, s => s == scope);
                } else {
                    this.form.scopes.push(scope);
                }
            },

            /**
             * Determine if the given scope has been assigned to the token.
             */
            scopeIsAssigned(scope) {
                return _.indexOf(this.form.scopes, scope) >= 0;
            },

            /**
             * Show the given access token to the user.
             */
            showAccessToken(accessToken) {

                this.$refs.newToken.close('close');
                this.accessToken = accessToken;

                this.$refs.accessToken.showModal();
            },

            /**
             * Revoke the given token.
             */
            revoke(token) {
                axios.delete('/oauth/personal-access-tokens/' + token.id)
                        .then(response => {
                            this.getTokens();
                        });
            }
        }
    }
</script>

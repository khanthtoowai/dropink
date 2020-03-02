<template>
    <div>
        <button type="button" class="mx-5 btn btn-outline-success btn-sm" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],
        data() {
            return {
                status: this.follows,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            followUser() {
                axios.post('/follows/' + this.userId)
                    .then((response) => {
                        console.log(response.data);
                        this.status = !this.status;
                    })
                    .catch(errors => {
                        // console.log(errors.response.status == 401);
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },
        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        },
        
    }
</script>

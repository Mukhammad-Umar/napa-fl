<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome </div>

                    <div class="card-body">
                        Hi guest!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods:{
        changeVar1(){
            this.$store.commit('increment');
        }
    },

    computed: {
        var1() {
            return this.$store.state.count;
        }
    }
}

</script>

<style>

</style>

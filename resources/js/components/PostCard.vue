<template>
<div class="row justify-content-center">
    <div class="col-md-8 mb-5">
        <div class="card post-image-container">

            <template v-if="imageUrl">
                <div class="post-image" :style="{ backgroundImage: 'url(' + imageUrl + ')' }">
                    <a :href="imageUrl" target="_blank" rel="noopener noreferrer"></a>
                </div>
            </template>

            <h4 class="card-header m-0"><a :href="postUrl"><slot name="title"></slot></a></h4>

            <div class="card-body"><slot name="body"></slot></div>

            <div class="card-footer">
                <div v-if="editUrl || deleteUrl" class="float-right pt-1 text-muted">
                    <a v-if="editUrl" class="m-2" :href="editUrl" data-toggle="tooltip" data-placement="top" title="Edit this post"><i class="fas fa-pen-square"></i></a>
                    <a v-if="deleteUrl" class="m-2" href="#" @click="submitDeleteForm" data-toggle="tooltip" data-placement="top" title="Delete this post"><i class="fas fa-trash"></i></a>
                    <form class="d-none" ref="deleteForm" method="post" :action="deleteUrl">
                        <slot name="deleteformfields"></slot>
                    </form>
                </div>
                <small><i class="fas fa-user-circle mr-1"></i>Posted <template v-if="user">by {{ user }}</template> {{ updatedAt }}</small>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        user: String,
        postUrl: String,
        editUrl: String,
        deleteUrl: String,
        updatedAtString: String,
        imageUrl: String
    },

    mounted: function() {
        $('[data-toggle="tooltip"]').tooltip();
    },

    computed: {
        updatedAt: function() {
            return Moment(this.updatedAtString).fromNow();
        }
    },

    methods: {
        submitDeleteForm: function() {
            this.$refs.deleteForm.submit();
        }
    }
}
</script>

<style>
.post-image {
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 50vw;
}
.post-image > a {
    width: 100%;
    height: 100%;
    display: inline-block;
}
.post-image-container {
    overflow: hidden;
}
</style>

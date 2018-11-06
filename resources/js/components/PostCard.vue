<template>
<div class="row justify-content-center">
    <div class="col-md-8 mb-5">
        <div class="card">

            <div class="card-header">
                <h4 class="m-0"><a :href="postUrl"><slot name="title"></slot></a></h4>
            </div>

            <div class="card-body"><slot name="body"></slot></div>

            <div class="card-footer">
                <div v-if="editUrl || deleteUrl" class="float-right pt-1 text-muted">
                    <a v-if="editUrl" class="m-2" :href="editUrl"><i class="fas fa-pen-square"></i></a>
                    <a v-if="deleteUrl" class="m-2" href="#" @click="submitDeleteForm"><i class="fas fa-trash"></i></a>
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
        updatedAtString: String
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

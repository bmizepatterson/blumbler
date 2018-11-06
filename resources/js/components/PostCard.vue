<template>
<div class="row justify-content-center">
    <div class="col-md-8 mb-5">
        <div class="card">

            <div class="card-header"><h4 class="m-0"><slot name="title"></slot></h4></div>

            <div class="card-body"><slot name="body"></slot></div>

            <div class="card-footer">
                <small><i class="fas fa-user-circle mr-1"></i>Posted by {{ user }} {{ updatedAt }}</small>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        user: String,
        updatedAtString: String
    },

    computed: {
        updatedAt: function() {
            return Moment(this.updatedAtString).fromNow();
        }
    }
}
</script>

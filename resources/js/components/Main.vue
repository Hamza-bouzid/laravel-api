<template>
    <main>
        <div class="post" v-for="(post, index) in posts" :key="index">
          <h2>{{post.title}}</h2>
          <p>{{post.content}}</p>
        </div>
    </main>
</template>

<script>
export default {
    name: "Main",

    data() {
        return {
            posts: [],
        };
    },

    methods: {
        getPosts: function () {
            axios
                .get("api/posts")
                .then((response) => {
                    
                    this.posts = response.data;
                    console.log(this.posts);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },

    created() {
        this.getPosts();
    },
};
</script>

<style lang="scss" scoped></style>

<template>
    <main>
        <div class="post" v-for="(post, index) in posts" :key="index">
            <h2>{{ post.title }}</h2>
            <p v-html="post.content"></p>
            <div v-if="post.category_id">
                <div v-for="category in categories" :key="category.slug">
                    <span v-if="post.category_id == category.id">
                        Category: {{ category.name }}
                    </span>
                </div>
            </div>
            <div v-else>
                <span>Category: -</span>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    name: "Main",

    data() {
        return {
            posts: [],
            categories: [],
        };
    },

    methods: {
        getPosts: function () {
            axios
                .get("api/posts")
                .then((response) => {
                    this.posts = response.data.posts;
                    this.categories = response.data.categories;
                    console.log(response.data);
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

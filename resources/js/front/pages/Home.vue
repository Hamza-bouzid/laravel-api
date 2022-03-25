<template>
    <div>
        <h1>Home page</h1>
        <div class="posts">
            <div class="post" v-for="(post, index) in posts" :key="index">
                <div class="post-img">
                    <img v-if="post.image" :src="`/storage/${post.image}`" />
                    <img
                        v-else
                        src="https://venngage-wordpress.s3.amazonaws.com/uploads/2018/09/Colorful-Circle-Simple-Background-Image-1.jpg"
                    />
                </div>
                <div class="post-title">
                    <h3>{{ post.title }}</h3>
                </div>
                <div class="post-category">
                    <span v-if="post.category"
                        >Category: {{ post.category.name }}</span
                    >
                </div>
                <div class="post-content">
                    <p v-html="post.content"></p>
                </div>
                <button><router-link :to="{ name: 'post', params:{slug: post.slug}}">Home</router-link></button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home",

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
                    //this.categories = response.data.categories;
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

<style lang="scss" scoped>
.posts {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    background-color: rgb(240, 238, 238);
    padding: 50px 0px;

    .post {
        width: 30%;
        height: 600px;
        margin-bottom: 50px;
        background-color: #fff;

        &-img {
            height: 200px;
        }

        &-content {
            max-height: 200px;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }
}
</style>

<template>
    <header>
      <nav>
        <li><router-link :to="{ name: 'home'}">Home</router-link></li>
        <li><router-link :to="{ name: 'about-us'}">About Us</router-link></li>
      </nav>
    </header>
</template>

<script>
export default {
    name: 'Header',
};
</script>

<style lang="scss" scoped></style>

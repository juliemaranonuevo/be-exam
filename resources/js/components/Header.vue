<template>
   <header class="main-header">
    <a href="" class="logo">
      <span class="logo-mini"><b>PE</b></span>
      <span class="logo-lg"><b>PRAXXYS - Exam</b></span>
    </a>
    <nav class="navbar navbar-static-top ">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
             <a href="" class="btn btn-flat" @click="logout">Sign out</a>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
    name: 'Header',
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        async logout() {
            await axios.post(`/logout`, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            })
            .then((res) => {
                console.log(res);
            })
            .catch((err) => {
                console.log(err);
            });
        }
    }
}
</script>
<style lang="scss">

</style>
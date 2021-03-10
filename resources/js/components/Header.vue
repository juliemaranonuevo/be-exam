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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="" class="user-image" alt="User Image">
              <span class="hidden-xs">Juliemar</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="" class="img-circle" alt="User Image">
                s
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/users/change-password" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="" class="btn btn-default btn-flat" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Sign out</a>
                </div>
              </li>
            </ul>
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
    }
}
</script>
<style lang="scss">

</style>
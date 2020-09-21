<template>
  <div class="container">
    <nav>
      <router-link :to="{ name: 'home' }" class="navbar-brand">CAR COMMUNITY</router-link>
      <ul class="nav navbar-light bg-light justify-content-end">
        <li class="nav-item">
         <router-link :to="{ name: 'timeline' }" class="navbar-link">Timeline</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'Chat' }" class="navbar-link">Chat</router-link>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
          <div class="dropdown-menu">
            <router-link :to="{ name: 'profile' }" class="dropdown-item">Description</router-link>
            <router-link :to="{ name: 'image' }" class="dropdown-item">Images</router-link>
            <router-link :to="{ name: 'friend' }" class="dropdown-item">Friend</router-link>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link col-lg-2" data-toggle="modal" data-target="#modal-logout" href="#">Logout</a>
        </li>
      </ul>
    </nav>
  </div>

      <!-- Modal -->
  <div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Logout</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Logout</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {


    }
</script>
  
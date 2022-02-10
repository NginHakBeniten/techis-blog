<template>
  <ul class="sidebar-nav">
    <li class="nav-item">
      <router-link to="/admin/dashboard" class="nav-link">
        <i class="nav-icon bi bi-speedometer2"></i> Dashboard
      </router-link>
    </li>
    <li class="nav-item">
      <router-link to="/admin/user" class="nav-link">
        <i class="nav-icon bi bi-people"></i> Users
      </router-link>
    </li>
    <li class="nav-item">
      <router-link to="/admin/article" class="nav-link">
        <i class="nav-icon bi bi-journal-text"></i> Articles
      </router-link>
    </li>
    <li class="nav-item">
      <router-link to="/admin/tag" class="nav-link">
        <i class="nav-icon bi bi-tag"></i> Tags
      </router-link>
    </li>
    <li class="nav-item">
      <router-link to="/admin/activity-log" class="nav-link">
        <i class="nav-icon bi bi-activity"></i> Activities
      </router-link>
    </li>
  </ul>
</template>

<script>
export default {
  setup() {},
};
</script>

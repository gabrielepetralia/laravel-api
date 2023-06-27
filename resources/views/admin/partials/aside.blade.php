<aside>
  <ul class="list-unstyled">
    <li>
      <a href="{{ route('admin.home') }}" class="{{ Route::currentRouteName() === 'admin.home' ? "active" : ""}}"><i class="fa-solid fa-chart-line me-2"></i> Dashboard</a>
    </li>
    <li>
      <a href="{{ route('admin.projects.index') }}" class="{{ str_contains(Route::currentRouteName(), 'admin.projects') || str_contains(Route::currentRouteName(), 'admin.orderby') ? "active" : ""}}"><i class="fa-solid fa-diagram-project me-2"></i> Projects</a>
    </li>
    <li>
      <a href="{{ route('admin.types.index') }}" class="{{ Route::currentRouteName() === 'admin.types.index' ? "active" : ""}}"><i class="fa-solid fa-folder-tree me-2"></i> Types</a>
    </li>
    <li>
      <a href="{{ route('admin.technologies.index') }}" class="{{ Route::currentRouteName() === 'admin.technologies.index' ? "active" : ""}}"><i class="fa-solid fa-laptop-code me-2"></i></i> Technologies</a>
    </li>
  </ul>
</aside>

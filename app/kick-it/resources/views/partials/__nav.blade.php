 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/welcome') }}">
                              <img height="50px;" src="../../storage/logo.png">
                          </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/explore') }}">Explore <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/projects') }}">Start a project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/blog') }}">Blog <span class="sr-only"></span></a>
                  </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/stripe') }}">Add credits</a>
                </li>
              </ul>
          
             <!-- Authentication Links -->
             @guest
                                      <li class="nav-item">
                                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                      </li>
                                      @if (Route::has('register'))
                                          <li class="nav-item">
                                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                          </li>
                                      @endif
                                  @else
                                      
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                          <img src="../../storage/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; margin-right:10px; border-radius:50%">
                                          {{ Auth::user()->name }} <span class="caret"></span>
                                      </a>
                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                              <a class="dropdown-item">
          
                                              Current credits: {{ Auth::user()->credits }}
                                              </a>
                                              @if (Auth::user())
                                            @if(Auth::user()->isAdmin())
                                                <a class="dropdown-item" href="{{ url('/posts') }}">Create a post</a>
                                                  <a class="dropdown-item" href="{{ url('/categories') }}">Create Categories</a>
                                                  <a class="dropdown-item" href="{{ url('/tags') }}">Create tags</a>
                                                    <a class="dropdown-item" href="{{ url('/abouts') }}">Manage About Page</a>
                                                      <a class="dropdown-item" href="{{ url('/privacys') }}">Manage Privacy Page</a>
                                            @endif
                                          @endif
                                              <a class="dropdown-item" href="{{ url('/profile') }}">
                                              Profile
                                              </a>
                                              <a class="dropdown-item" href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                  {{ __('Logout') }}
                                              </a>
          
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                  @csrf
                                              </form>
                                          </div>
                                      
                                  @endguest
          
          </nav>
          
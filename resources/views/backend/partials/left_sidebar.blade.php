<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image"> 
          {{-- <img src="/images/faces/face4.jpg" alt="image"/>  --}}
          <span class="online-status online"></span> </div>
        <div class="profile-name">

           <p class="name"> </p>
      
          <p class="designation">Admin</p>
          <div class="badge badge-teal mx-auto mt-3">Online</div>
        </div>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link" href="">
      <span class="menu-title">Dashboard</span></a>
    </li>
    

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> 
        <span class="menu-title">Manage Designation</span>
        </i></a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.designation.index')}}">Designation</a></li>
          </ul>
        </div>
      </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#introduction-pages" aria-expanded="false" aria-controls="introduction-pages"> 
        <span class="menu-title">Manage introduction</span>
        </i></a>
        <div class="collapse" id="introduction-pages">
          <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.introduction.index')}}">Manage Introduction</a>
            </li>
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#skill-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Manage Categories</span></i></a>
          <div class="collapse" id="skill-pages">
          <ul class="nav flex-column sub-menu">

              <li class="nav-item"> <a class="nav-link" href="{{route('admin.skill.index')}}">Manage skill</a>
            </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#experience-pages" aria-expanded="false" aria-controls="general-pages"> 
            <span class="menu-title">
            Manage experience</span></i></a>
            <div class="collapse" id="experience-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.experience.index')}}">Manage experience</a></li>
        
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#education-pages" aria-expanded="false" aria-controls="general-pages"> <span class="menu-title">
            Manage education</span></i></a>
            <div class="collapse" id="education-pages">
              <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.education.index')}}">Add education</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#service-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-title">
              Manage services</span></i></a>
              <div class="collapse" id="service-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.service.index')}}">Add service</a></li>
                </ul>
              </div>
            </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#contact-pages" aria-expanded="false" aria-controls="general-pages"> <span class="menu-title">
            Manage contact</span></i></a>
            <div class="collapse" id="contact-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.contact.index')}}">Manage contact</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#social-pages" aria-expanded="false" aria-controls="general-pages"> <span class="menu-title">
            Manage social</span></i></a>
            <div class="collapse" id="social-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.social.index')}}">Manage social</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#footer-pages" aria-expanded="false" aria-controls="general-pages"> <span class="menu-title">
            Manage footer</span></i></a>
            <div class="collapse" id="footer-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.footer.index')}}">Manage footer</a></li>
              </ul>
            </div>
          </li>




          </ul>
        </nav>
        <!-- partial -->

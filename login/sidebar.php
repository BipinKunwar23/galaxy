<?php 
require_once "sidebarcss.php";
?>

  <nav class="sidebar close">
      <header>
         
          <i class='bx bx-chevron-right toggle'></i>
      </header>

      <div class="menu-bar">
          <div class="menu">

              <li class="search-box">
                  <i class='bx bx-search icon'></i>
                  <input type="text" placeholder="Search...">
              </li>

              <ul class="menu-links">
                  <li class="nav-link">
                      <a href="#">
                          <i class='bx bx-home-alt icon' ></i>
                          <span class="text nav-text">Rooms</span>
                      </a>
                  </li>

                  <li class="nav-link">
                      <a href="#">
                          <i class='bx bx-bar-chart-alt-2 icon' ></i>
                          <span class="text nav-text">About Us</span>
                      </a>
                  </li>

                  <li class="nav-link">
                      <a href="#">
                          <i class='bx bx-bell icon'></i>
                          <span class="text nav-text">Gallery</span>
                      </a>
                  </li>

                  <li class="nav-link">
                      <a href="#">
                          <i class='bx bx-pie-chart-alt icon' ></i>
                          <span class="text nav-text">Offers</span>
                      </a>
                  </li>

                  <li class="nav-link">
                      <a href="#">
                          <i class='bx bx-heart icon' ></i>
                          <span class="text nav-text">Events</span>
                      </a>
                  </li>

                  <li class="nav-link">
                      <a href="#">
                          <i class='bx bx-wallet icon' ></i>
                          <span class="text nav-text">Contact Us</span>
                      </a>
                  </li>

              </ul>
          </div>

          <div class="bottom-content">
              <li class="">
                  <a href="#">
                      <i class='bx bx-log-out icon' ></i>
                      <span class="text nav-text">Logout</span>
                  </a>
              </li>

              <li class="mode">
                  <div class="sun-moon">
                      <i class='bx bx-moon icon moon'></i>
                      <i class='bx bx-sun icon sun'></i>
                  </div>
                  <span class="mode-text text">Dark mode</span>

                  <div class="toggle-switch">
                      <span class="switch"></span>
                  </div>
              </li>
              
          </div>
      </div>

  </nav>

  <section class="home">
      <div class="text">Dashboard Sidebar</div>
  </section>

  <script>
      const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
  sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
  sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
  body.classList.toggle("dark");
  
  if(body.classList.contains("dark")){
      modeText.innerText = "Light mode";
  }else{
      modeText.innerText = "Dark mode";
      
  }
});
  </script>


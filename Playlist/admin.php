   <?php
   session_start();

   include "koneksi.php";

   //check jika belum ada user yang login arahkan ke halaman login
   if (!isset($_SESSION['username'])) {
      header("location:login.php");
   }
   ?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Ferdian's Playlist | Admin</title>
      <link rel="icon" href="img/fe.png" />
      <link
         rel="stylesheet"
         href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
      <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
         rel="stylesheet"
         integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
         crossorigin="anonymous" />
      <style>
         html {
            position: relative;
            min-height: 100%;
         }

         body {
            margin-bottom: 100px;
            /* Margin bottom by footer height */
         }

         .nav-padding {
            padding: 15px 20px;
         }

         .shared-padding {
            padding: 40px 40px;
         }

         footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px;
            /* Set the fixed height of the footer here */
         }

         .glass {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(20px);
            backdrop-filter: saturation(1.8);
            border-bottom: 1px solid rgba(46, 45, 45, 0.18);
         }
      </style>
   </head>

   <body>
      <!-- nav begin -->
      <!-- navigasi bar -->
      <nav class="navbar sticky-top navbar-expand-lg nav-padding glass">
         <div class="container-fluid">
            <a class="navbar-brand" href="#">Administrator Page</a>
            <button
               class="navbar-toggler"
               type="button"
               data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent"
               aria-expanded="false"
               aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link" href="admin.php?page=dashboard">Dashboard</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="admin.php?page=artikel">Article</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="logout.php">Logout</a>
                  </li>
               </ul>

               <!-- mode switch -->
               <div class="dropdown ms-4 ms-auto" id="themeDropdown">
                  <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="bi-sun-fill theme-icon-active"
                        data-theme-icon-active="bi-sun-fill"></i>
                  </button>

                  <ul class="dropdown-menu dropdown-menu-end my-2" aria-labelledby="dropdownMenuButton" data-bs-popper="static">
                     <li>
                        <button class="dropdown-item d-flex align-item-center" type="button" data-bs-theme-value="light">
                           <i class="bi bi-sun-fill me-2 opacity-50" data-theme-icon="bi-sun-fill"></i>
                           Light
                        </button>
                     </li>
                     <li>
                        <button class="dropdown-item d-flex align-item-center" type="button" data-bs-theme-value="dark">
                           <i class="bi bi-moon-stars-fill me-2 opacity-50" data-theme-icon="bi-moon-stars-fill"></i>
                           Dark
                        </button>
                     </li>

                  </ul>
               </div>
               <!-- end -->

            </div>
         </div>
      </nav>
      <!-- content begin -->

      <section id="content" class="p-5">
         <div class="container">
            <?php
            if (isset($_GET['page'])) {
            ?>
               <h4 class="lead display-6 pb-2 border-bottom border-secondary-subtle"><?= ucfirst($_GET['page']) ?></h4>
            <?php
               include($_GET['page'] . ".php");
            } else {
            ?>
               <h4 class="lead display-6 pb-2 border-bottom border-danger-subtle">Dashboard</h4>
            <?php
               include("dashboard.php");
            }
            ?>
         </div>
      </section>
      <!-- content end -->

      <!-- footer begin -->
      <footer class="py-3 my-4 shared-padding">
         <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item">
               <a href="https://www.instagram.com/ferdianfariza/" class="nav-link px-2 text-body-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                     <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                  </svg></a>
            </li>
            <li class="nav-item">
               <a href="https://x.com/ferdianfarizaa" class="nav-link px-2 text-body-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                     <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                  </svg></a>
            </li>
            <li class="nav-item">
               <a href="https://wa.me/qr/ERC5GURZ64X5H1" class="nav-link px-2 text-body-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                     <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                  </svg></a>
            </li>
            <li class="nav-item">
               <a href="https://www.linkedin.com/in/ferdian-nur-fariza-651965273/" class="nav-link px-2 text-body-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                     <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                  </svg></a>
            </li>
         </ul>
         <p class="text-center text-body-secondary">© 2024 Ferdian Nur Fariza</p>
         <br>

         <script>
            (() => {
               'use strict';

               const setTheme = (theme) => {
                  document.documentElement.setAttribute('data-bs-theme', theme);
                  localStorage.setItem('theme', theme);
                  updateGlassBackground(theme);
               };

               const getStoredTheme = () => localStorage.getItem('theme') || 'light';

               const updateActiveThemeIcon = (theme) => {
                  const themeIconActive = document.querySelector('.theme-icon-active');
                  const activeButton = document.querySelector(`[data-bs-theme-value="${theme}"]`);
                  const newIconClass = activeButton.querySelector('i').dataset.themeIcon;

                  themeIconActive.classList.remove(themeIconActive.dataset.themeIconActive);
                  themeIconActive.classList.add(newIconClass);
                  themeIconActive.dataset.themeIconActive = newIconClass;
               };

               const showActiveTheme = (theme) => {
                  document.querySelectorAll('[data-bs-theme-value]').forEach((btn) => {
                     btn.classList.remove('active');
                     btn.setAttribute('aria-pressed', 'false');
                  });

                  const activeButton = document.querySelector(`[data-bs-theme-value="${theme}"]`);
                  if (activeButton) {
                     activeButton.classList.add('active');
                     activeButton.setAttribute('aria-pressed', 'true');
                  }

                  updateActiveThemeIcon(theme);
               };

               const updateGlassBackground = (theme) => {
                  const glassElements = document.querySelectorAll('.glass');
                  glassElements.forEach((element) => {
                     if (theme === 'dark') {
                        element.style.background = 'rgb(29, 29, 31, 0.5)';
                     } else {
                        element.style.background = 'rgba(255, 255, 255, 0.5)';
                     }
                  });
               };

               const initialTheme = getStoredTheme();
               setTheme(initialTheme);
               showActiveTheme(initialTheme);

               document.querySelectorAll('[data-bs-theme-value]').forEach((btn) => {
                  btn.addEventListener('click', () => {
                     const selectedTheme = btn.getAttribute('data-bs-theme-value');
                     setTheme(selectedTheme);
                     showActiveTheme(selectedTheme);
                  });
               });
            })();
         </script>
      </footer>
      <!-- footer end -->
      <script
         src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
         crossorigin="anonymous"></script>
   </body>

   </html>
  </head>

  <body>

    <header class="page-header">
      <!-- topline -->
      <div class="page-header__topline clearfix">
        <div class="container">
          <div class="currency">
            <svg height="24px" width="24px" fill="#111" viewBox="0 0 26 32">
              <path d="M14.4 5.52v-.08q0-.56.36-1t.92-.44 1 .36.48.96-.36 1-.96.4l-.24.08.08.12-.08.44-.16 1.28q.08.08.08.16l-.16.8q-.08.16-.16.24l-.08.32q-.16.64-.28 1.04t-.2.64V12q-.08.4-.12.64t-.28.8q-.16.32 0 1.04l.08.08q0 .24.2.56t.2.56q.08 1.6-.24 2.72l.16.48q.96.48.56 1.04l.4.16q.96.48 1.36.84t.8.76q.32.08.48.24l.24.08q1.68 1.12 3.36 2.72l.32.24v.08l-.08.16.24.16h.08q.24.16.32.16h.08q.08 0 .16-.08l.16-.08q.16-.16.32-.24h.32q.08 0 0 .08l-.32.16-.4.48h.56l.56.08q.24-.08.4-.16l.4-.24q.24-.08.48.16h.08q.08.08-.08.24l-.96.88q-.4.32-.72.4l-1.04.72q-.08.08-.16 0l-.24-.32-.16-.32-.2-.28-.24-.32-.2-.24-.16-.2-.32-.24q-.16 0-.32-.08l-1.04-.8q-.24 0-.56-.24-1.2-1.04-1.6-1.28l-.48-.32-.96-.16q-.48-.08-1.28-.48l-.64-.32q-.64-.32-.88-.32l-.32-.16q-.32-.08-.48-.16l-.16-.16q-.16 0-.32.08l-1.6.8-2 .88q-.8.64-1.52 1.04l-.88.4-1.36.96q-.16.16-.32 0l-.16.16q-.24.08-.32.08l-.32.16v.16h-.16l-.16.24q-.16.32-.32.36t-.2.12-.08.12l-.16.16-.24.16-.36-.04-.48.08-.32.08q-.4.08-.64-.12t-.4-.6q-.16-.24.16-.4l.08-.08q.08-.08.24-.08h.48L1.6 26l.32-.08q0-.16.08-.24.08-.08.24-.08v-.08q-.08-.16-.08-.32-.08-.16-.04-.24t.08-.08h.04l.08.24q.08.4.24.24l.08-.16q.08-.16.24-.16l.16.16.16-.16-.08-.08q0-.08.08-.08l.32-.32q.4-.48.96-.88 1.12-.88 2.4-1.36.4-.4.88-.4.32-.56.96-1.2.56-.4.8-.56.16-.32.4-.32H10l.16-.16q.16-.08.24-.16v-.4q0-.4.08-.64t.4-.24l.32-.32q-.16-.32-.16-.72h-.08q-.16-.24-.16-.48-.24-.4-.32-.64h-.24q-.08.24-.4.32l-.08.16q-.32.56-.56.84t-.88.68q-.4.4-.56.88-.08.24 0 .48l-.08.16h.08q0 .16.08.16h.08q.16.08.16.2t-.24.08-.36-.16-.2-.12l-.24.24q-.16.24-.32.2t-.08-.12l.08-.08q.08-.16 0-.16l-.64.16q-.08.08-.2 0t.04-.16l.4-.16q0-.08-.08-.08-.32.16-.64.08l-.4-.08-.08-.08q0-.08.08-.08.32.08.8-.08l.56-.24.64-.72.08-.16q.32-.64.68-1.16t.76-.84l.08-.32q.16-.32.32-.56t.4-.64l.24-.32q.32-.48.72-.48l.24-.24q.08-.08.08-.24l.16-.16-.08-.08q-.48-.4-.48-.72-.08-.56.36-.96t.88-.36.68.28l.16.16q.08 0 .08.08l.32.16v.24q.16.16.16.24.16-.24.48-.56l.4-1.28q0-.32.16-.64l.16-.24v-.16l.24-.96h.16l.24-.96q.08-.24 0-.56l-.32-.8z">
              </path>
            </svg>
          </div>

          <ul class="login">

            <li class="login__item">
              <?php
              if (!isset($_SESSION['customer_email'])) {
                echo '<a href="customer_register.php" class="login__link">Register</a>';
              } else {
                echo '<a href="my_account.php?my_orders" class="login__link">My Account</a>';
              }
              ?>
            </li>


            <li class="login__item">
              <?php
              if (!isset($_SESSION['customer_email'])) {
                echo '<a href="checkout.php" class="login__link">Sign In</a>';
              } else {
                echo '<a href="./logout.php" class="login__link">Logout</a>';
              }
              ?>

            </li>
          </ul>

        </div>
      </div>
      <!-- bottomline -->
      <div class="page-header__bottomline">
        <div class="container">

          <div class="logo">
            <a class="logo__link" href=".././index.php">
              <!-- <img class="logo__img" src="images/logo.png" alt="Avenue fashion logotype" width="237" height="19"> -->
              <svg class="pre-logo-svg" height="60px" width="60px" fill="#111" viewBox="0 0 69 32">
                <path d="M68.56 4L18.4 25.36Q12.16 28 7.92 28q-4.8 0-6.96-3.36-1.36-2.16-.8-5.48t2.96-7.08q2-3.04 6.56-8-1.6 2.56-2.24 5.28-1.2 5.12 2.16 7.52Q11.2 18 14 18q2.24 0 5.04-.72z">
                </path>
              </svg>
            </a>
          </div>

          <nav class="main-nav">
            <ul class="categories">

              <li class="categories__item">
                <a class="categories__link" href="#">
                  Mens

                </a>
              </li>

              <li class="categories__item">
                <a class="categories__link" href="#">
                  Womens

                </a>
              </li>

              <li class="categories__item">
                <a class="categories__link categories__link--active" href=".././shop.php">
                  Shop
                </a>
              </li>

              <li class="categories__item">
                <a class="categories__link" href="#">
                  Local Stores
                </a>
              </li>

              <li class="categories__item">
                <a class="categories__link categories__link--control-drop" href="my_account.php?my_orders">
                  My Account
                  <i class="icon-down-open-1"></i>
                </a>
                <div class="dropdown dropdown--lookbook">
                  <div class="clearfix">
                    <div class="dropdown__half">
                      <div class="dropdown__heading">Account Settings</div>
                      <ul class="dropdown__items">
                        <li class="dropdown__item">
                          <a href="#" class="dropdown__link">My Wishlist</a>
                        </li>
                        <li class="dropdown__item">
                          <a href="./my_account.php?my_orders" class="dropdown__link">My Orders</a>
                        </li>
                        <li class="dropdown__item">
                          <a href="../cart.php" class="dropdown__link">View Shopping Cart</a>
                        </li>
                      </ul>
                    </div>
                    <div class="dropdown__half">
                      <div class="dropdown__heading"></div>
                      <ul class="dropdown__items">
                        <li class="dropdown__item">
                          <a href="./my_account.php?edit_account" class="dropdown__link">Edit Your Account</a>
                        </li>
                        <li class="dropdown__item">
                          <a href="./my_account.php?change_pass" class="dropdown__link">Change Password</a>
                        </li>
                        <li class="dropdown__item">
                          <a href="./my_account.php?delete_account" class="dropdown__link">Delete Account</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

              </li>

              <li class="categories__item">
                <div class="basket">
                  <a href="../cart.php" class="btn btn--basket">
                    <i class="icon-basket"></i>
                    <?php items(); ?>
                    <span> items</span>
                  </a>
                </div>
              </li>

            </ul>
          </nav>
        </div>
      </div>
    </header>
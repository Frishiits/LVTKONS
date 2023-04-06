<?php
include("backend/function.php");
MicrosoftInfo();
Invalid_seasson($_SESSION['email']);
?>


<header class="u-clearfix u-custom-color-1 u-header u-header" id="sec-fe6d">
  <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-sheet-1">
    <a href="index.php" class="u-image u-logo u-image-1" data-image-width="198" data-image-height="50">
      <img src="images/logo_new_balts.png" class="u-logo-image u-logo-image-1">
    </a>
    <nav class="u-menu u-menu-one-level u-menu-open-right u-offcanvas u-menu-1" data-responsive-from="MD"
        data-submenu-level="on-click" data-position=""><div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
        <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
          href="#">
          <svg class="u-svg-link" viewBox="0 0 24 24">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
          </svg>
          <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px"
            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
            <g>
              <rect y="1" width="16" height="2"></rect>
              <rect y="7" width="16" height="2"></rect>
              <rect y="13" width="16" height="2"></rect>
            </g>
          </svg>
        </a>
      </div>
      <div class="u-custom-menu u-nav-container">
        <ul class="u-nav u-unstyled u-nav-1">
          <li class="u-nav-item"><a
              class="u-button-style u-nav-link u-text-active-palette-4-light-3 u-text-body-alt-color u-text-hover-custom-color-3"
              href="index.php" style="padding: 10px 20px;">Sākumlapa</a>
          </li>
          <li class="u-nav-item"><a
              class="u-button-style u-nav-link u-text-active-palette-4-light-3 u-text-body-alt-color u-text-hover-custom-color-3"
              href="pieteikties.php" style="padding: 10px 20px;">Pieteikties</a>
          </li>
          <li class="u-nav-item"><a
              class="u-button-style u-nav-link u-text-active-palette-4-light-3 u-text-body-alt-color u-text-hover-custom-color-3"
              href="Info.php" style="padding: 10px 20px;">Informācija</a>
          </li>
        </ul>
      </div>
      <div class="u-custom-menu u-nav-container-collapse">
          <div
            class="u-border-2 u-border-black u-container-style u-custom-color-2 u-inner-container-layout u-sidenav u-sidenav-1"
            data-offcanvas-width="200">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul
                class="u-align-center u-custom-font u-font-georgia u-nav u-popupmenu-items u-spacing-5 u-text-white u-unstyled u-nav-2">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Sākumlapa</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="#">Pieteikties</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="#">Informācija</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
    </nav>
  </div>
</header>
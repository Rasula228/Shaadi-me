import { Component, HostListener } from '@angular/core';

@Component({
  selector: 'app-navbar',
  standalone: false,
  templateUrl: './navbar.component.html',
  styleUrl: './navbar.component.scss'
})
export class NavbarComponent {
  isMenuOpen = false;
  navItems = [
    { label: 'Cities', fragment: 'cities' },
    { label: 'Decor Styles', fragment: 'decor' },
    { label: 'Themes', fragment: 'themes' },
    { label: 'Venues', fragment: 'venues' },
    { label: 'FAQ', fragment: 'faq' }
  ];

  toggleMenu() {
    this.isMenuOpen = !this.isMenuOpen;
  }

  closeMenu() {
    this.isMenuOpen = false;
  }
}

import { Component, OnInit } from '@angular/core';
import { Router, RouterLink, RouterLinkActive, RouterOutlet } from '@angular/router';
import { CommonModule } from '@angular/common';
import { BaseLayoutComponent } from './layouts/base-layout/base-layout.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { FooterComponent } from './components/footer/footer.component';
import { initFlowbite } from 'flowbite';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, RouterOutlet, RouterLink,
            RouterLinkActive, BaseLayoutComponent,
            NavbarComponent, FooterComponent
          ],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent implements OnInit{

  constructor(public router: Router) {}

  isLoginPage(): boolean {
    return this.router.url === '/login';
  }

  ngOnInit(): void {
    initFlowbite();
  }
}

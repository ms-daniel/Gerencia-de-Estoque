import { Component, Input } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';

@Component({
  selector: 'app-card-button',
  standalone: true,
  imports: [RouterLink, RouterLinkActive],
  templateUrl: './card-button.component.html',
  styleUrl: './card-button.component.css'
})
export class CardButtonComponent {
  @Input() total: number = 0;
  @Input() icon: string = 'inventory';
  @Input() legend: string = 'Registered Items';
  @Input() link: string = '/home';
}

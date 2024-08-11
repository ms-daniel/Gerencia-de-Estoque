import { Component } from '@angular/core';
import { CardButtonComponent } from '../../components/card-button/card-button.component';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [CardButtonComponent],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {

}

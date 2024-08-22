import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterLink, RouterLinkActive } from '@angular/router';

@Component({
  selector: 'app-create-item',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, FormsModule],
  templateUrl: './create-item.component.html',
  styleUrl: './create-item.component.css'
})
export class CreateItemComponent {
  item = {
    name: '',
    description: '',
    price: 0
  };
}

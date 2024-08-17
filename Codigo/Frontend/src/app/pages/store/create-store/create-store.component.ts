import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { Store } from '../../../_models/store';

@Component({
  selector: 'app-create-store',
  standalone: true,
  imports: [RouterLink, RouterLinkActive,
    FormsModule],
  templateUrl: './create-store.component.html',
  styleUrl: './create-store.component.css'
})
export class CreateStoreComponent {
  store: Store = {
    id: 0,
    name: '',
    street: '',
    city: '',
    state: '',
    country: '',
    postal_code: '',
    user_id: 0,
    created_at: new Date(),
    updated_at: new Date()
  };

  seeStore(): void {
    console.log(this.store);
  }
}

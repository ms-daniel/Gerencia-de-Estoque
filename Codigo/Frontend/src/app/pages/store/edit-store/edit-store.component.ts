import { Component } from '@angular/core';
import { Store } from '../../../_models/store';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-edit-store',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, FormsModule],
  templateUrl: './edit-store.component.html',
  styleUrl: './edit-store.component.css'
})
export class EditStoreComponent {
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

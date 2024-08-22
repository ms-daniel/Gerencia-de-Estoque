import { Component } from '@angular/core';
import { Supplier } from '../../../_models/supplier';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-edit-supplier',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, FormsModule],
  templateUrl: './edit-supplier.component.html',
  styleUrl: './edit-supplier.component.css'
})
export class EditSupplierComponent {
  supplier: Supplier = {
    id: 0,
    name: '',
    phone: '',
    email: '',
    created_at: new Date(),
    updated_at: new Date()
  };
}

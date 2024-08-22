import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { Supplier } from '../../../_models/supplier';

@Component({
  selector: 'app-create-supplier',
  standalone: true,
  imports: [FormsModule, RouterLink, RouterLinkActive],
  templateUrl: './create-supplier.component.html',
  styleUrl: './create-supplier.component.css'
})
export class CreateSupplierComponent {
  supplier: Supplier = {
    id: 0,
    name: '',
    phone: '',
    email: '',
    created_at: new Date(),
    updated_at: new Date()
  };

  seeSupplier(): void {
    console.log(this.supplier);
  }
}

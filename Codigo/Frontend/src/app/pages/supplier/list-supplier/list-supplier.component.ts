import { Component } from '@angular/core';
import { PaginatedTableComponent } from '../../../components/paginated-table/paginated-table.component';
import { RouterLink, RouterLinkActive } from '@angular/router';

@Component({
  selector: 'app-list-supplier',
  standalone: true,
  imports: [PaginatedTableComponent, RouterLink, RouterLinkActive],
  templateUrl: './list-supplier.component.html',
  styleUrl: './list-supplier.component.css'
})
export class ListSupplierComponent {

}

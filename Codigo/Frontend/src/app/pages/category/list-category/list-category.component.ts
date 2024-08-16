import { Component, Input } from '@angular/core';
import { PaginatedTableComponent } from '../../../components/paginated-table/paginated-table.component';

@Component({
  selector: 'app-list-category',
  standalone: true,
  imports: [PaginatedTableComponent],
  templateUrl: './list-category.component.html',
  styleUrl: './list-category.component.css'
})
export class ListCategoryComponent {

}

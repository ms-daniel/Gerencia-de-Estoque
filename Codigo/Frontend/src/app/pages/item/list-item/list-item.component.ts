import { Component } from '@angular/core';
import { Item } from '../../../_models/item';
import { PaginatedTableComponent } from '../../../components/paginated-table/paginated-table.component';

@Component({
  selector: 'app-list-item',
  standalone: true,
  imports: [PaginatedTableComponent],
  templateUrl: './list-item.component.html',
  styleUrl: './list-item.component.css'
})
export class ListItemComponent {
  items: Item[] = []; 
}

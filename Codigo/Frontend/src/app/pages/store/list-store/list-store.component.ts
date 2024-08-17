import { Component } from '@angular/core';
import { PaginatedTableComponent } from '../../../components/paginated-table/paginated-table.component';
import { RouterLink, RouterLinkActive } from '@angular/router';


@Component({
  selector: 'app-list-store',
  standalone: true,
  imports: [PaginatedTableComponent,
    RouterLink, RouterLinkActive
  ],
  templateUrl: './list-store.component.html',
  styleUrl: './list-store.component.css'
})
export class ListStoreComponent {

}

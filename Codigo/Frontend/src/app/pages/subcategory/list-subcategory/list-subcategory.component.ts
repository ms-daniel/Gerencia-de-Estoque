import { Component } from '@angular/core';
import { PaginatedTableComponent } from '../../../components/paginated-table/paginated-table.component';
import { RouterLink, RouterLinkActive } from '@angular/router';


@Component({
  selector: 'app-list-subcategory',
  standalone: true,
  imports: [PaginatedTableComponent, RouterLink, RouterLinkActive],
  templateUrl: './list-subcategory.component.html',
  styleUrl: './list-subcategory.component.css'
})
export class ListSubcategoryComponent {

}
